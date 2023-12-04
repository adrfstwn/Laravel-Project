<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['nama', 'nik', 'id_jenisPegawai', 'id_statusPegawai', 'unit', 'subUnit', 'id_pendidikan', 'tanggalLahir', 'tempatLahir', 'id_jenisKelamin', 'id_agama','gambar'];
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
    public function jenisPegawai()
    {
        return $this->belongsTo(JenisPegawai::class, 'id_jenisPegawai');
    }
    public function statusPegawai()
    {
        return $this->belongsTo(StatusPegawai::class, 'id_statusPegawai');
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan');
    }
    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'id_jenisKelamin');
    }
}
