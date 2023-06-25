<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteConfirmation extends Component
{
    public $itemId;

    public function confirmDelete()
    {
        $this->dispatchBrowserEvent('swal:confirm-delete', [
            'id' => $this->itemId,
        ]);
    }

    public function deleteItem()
    {
        // Logika penghapusan item
        // ...

        // Tampilkan notifikasi SweetAlert2 setelah penghapusan berhasil
        $this->dispatchBrowserEvent('swal:deleted', [
            'title' => 'Item berhasil dihapus!',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        return view('livewire.delete-confirmation');
    }
}
