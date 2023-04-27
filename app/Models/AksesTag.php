<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesTag extends Model
{
    use HasFactory;
    protected $table = 'akses_tag';
    protected $fillable = [
        'berita_id', 'tag_berita_id'
    ];

    protected $primaryKey = 'id';

    public function Berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id', 'id');
    }
    public function TagBerita()
    {
        return $this->belongsTo(TagBerita::class, 'tag_berita_id', 'id');
    }
}
