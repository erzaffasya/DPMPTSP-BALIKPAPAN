<?php

namespace App\Models;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    
    protected $table = 'menu';
    protected $guarded = [];

    public function HalamanMenu()
    {
        return $this->belongsTo(HalamanMenu::class, 'id', 'menu_id');
    }
    public function Menu()
    {
        return $this->belongsTo(Menu::class, 'id', 'parent_id');
    }
    public function subMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
