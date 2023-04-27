<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HalamanMenu extends Model
{
    use HasFactory;
    protected $table = 'halaman_menu';
    protected $guarded = [];

    protected $primaryKey = 'id';
    
    public function Menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
