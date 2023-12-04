@extends('main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="text-align: center;">
                    <h2 class="card-title text-center w-100 my-auto" style="margin-left: 100px; font-size: 24px; font-weight: bold;">Tabel Jenis Pegawai</h2>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('jenisPegawai.create')}}" class="btn btn-primary ml-auto">Tambah Data</a>
                        </div>
                    </div>
                </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-bordered table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jenis Pegawai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($jenisPegawai as $jp)
                    <tr>
                        <td>{{ $jp->id }}</td>
                        <td>{{ $jp->nama_jenisPegawai }}</td>
                        <td>
                            <a href="/jenisPegawai/{{ $jp->id }}/edit" class="btn btn-primary"><i class="fas fa-pen"></i></a>

                            <form action="/jenisPegawai/{{ $jp->id }}" method="POST" style="display: inline;">
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
      @push('scripts')
      <script src="{{ asset('js/hapus.js') }}"></script>
      @endpush
@endsection
