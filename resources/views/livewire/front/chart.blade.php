@extends('layouts.ecom')

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
    <div class="container" style="min-height: 410px;">
        <h3 class="text-center my-5 fw-bold">MY CHART</h3>
        <div class="row py-2">
            <div class="col">
                @if (count($products) == 0)
                    <h3 class="fw-bold">ORDER</h3>
                    <div class="order my-5 bg-warning">
                        <p class="p-3">EMPTY ORDER</p>
                    </div>
                @else
                    {{-- Ketika Kosong --}}
                    <table border="1" width="100%;" class="table">
                        <tr class="table-secondary">
                            <th width="55%%;" heigth="100px">Item</th>
                            <th width="15%%;">Price</th>
                            <th width="15%%;">Amount</th>
                            <th width="15%%;">Subtotal</th>
                        </tr>
                @endif

                @foreach ($products as $product)
                    {{-- Perulangan Data --}}
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $product->gambar) }}" style="height: 120px;">
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="fw-bold text-decoration-none">{{ $product->name }}</a>
                                    <p class="fw-bold mx-0">Size : {{ $product->ukuran }}</p>
                                    <a href="" onclick="confirmDelete(event, {{ $product->id_chart }})"
                                        class="text-dark">Delete</a>
                                </div>
                            </div>
                        </td>
                        <td class="fw-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td class="fw-bold">{{ $product->jumlah }}</td>
                        <td class="fw-bold">Rp {{ number_format($product->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div class="col-3">
                <div class="ringkasan bg-secondary bg-opacity-50 p-3">
                    <h4>TRANSACTION DETAIL</h4>
                    <hr>
                    <h4 class="fw-bold float-start">Total</h4>
                    <h4 class="fw-bold float-end">{{ number_format($total, 0, ',', '.') }}
                    </h4>
                    <input type="hidden" value="{{ $total }}" wire:model.defer='harga'>
                    <a href="{{ route('ecom.shipping') }}" class="btn btn-danger" style="width: 100%;">Checkout Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
