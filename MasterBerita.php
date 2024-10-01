<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBerita extends Model
{
    use HasFactory;

    protected $table = 'master_berita'; // Nama tabel di database

    protected $fillable = ['judul', 'konten', 'penulis', 'created_at']; // Kolom yang bisa diisi
}
