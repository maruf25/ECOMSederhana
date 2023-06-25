<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $name, $harga, $gambar, $gambarOld;

    public $imagePreview;
    public $idProduct;

    protected $listeners = ["editProduct" => "getProducts"];

    public function render()
    {
        return view('livewire.dashboard.product.edit')->layoutData(["title" => "Edit Product"]);
    }

    public function getProducts($product)
    {
        $this->idProduct = $product["id"];
        $this->name = $product["name"];
        $this->harga = $product["harga"];
        $this->gambarOld = $product["gambar"];
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

    public function updateProduct()
    {
        // Update string
        $product = Product::find($this->idProduct);
        $product->name = $this->name;
        $product->harga = $this->harga;
        $product->save();

        // Update file
        if ($this->gambar) {
            // Hapus file lama jika ada
            Storage::disk('public')->delete($product->gambar);

            // Simpan file baru
            $path = $this->gambar->store("image_product");
            $product->gambar = $path;
            $product->save();
        }

        // Tampilkan pesan sukses atau sejenisnya
        return redirect(route('dashboard.product.index'))->with('success', 'Product has been update!');
    }
}
