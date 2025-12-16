<?php

namespace App\Models;

use App\Enums\BeritaStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;
    
    protected $casts = [
        'tanggal_publikasi' => 'date',
        'status' => BeritaStatus::class,
    ];

    protected $fillable = [
        'penulis_id',
        'validator_id',
        'judul',
        'slug',
        'isi',
        'kategori',
        'hashtag',
        'status',
        'tanggal_publikasi',
    ];
}
