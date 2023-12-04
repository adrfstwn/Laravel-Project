<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    use HasFactory;
    protected $table = 'statuspegawai'; // Sesuaikan dengan nama tabel di database Anda
    protected $fillable = ['nama_statusPegawai'];
}
