<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $guarded = [];

    public function penjualan_detail(){
        return $this->hasMany(PenjualanDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
