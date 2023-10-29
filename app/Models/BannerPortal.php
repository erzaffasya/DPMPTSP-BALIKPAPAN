<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerPortal extends Model
{
    use HasFactory;
    protected $table = 'banner_portal';
    protected $guarded = [];

    protected $primaryKey = 'id';
}
