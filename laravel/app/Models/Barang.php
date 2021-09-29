<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $guarded = [];

    public function penjualan_detail(){
        return $this->hasMany(PenjualanDetail::class);
    }

    public function distributor(){
        return $this->belongsTo(Distributor::class);
    }
}
