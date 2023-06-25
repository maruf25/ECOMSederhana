@extends('layouts.dashboard')

@section('content')
    <div wire:ignore.self class="container p-6">
        <form action="" enctype="multipart/form-data" wire:submit.prevent='updateProduct'>
            @csrf
            {{-- Nama --}}
            <div class="mb-3">
                <label for="">Nama</label>
                <input type="text" class="form-control" wire:model.defer='name'>
            </div>
            {{-- Harga --}}
            <label for="">Harga</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input type="number" class="form-control" wire:model.defer='harga'>
            </div>
            {{-- Gambar --}}
            <div class="mb-3">
                <label for="">Gambar</label>
                <input type="file" class="form-control" id="image" name="image" wire:model.defer='gambar'
                    onchange="previewImage()">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage() {
            const img = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>
@endsection

@push('js')
    <script>
        function previewImage() {
            const img = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>
@endpush
