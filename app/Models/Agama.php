<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama'; // Sesuaikan dengan nama tabel di database Anda
    protected $fillable = ['nama_agama'];
}
