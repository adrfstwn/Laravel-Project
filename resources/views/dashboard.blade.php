@extends('main')
@section('content')

<div class="content-wrapper">
    <br>
    <br>
    <div class="content-header">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="text-align: center;">
                    <h2 class="card-title text-center w-100 my-auto" style="margin-left: 100px; font-size: 24px; font-weight: bold;">Tabel Pegawai</h2>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('create')}}" class="btn btn-primary ml-auto">Tambah Data</a>
                        </div>
                    </div>
                </div>
            <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap" style="width: 100%; padding: 20px;">
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
                        <th class="text-center">Foto Profil</th>
                        <th class="text-center">Aksi</th>
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
                            <td style="width: 10%">
                                <a href="/dashboard/{{ $p->id }}/edit" class="btn btn-primary"><i class="fas fa-pen"></i></a>

                                <form action="/dashboard/{{ $p->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>
</div>
      @push('scripts')
      <script src="{{ asset('js/hapus.js') }}"></script>
      @endpush
@endsection

