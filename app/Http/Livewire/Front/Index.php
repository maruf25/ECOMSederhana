<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $search = "";
    protected $listeners = ["updateSearch" => "getSearch"];
    public function render()
    {
        if ($this->search != "") {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            $products = Product::all();
        }
        return view('livewire.front.index', ["products" => $products])->layoutData(['title' => 'Ecom']);
    }
    public function getSearch($query)
    {
        $this->search = $query;
    }
}
