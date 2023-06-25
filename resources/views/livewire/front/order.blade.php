@extends('layouts.ecom', ['title' => 'Order'])

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
    <!-- Main -->
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <img src="{{ asset('storage/' . $product['gambar']) }}" alt="" style="height: 400px;">
            </div>
            <div class="col-4">
                <h1 class="fw-bold">{{ $product['name'] }}</h1>
                <h3 class="fw-bold">{{ number_format($product['harga']) }}</h3>
                <hr>
                <form wire:submit.prevent='addChart'>
                    <p>Size (UER 36-55) <span class="text-danger">*</span></p>
                    <input type="number" wire:model.defer='ukuran' placeholder="36-55" style="width: 100%;" maxlength="2"
                        required>
                    @error('ukuran')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <p>Amount <span class="text-danger">*</span></p>
                    <input type="number" wire:model.defer='jumlah' placeholder="maks 10" style="width: 100%;"
                        maxlength="2" required>
                    <button type="submit" class="my-2 fw-bold py-2 text-white bg-danger border-0" style="width: 100%;">
                        Add to chart
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
