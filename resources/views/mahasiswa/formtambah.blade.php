@extends('layout.main')

@section('judul')
    Tambah Data
@endsection

@section('isi')


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button class="btn btn-primary" type="button" onclick="window.location='/mhs/index'">
                        &laquo; Kembali
                    </button>
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{--                    @if(session('msg'))--}}
                {{--                        {{ session('msg') }}--}}
                {{--                    @endif--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="POST" action="{{ '/mhs/simpan' }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nim">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nim" placeholder="No Induk Mahasiswa" name="nim" value="{{ old('nim') }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div class="form-group">
                                    <label for="tlp">No Handphone</label>
                                    <input type="text" class="form-control" id="tlp" placeholder="No Handphone" name="tlp" value="{{ old('tlp') }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Alamat Rumah" name="alamat">{{ old('alamat') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">Asal Institusi</label>
                                    <input type="text" class="form-control" id="institusi" placeholder="Asal Institusi" name="institusi" value="{{ old('institusi') }}">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

@endsection


