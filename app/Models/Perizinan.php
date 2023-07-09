<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = 'perizinan';
    protected $guarded = [];

    protected $primaryKey = 'id';


    
    public function Perizinan()
    {
        return $this->belongsTo(Perizinan::class, 'perizinan_id', 'id');
    }
}
