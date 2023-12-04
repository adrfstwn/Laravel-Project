<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikan'; // Sesuaikan dengan nama tabel di database Anda
    protected $fillable = ['jenjang'];
}
