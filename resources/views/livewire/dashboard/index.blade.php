@extends('layouts.dashboard')

@section('content')
    <h1>Welcome Dashboard</h1>
    <a href="{{ route('ecom.index') }}" class="btn btn-secondary">Ecom</a>
@endsection
