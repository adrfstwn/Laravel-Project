<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Autentikasi extends Model implements Authenticatable
{

    use \Illuminate\Auth\Authenticatable;

    use HasFactory;
    protected $table = 'login';
    protected $fillable = ['email','password'];
}
