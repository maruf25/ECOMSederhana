<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paids()
    {
        $this->belongsToMany(Paid::class);
    }

    public function products()
    {
        $this->belongsToMany(Product::class);
    }
}
