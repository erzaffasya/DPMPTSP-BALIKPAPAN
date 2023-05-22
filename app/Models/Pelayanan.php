<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    protected $table = 'pelayanan';
    protected $fillable = [
        'judul', 'gambar', 'deskripsi','slug'
    ];

    protected $primaryKey = 'id';
}
