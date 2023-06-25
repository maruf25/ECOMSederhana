@extends('layouts.dashboard')

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
    <h1>Product</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
        Add Product
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset('storage/' . $product->gambar) }}" alt=""
                            style="width: 100px; height:100px; object-fit: cover;"></td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>
                        {{-- <a href="{{ route('dashboard.product.edit', $product->id) }}" class="btn btn-info">Edit</a> | --}}
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal"
                            wire:click.prevent='edit({{ $product->id }})'>
                            edit
                        </button> |
                        <a href="" class="btn btn-danger"
                            onclick="confirmDelete(event, {{ $product->id }})">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @livewire('dashboard.product.edit')
    @livewire('dashboard.product.add')
@endsection
