<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menu()
    {
        return $this->hasMany(Menu::class)->orderBy('position', 'ASC');
    }
}
