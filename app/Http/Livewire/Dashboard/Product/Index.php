<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    public $search = "";
    protected $listeners = ["updateSearch" => "getSearch", 'deleteItem' => 'deleteProduct'];
    public function render()
    {
        if ($this->search != "") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            $products = Product::all();
        }
        return view('livewire.dashboard.product.index', [
            "products" => $products,
        ])
            ->layoutData(["title" => "Product"]);
    }


    public function edit(Product $product)
    {
        $this->emit('editProduct', $product);
    }

    public function deleteProduct(Product $product)
    {
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }
        $product->delete();

        $this->dispatchBrowserEvent('success', [
            'title' => 'Successfully deleted',
            'icon' => 'success',
        ]);
    }

    public function getSearch($query)
    {
        $this->search = $query;
    }
}
