<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileWebsite extends Model
{
    use HasFactory;
    protected $table = 'profil_website';
    protected $guarded = [];

    protected $primaryKey = 'id';
}
