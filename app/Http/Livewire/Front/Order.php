<?php

namespace App\Http\Livewire\Front;

use App\Models\Chart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Order extends Component
{
    public $products, $productId;
    public $ukuran, $jumlah;
    public function mount($id)
    {
        $products = Product::find($id);
        $this->products = $products->toArray();
        $this->productId = $products["id"];
    }
    public function render()
    {
        return view('livewire.front.order', [
            "product" => $this->products
        ])->layoutData(["title" => "Order"]);
    }

    public $rules = [
        "ukuran" => 'required|numeric|between:36,50',
        "jumlah" => 'required'
    ];

    protected $messages = [
        'ukuran' => 'Enter the correct size',
    ];

    public function addChart()
    {
        $this->validate();
        $data = [
            "id_user" => Auth::user()->id,
            "id_sepatu" => $this->productId,
            "ukuran" => $this->ukuran,
            "jumlah" => $this->jumlah,
            "status_bayar" => "N",
        ];
        Chart::create($data);
        $this->reset(["ukuran", "jumlah"]);
        $this->dispatchBrowserEvent('success', [
            'title' => 'Product add to chart',
            'icon' => 'success',
        ]);
    }
}
