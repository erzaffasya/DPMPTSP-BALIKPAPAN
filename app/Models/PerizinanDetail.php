<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerizinanDetail extends Model
{
    use HasFactory;
    protected $table = 'perizinan_detail';
    protected $guarded = [];

    protected $primaryKey = 'id';
}
