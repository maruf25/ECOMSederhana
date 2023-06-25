<div>
    {{-- Layout Ecom --}}
    @if ($key == 'ecom')
        <input type="text" name="key" wire:model='search' wire:change='updateSearch' value=""
            placeholder="search..." style="width: 70%; height: 40px;">
        <input type="button" class="disabled" name="cari" value="SEARCH" style="width: 20%; height: 40px;">
    @elseif ($key == 'dashboard')
        {{-- Layout Dashboard --}}
        <div class="input-group">
            <input type="text" wire:model='search' wire:change='updateSearch'
                class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    @endif
</div>
