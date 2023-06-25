<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function charts()
    {
        $this->hasMany(Chart::class);
    }
}
