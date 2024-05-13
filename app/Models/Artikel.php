<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';

    protected $fillable = [
        'kategori_id',
        'gambar',
        'konten',
        'judul',
        'deskripsi',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }


}
