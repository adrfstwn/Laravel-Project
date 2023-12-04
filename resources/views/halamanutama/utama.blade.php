@extends('halamanutama.mainin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center" style="margin-top: 10px">
                    <h1 class="m-0">Bismillah Gacor Masbroo!!</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="text-align: center;">
                        <h2 class="card-title text-center w-100 my-auto" style="font-size: 24px; font-weight: bold;">Tabel Pegawai</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="margin: auto; width: 80%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jenis Pegawai</th>
                                    <th class="text-center">Status Pegawai</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Sub. Unit</th>
                                    <th class="text-center">Pendidikan</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Tempat Lahir</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Agama</th>
                                    <th class="text-center">Profil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $p)
                    <tr>
                        <td style="width: 10%">{{ $p->nama }}</td>
                        <td style="width: 10%">{{ $p->nik }}</td>
                        <td style="width: 10%">
                            @if ($p->jenisPegawai)
                                {{ $p->jenisPegawai->nama_jenisPegawai }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="width: 10%">
                            @if ($p->statusPegawai)
                                {{ $p->statusPegawai->nama_statusPegawai }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="width: 10%">{{ $p->unit }}</td>
                        <td style="width: 10%">{{ $p->subUnit }}</td>
                        <td class="text-center">
                            @if ($p->pendidikan)
                                {{ $p->pendidikan->jenjang }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="width: 10%">{{ $p->tanggalLahir }}</td>
                        <td style="width: 10%">{{ $p->tempatLahir }}</td>
                        <td style="width: 10%">
                            @if ($p->jenisKelamin)
                                {{ $p->jenisKelamin->nama_jeniskelamin }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="width: 10%">
                            @if ($p->agama)
                                {{ $p->agama->nama_agama }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <img src="{{ asset('images/' . $p->gambar) }}" alt="Gambar" style="max-width: 50px; max-height: 50px;">
                        </td>
                    </tr>
                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
