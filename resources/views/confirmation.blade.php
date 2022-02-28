@extends('layout.site.main')
@section('content')
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You for your order!</h1>
    <p class="lead"><strong>Please check your email</strong> for your order details</p>
    <hr>

    <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{ route('home') }}" role="button">Continue to homepage</a>
    </p>
</div>
@endsection
