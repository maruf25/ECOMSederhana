<?php

namespace App\Http\Livewire\Front;

use App\Models\Chart;
use App\Models\Paid;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Shipping extends Component
{
    public $name;
    public $alamat, $negara, $kecamatan, $kabupaten, $provinsi;
    public $cek;
    public function render()
    {
        $this->name = Auth::user()->name;
        $this->negara = "Indonesia";
        $this->cek = Chart::where('id_user', Auth::user()->id)->get()->toArray();
        if (count($this->cek) == 0) {
            redirect(route('ecom.index'));
        }
        return view('livewire.front.shipping')->layoutData(["title" => "Shipping"]);
    }

    public $rules = [
        "name" => 'required',
        "alamat" => 'required',
        "negara" => 'required',
        "kecamatan" => 'required',
        "kabupaten" => 'required',
        "provinsi" => 'required'
    ];

    public function pay()
    {
        $this->validate();
        $data = [
            "id_akun" => Auth::user()->id,
            "alamat" => "$this->name , $this->alamat, $this->kecamatan, $this->kabupaten, $this->provinsi, Indonesia",
        ];
        if (Paid::create($data)) {
            if (count($this->cek) >= 1) {
                Chart::where('id_user', Auth::user()->id)
                    ->where('status_bayar', 'N')
                    ->update([
                        "id_bayar" => Paid::latest()->value('id'),
                        "status_bayar" => "Y",
                    ]);
            }
        }

        return redirect(route('ecom.chart'))->with('success', 'Product has paid');
    }
}
