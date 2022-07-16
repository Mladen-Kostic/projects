@extends('layouts.main')

@section('content')

<section class="cart container mt-2 my-3 py-5">
    <div class="container mt-2 text-center">
        <p>{{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->email }}</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" class="btn btn-warning" value="Logout">
        </form>
    </div>
</section>


@if(count($user_orders) && $user_orders[0]->status != 'not paid')
    <section class="cart container py-5">
        <div class="container mt-2">
            <h4>Your Orders</h4>
        </div>

        <table class="pt-5">
            <tr>
                <th>Order Id</th>
                <th>Info</th>
                <th>Cost</th>
                <th>Date</th>
                <th>Details</th>
            </tr>

            @foreach($user_orders as $user_order)
                @if($user_order->status != 'not paid')
                    <tr>

                        <td>
                            <div style="padding: 2rem">{{ $user_order->id }}</div>
                        </td>
                        
                        <td>
                            <div class="product-info">
                                <div>
                                    <p>{{ $user_order->name }}</p>
                                    <small>
                                        <span></span>
                                        Address: {{ $user_order->address }}
                                    </small>
                                    <br>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p>$
                                {{ $user_order->cost }}
                                <span> - {{ $user_order->status }}</span>
                            </p>
                        </td>

                        <td>
                            <span class="product-price">{{ $user_order->date }}</span>
                        </td>

                        <td>
                            <a href="{{ route('user_order_details', ['id' => $user_order->id]) }}" class="btn btn-warning">
                                Details
                            </a>
                        </td>

                    </tr>
                @endif
            @endforeach

        </table>
    </section>
@else
    <div class="text-center" style="margin: 4rem 0 4rem 3rem">
        <p>No active orders.</p>
        <a class="btn btn-warning" href="{{ route('products') }}">Go to products</a>
    </div>
@endif

@endsection

