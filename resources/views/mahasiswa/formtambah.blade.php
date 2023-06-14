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
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="col-md-12">
                    <div class="card card-primary">
{{--                        untuk menambahkan gambar perlu ditambahkan enctype="multipart/form-data"--}}
                        <form method="POST" action="{{ '/mhs/simpan' }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror"  id="nim" placeholder="No Induk Mahasiswa" name="nim" value="{{ old('nim') }}">
                                    @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Mahasiswa" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="selectjk" name="jk" class="form-control">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">No Handphone</label>
                                    <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="tlp" placeholder="No Handphone" name="tlp" value="{{ old('tlp') }}">
                                    @error('tlp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control @error('tlp') is-invalid @enderror" rows="3" placeholder="Alamat Rumah" name="alamat">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="institusi">Asal Institusi</label>
                                    <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="institusi" placeholder="Asal Institusi" name="institusi" value="{{ old('institusi') }}">
                                    @error('institusi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="jurusan" placeholder="Asal Institusi" name="jurusan" value="{{ old('jurusan') }}">
                                    @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenjang">Jenjang</label>
                                    <select id="selectjenjang" name="jenjang" class="form-control">
                                        <option value="DI">Diploma I</option>
                                        <option value="DII">Diploma II</option>
                                        <option value="DIII">Diploma III</option>
                                        <option value="DIV">Sarjana Terapan</option>
                                        <option value="S1">Sarjana</option>
                                        <option value="S2">Magister</option>
                                        <option value="S3">Doktoral</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Upload KTP/KTM</label>
                                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"  accept="image/*">
                                    @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).read(function (){
                    $("#selectjk").select2();
                    $("#selectjenjang").select2();
                });
            </script>
        </div>


    </section>

@endsection


