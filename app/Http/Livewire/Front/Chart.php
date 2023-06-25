<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Chart as ModelsChart;
use Illuminate\Support\Facades\Auth;

class Chart extends Component
{
    public $harga;

    protected $listeners = ['deleteItem' => 'deleteChart'];
    public function render()
    {
        $products = DB::table('charts')
            ->join('products', 'charts.id_sepatu', '=', 'products.id')
            ->select('charts.id as id_chart', 'charts.*', 'products.*', DB::raw('products.harga * charts.jumlah as total'))
            ->where('id_user', Auth::user()->id)
            ->where('status_bayar', 'N')
            ->get();

        $total = 0;
        foreach ($products as $product) {
            $total += $product->total;
        }

        return view('livewire.front.chart', [
            "products" => $products,
            "total" => $total
        ])->layoutData(["title" => "Charts"]);
    }

    public function deleteChart(ModelsChart $chart)
    {
        $chart->delete();
        $this->dispatchBrowserEvent('success', [
            'title' => 'Successfully deleted',
            'icon' => 'success',
        ]);
    }
}
