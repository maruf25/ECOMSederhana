<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" wire:submit.prevent='updateProduct'>
                    @if ($imagePreview)
                        <img src="{{ $imagePreview }}" alt="Pratinjau Gambar" class="img-preview img-fluid mb-3"
                            style="width: 1000px; height:400px; object-fit: cover;">
                    @elseif ($gambarOld)
                        <img src="{{ asset('storage/' . $gambarOld) }}" alt="Pratinjau Gambar"
                            class="img-preview img-fluid mb-3" style="width: 1000px; height:400px; object-fit: cover;">
                    @endif
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
                        <input type="file" class="form-control" id="image" name="image"
                            wire:model.defer='gambar'>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        Livewire.emit('updatedImage', this.files[0]);
    });
</script>
