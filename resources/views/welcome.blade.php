@extends('layout.site.main')
@section('title')
Home page
@endsection
@section('content')
<section class="py-5 bg-light mb-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Given products from products.json</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                        alt="{{ $product->name }}" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product price-->
                            ${{ $product->price }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="text" name="name" value="{{ $product->name }}" hidden>
                            <input type="text" name="price" value="{{ $product->price }}" hidden>

                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark mt-auto" >
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
</section>
@endsection
