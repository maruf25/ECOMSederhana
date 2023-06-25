<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search, $key;

    public function mount($pilihan)
    {
        $this->key = $pilihan;
    }
    public function render()
    {
        return view('livewire.search');
    }

    public function updateSearch()
    {
        $this->emit('updateSearch', $this->search);
    }
}
