@extends('main')
@section('content')
<div class="content-wrapper" valign="center">
    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header text-center">
                  <h3 class="card-title">Edit Data Agama</h3>
                </div>

                <form action="{{route('agama.update',$agama->id)}}" method="POST">
                @method('put')
                @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input value="{{$agama->nama_agama}}" type="text" name="nama_agama" class="form-control" id="nama_agama" placeholder="Masukkan Nama" required>
                    </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
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

