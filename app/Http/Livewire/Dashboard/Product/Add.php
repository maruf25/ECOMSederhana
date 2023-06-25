<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public $name, $harga, $gambar, $imagePreview;
    public function render()
    {
        return view('livewire.dashboard.product.add');
    }
    public $rules = [
        "name" => "required",
        "gambar" => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:5000',
        "harga" => 'required'
    ];

    public function updatedGambar()
    {
        $this->validateOnly('gambar');
        $this->imagePreview = $this->gambar->temporaryUrl(); // Mendapatkan URL pratinjau gambar
    }


    public function addProduct()
    {
        $validateData = $this->validate();
        $imageName = $this->gambar->store("image_product");
        $validateData['gambar'] = $imageName;

        Product::create($validateData);
        return redirect(route('dashboard.product.index'))->with('success', 'New Product has been added!');
    }
}
