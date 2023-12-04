<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPegawai extends Model
{
    use HasFactory;
    protected $table = 'jenispegawai'; // Sesuaikan dengan nama tabel di database Anda
    protected $fillable = ['nama_jenisPegawai'];
}
