<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Traits\Visitable;
class Berita extends Model
{
    use HasFactory,Visitable;
    protected $table = 'berita';
    protected $guarded = [];

    protected $primaryKey = 'id';
    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id');
    }
    public function previous()
    {
        return $this->find(--$this->id);
    }

    public function next()
    {
        return $this->find(++$this->id);
    }
}
