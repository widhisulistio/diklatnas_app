@extends('layout.main')

@section('judul')
    Edit Data
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
                    {{--                    @if(session('msg'))--}}
                    {{--                        {{ session('msg') }}--}}
                    {{--                    @endif--}}
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
                <div class="col-md-12">

                    <div class="card card-primary">
                        <form method="POST" action="{{ '/mhs/update' }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="{{ $id }}">
                                <div class="form-group">
                                    <label for="nim">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $nim }}" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="tlp">No Handphone</label>
                                    <input type="text" class="form-control" id="tlp" name="tlp" value="{{ $tlp }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3"  name="alamat">{{ $alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">Asal Institusi</label>
                                    <input type="text" class="form-control" id="institusi" name="institusi" value="{{ $institusi }}">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
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




