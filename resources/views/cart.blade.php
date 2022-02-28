@extends('layout.site.main')
@section('title')
Cart
@endsection
@section('content')
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Cart items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th></th>

                </tr>
            </thead>

            <tbody>

                @foreach(Cart::content() as $product)
                    <tr>
                        <td>
                            <p><strong>{{ $product->name }}</strong></p>
                        </td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="{{ route('cart.delete', ['id'=>$product->rowId]) }}" style="text-decoration: none"><span style="color: red">x</span></a></td>

                    </tr>

               @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="1">&nbsp;</td>
                    <td>Total</td>
                    <td> {{ Cart::subtotal() }}</td>
                </tr>

            </tfoot>
        </table>

        <a href="{{ route('cart.checkout') }}" class="btn btn-success">Checkout</a>
    </div>
</section>
@endsection
