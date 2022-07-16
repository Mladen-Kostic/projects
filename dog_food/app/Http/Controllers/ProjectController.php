<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    public function index() {
        $products = DB::table('products')->limit(3)->get();

        return view('index', ['products' => $products]);
    }

    
    public function products(Request $request) {
        // dd(!$request->input('filter'));
        if (!$request->input('filter')) {
            $products = DB::table('products')->get();
        } else {
            $products = DB::table('products')->where('name', 'like', '%' . $request->input('filter') . '%')->get();

            if (count($products)) {
                return view('products', ['products' => $products]);
            } else {
                Session::flash('message', 'We do not have any products named "' . $request->input('filter') . '".');
                Session::flash('alert-class', 'alert alert-warning');

                return redirect('/products');
            }
        }
        
        return view('products', ['products' => $products]);
    }


    public function single_product(Request $request, $id) {
        $product_array = DB::table('products')->where('id', $id)->get();

        return view('single_product', ['product_array' => $product_array]);
    }

}
