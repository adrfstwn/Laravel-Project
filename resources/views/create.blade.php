@extends('main')
@section('content')
<div class="content-wrapper" valign="center">
    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header text-center">
                  <h3 class="card-title text-center">Tambah Data Pegawai</h3>
                </div>

                <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="number" name="nik" class="form-control" id="nik" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="form-group">
                        <label for="jenisPegawai">Jenis Pegawai</label>
                        <select class="form-control" id="id_jenisPegawai" name="id_jenisPegawai" required>
                            @foreach ($jenisPegawai as $jp)
                            <!-- Iterasi data agama -->
                                <option value="{{ $jp->id }}">{{ $jp->nama_jenisPegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="statusPegawai">Status Pegawai</label>
                        <select class="form-control" id="id_statusPegawai" name="id_statusPegawai" required>
                            @foreach ($statusPegawai as $sp)
                            <!-- Iterasi data agama -->
                                <option value="{{ $sp->id }}">{{ $sp->nama_statusPegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Unit</label>
                      <input type="text" name="unit" class="form-control" id="unit" placeholder="Masukkan Unit" required>
                    </div>
                    <div class="form-group">
                      <label>Sub Unit</label>
                      <input type="text" name="subUnit" class="form-control" id="subUnit" placeholder="Masukkan Sub Unit" required>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select class="form-control" id="id_pendidikan" name="id_pendidikan" required>
                            @foreach ($pendidikan as $pd)
                            <!-- Iterasi data agama -->
                                <option value="{{ $pd->id }}">{{ $pd->jenjang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" placeholder="Masukkan Tanggal Lahir (30-12-2004)" required>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempatLahir" class="form-control" id="tempatLahir" placeholder="Masukkan Tempat Lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="jenisKelamin">JenisKelamin</label>
                        <select class="form-control" id="id_jenisKelamin" name="id_jenisKelamin" required>
                            @foreach ($jenisKelamin as $jk)
                            <!-- Iterasi data agama -->
                                <option value="{{ $jk->id }}">{{ $jk->nama_jeniskelamin}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="id_agama" name="id_agama" required>
                            @foreach ($agama as $a)
                            <!-- Iterasi data agama -->
                                <option value="{{ $a->id }}">{{ $a->nama_agama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="gambar">Upload Foto Profil</label>
                    <div class="form-group">
                        <input type="file" id="gambar" name="gambar" accept="images/*" required>
                    </div>
                    <br>
                    </div>
                      </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!--Validasi From Error -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <!-- /.card-body -->

                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
</div>
@endsection
