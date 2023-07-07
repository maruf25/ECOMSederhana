<?php

namespace App\Http\Livewire\Dashboard\Transaction;

use App\Models\Chart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $transactions = DB::table('charts')
            ->join('products', 'charts.id_sepatu', '=', 'products.id')
            ->join('users', 'charts.id_user', '=', 'users.id')
            ->select('charts.id as chart_id', 'charts.*', 'products.*', 'users.name as username')
            ->get();
        // dd($transactions);
        return view('livewire.dashboard.transaction.index', [
            "transactions" => $transactions,
        ])->layoutData(["title" => "Transaction"]);
    }
}
