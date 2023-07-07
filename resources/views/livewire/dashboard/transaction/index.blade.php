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
    <h1>Transaction</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size (Amount)</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('storage/' . $transaction->gambar) }}" class="mb-2" alt=""
                                style="width: 100px; height:100px; object-fit: cover;">
                            <p class="text-bold">{{ $transaction->name }}</p>
                        </td>
                        <td>{{ $transaction->username }}</td>
                        <td>{{ $transaction->ukuran }} ({{ $transaction->jumlah }})</td>
                        <td>Rp {{ number_format($transaction->harga * $transaction->jumlah, 0, ',', '.') }}</td>
                        <td>
                            @if ($transaction->status_bayar == 'N')
                                <p class="btn btn-danger disabled">not yet paid</p>
                            @else
                                <p class="btn btn-success disabled">already paid</p>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-info">
                                send
                            </button> |
                            <button class="btn btn-danger">
                                reject
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
