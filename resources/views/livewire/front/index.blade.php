@extends('layouts.ecom', ['title' => 'Product'])

@section('content')
    @if (session('success'))
        <div class="p-3 bg-success text-white">
            <div class="container">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('danger'))
        <div class="p-3 bg-danger text-white">
            <div class="container">
                {{ session('danger') }}
            </div>
        </div>
    @endif
    <div>
        <div class="container">
            <h3 class="fw-bold text-center my-5"><strong>Product</strong></h3>
            <div id="main-casual">
                <div class="row my-3">
                    @foreach ($products as $product)
                        <div class="col col-md-3">
                            <div class="card px-2 border-0" style="width: 100%;">
                                <img src="{{ asset('storage/' . $product->gambar) }}" class="border-bottom"
                                    style="height: 150px; object-fit: cover">
                                <div class="card-body">
                                    <p class="card-title"><a href="{{ route('ecom.order', $product->id) }}"
                                            class="text-decoration-none fw-bold">{{ $product->name }}</a></p>
                                    <p class="card-text fw-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
