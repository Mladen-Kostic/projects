<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart() {
        return view('cart');
    }


    // public function add_to_cart(Request $request) {
    //     // if cart is in session
    //     if ($request->session()->has('cart')) {

    //         $cart = $request->session()->get('cart'); // [id => [product obj.]]

    //         $products_array_ids = array_column($cart, 'id'); // id's of products added to cart

    //         $id = $request->input('id');
            
    //         // adding product, if not in cart
    //         if (!in_array($id, $products_array_ids)) {
    //             $name = $request->input('name');
    //             $image = $request->input('image');
    //             $price = $request->input('price');
    //             $quantity = $request->input('quantity');
    //             $sale_price = $request->input('sale_price');

    //             if ($sale_price != null) {
    //                 $price_to_charge = $sale_price;
    //             } else {
    //                 $price_to_charge = $price;
    //             }

    //             $product_array = array(
    //                 'id' => $id,
    //                 'name' => $name,
    //                 'image' => $image,
    //                 'price' => $price_to_charge,
    //                 'quantity' => $quantity
    //             );

    //             $cart[$id] = $product_array;
    //             $request->session()->put('cart', $cart);
    //         } else {
    //             echo '<script>alert("Product is already in cart.");</script>';
    //         }

    //         $this->calculateTotalCart($request);

    //         return redirect('cart');

    //     // no cart in session
    //     } else {
    //         $cart = array();
            
    //         $id = $request->input('id');
    //         $name = $request->input('name');
    //         $image = $request->input('image');
    //         $price = $request->input('price');
    //         $quantity = $request->input('quantity');
    //         $sale_price = $request->input('sale_price');

    //         if ($sale_price != null) {
    //             $price_to_charge = $sale_price;
    //         } else {
    //             $price_to_charge = $price;
    //         }

    //         $product_array = array(
    //             'id' => $id,
    //             'name' => $name,
    //             'image' => $image,
    //             'price' => $price_to_charge,
    //             'quantity' => $quantity
    //         );

    //         $cart[$id] = $product_array;
    //         $request->session()->put('cart', $cart);

    //         $this->calculateTotalCart($request);

    //         return redirect('cart');
    //     }
    // }

    public function add_to_cart(Request $request) {
        // if cart is in session
        if ($request->session()->has('cart')) {

            $cart = $request->session()->get('cart'); // [id => [product obj.]]

            $products_array_ids = array_column($cart, 'id'); // id's of products added to cart

            $id = $request->input('id');

            // adding product, if not in cart
            if (!in_array($id, $products_array_ids)) {
                // $name = $request->input('name');
                // $image = $request->input('image');
                // $quantity = $request->input('quantity');

                $product = DB::table('products')
                ->where('id', $id)
                ->get();

                $price = $product[0]->price;
                $sale_price = $product[0]->sale_price;

                if ($sale_price != null) {
                    $price_to_charge = $sale_price;
                } else {
                    $price_to_charge = $price;
                }

                $product_array = array(
                    'id' => $id,
                    'name' => $product[0]->name,
                    'image' => $product[0]->image,
                    'price' => $price_to_charge,
                    'quantity' => 1
                );

                $cart[$id] = $product_array;
                $request->session()->put('cart', $cart);

                $this->calculateTotalCart($request);

                return json_encode(['cartQuantity' => Session::get('quantity')]);

            } else {

                $oldProdQuan = $cart[$id]['quantity'];

                $cart[$id]['quantity'] = $oldProdQuan + 1;
                $request->session()->put('cart', $cart);

                $this->calculateTotalCart($request);

                return json_encode(['cartQuantity' => Session::get('quantity')]);
                
            }

        // no cart in session
        } else {
            $cart = array();
            
            $id = $request->input('id');
            
            $product = DB::table('products')
                ->where('id', $id)
                ->get();

            $price = $product[0]->price;
            $sale_price = $product[0]->sale_price;

            if ($sale_price != null) {
                $price_to_charge = $sale_price;
            } else {
                $price_to_charge = $price;
            }

            $product_array = array(
                'id' => $id,
                'name' => $product[0]->name,
                'image' => $product[0]->image,
                'price' => $price_to_charge,
                'quantity' => 1
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart', $cart);

            $this->calculateTotalCart($request);

            return json_encode(['cartQuantity' => Session::get('quantity')]);
        }
    }


    public function calculateTotalCart(Request $request) {
        $cart = $request->session()->get('cart');
        $total_price = 0;
        $total_quantity = 0;

        foreach ($cart as $id => $product) {
            $product = $cart[$id];

            $price = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity + $quantity;
        }

        $request->session()->put('total', $total_price);
        $request->session()->put('quantity', $total_quantity);
    }


    public function remove_from_cart(Request $request) {
        
        if ($request->session()->has('cart')) {
            $id = $request->input('id');
            $cart = $request->session()->get('cart');

            unset($cart[$id]);

            $request->session()->put('cart', $cart);

            $this->calculateTotalCart($request);

            $cartQuantity = count($request->session()->get('cart'));

            return json_encode([
                'cartQuantity' => $cartQuantity,
                'id' => $id
            ]);
        }

        
    }


    public function edit_product_quantity(Request $request) {
        if ($request->session()->has('cart')) {
            $product_id = $request->input('id');
            $product_quantity = $request->input('quantity');

            if ($request->has('decrease_product_quantity_btn')) {
                $product_quantity = $product_quantity - 1;
                $operation = '-';
            } elseif ($request->has('increase_product_quantity_btn')) {
                $product_quantity = $product_quantity + 1;
                $operation = '+';
            }

            if ($product_quantity <= 0) {
                $this->remove_from_cart($request);
            }

            $cart = $request->session()->get('cart');

            if (array_key_exists($product_id, $cart)) {
                $cart[$product_id]['quantity'] = $product_quantity;

                $request->session()->put('cart', $cart);

                $this->calculateTotalCart($request);
            }

            $price = DB::table('products')
                ->select('sale_price')
                ->where('id', $product_id)
                ->get();

            return json_encode([
                'id' => $product_id,
                'productQuantity' => $product_quantity,
                'price' => $price[0]->sale_price,
                'operation' => $operation
            ]);
        }
    }


    public function checkout() {
        return view('checkout');
    }


    public function place_order(Request $request) {
        if ($request->session()->has('cart')) {
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $city = $request->input('city');
            $address = $request->input('address');

            $cost = $request->session()->get('total');
            
            $status = 'not paid';

            $date = date('Y-m-d h:i:s');

            $cart = $request->session()->get('cart');

            if (Auth::check()) {
                // logged in
                $user_id = Auth::id();
            } else {
                $user_id = 0;
            }

            $order_id = DB::table('orders')->InsertGetId([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'city' => $city,
                'address' => $address,
                'cost' => $cost,
                'status' => $status,
                'date' => $date,
                'user_id' => $user_id
            ], 'id');

            foreach ($cart as $id => $product) {
                $product = $cart[$id];
                $product_id = $product['id'];
                $product_name = $product['name'];
                $product_price = $product['price'];
                $product_quantity = $product['quantity'];
                $product_image = $product['image'];

                DB::table('order_items')->insert([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'product_image' => $product_image,
                    'order_date' => $date
                ]);
            }

            $request->session()->put('order_id', $order_id);

            return view('payment');

        } else {
            return redirect('/');
        }
    }
}
