@extends('main')
@section('content')
<div class="content-wrapper" valign="center">
    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header text-center">
                  <h3 class="card-title">Edit Data Pegawai</h3>
                </div>

                <form action="/dashboard/{{$pegawai->id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label>Nama</label>
                      <input value="{{$pegawai->nama}}" type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                      <label>NIK</label>
                      <input value="{{$pegawai->nik}}" type="number" name="nik" class="form-control" id="nik" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pegawai</label>
                        <select class="form-control" id="id_jenisPegawai" name="id_jenisPegawai">
                            @foreach ($jenisPegawai as $jp)
                                <!-- Iterasi data jenisPegawai -->
                                <option value="{{ $jp->id }}" @if ($jp->id === $pegawai->id_jenisPegawai) selected @endif>{{ $jp->nama_jenisPegawai }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status Pegawai</label>
                        <select class="form-control" id="id_statusPegawai" name="id_statusPegawai">
                            @foreach ($statusPegawai as $sp)
                                <!-- Iterasi data statusPegawai -->
                                <option value="{{ $sp->id }}" @if ($sp->id === $pegawai->id_statusPegawai) selected @endif>{{ $sp->nama_statusPegawai }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Unit</label>
                      <input value="{{$pegawai->unit}}" type="text" name="unit" class="form-control" id="unit" placeholder="Masukkan Unit" required>
                    </div>
                    <div class="form-group">
                      <label>Sub Unit</label>
                      <input value="{{$pegawai->subUnit}}" type="text" name="subUnit" class="form-control" id="subUnit" placeholder="Masukkan Sub Unit" required>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <select class="form-control" id="id_pendidikan" name="id_pendidikan">
                            @foreach ($pendidikan as $pd)
                                <!-- Iterasi data pendidikan -->
                                <option value="{{ $pd->id }}" @if ($pd->id === $pegawai->id_pendidikan) selected @endif>{{ $pd->jenjang }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input value="{{$pegawai->tanggalLahir}}" type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" required>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input value="{{$pegawai->tempatLahir}}" type="text" name="tempatLahir" class="form-control" id="tempatLahir" placeholder="Masukkan Tempat Lahir" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="id_jenisKelamin" name="id_jenisKelamin">
                            @foreach ($jenisKelamin as $jk)
                                <!-- Iterasi data jenisKelamin -->
                                <option value="{{$jk->id }}" @if ($jk->id === $pegawai->id_jenisKelamin) selected @endif>{{$jk->nama_jeniskelamin }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="id_agama" name="id_agama">
                            @foreach ($agama as $a)
                                <!-- Iterasi data agama -->
                                <option value="{{ $a->id }}" @if ($a->id === $pegawai->id_agama) selected @endif>{{ $a->nama_agama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="gambar">Upload Foto Profil (*Kosongkan jika tidak diubah)</label>
                    <div class="form-group">
                        <input type="file" id="gambar" name="gambar" accept="images/*">
                    </div>
                    <br>
                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
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

