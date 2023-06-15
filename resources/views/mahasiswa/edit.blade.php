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
                        <form enctype="multipart/form-data" method="POST" action="{{ '/mhs/update' }}">
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
                                    <label for="selectjk">Jenis Kelamin</label>
                                    <select id="selectjk" name="jk" class="form-control">
                                        <option value="L"{{$jk =="L" ? 'selected':''}}>Laki-laki</option>
                                        <option value="P"{{$jk =="P" ? 'selected':''}}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">No Handphone</label>
                                    <input type="text" class="form-control" id="tlp" name="tlp" value="{{ $tlp }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3"  name="alamat">{{ $alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="institusi">Asal Institusi</label>
                                    <input type="text" class="form-control" id="institusi" name="institusi" value="{{ $institusi }}">
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Asal Institusi</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $jurusan }}">
                                </div>
                                <div class="form-group">
                                    <label for="selectjenjang">Jenjang</label>
                                    <select id="selectjenjang" name="jenjang" class="form-control">
                                        <option value="DI"{{$jenjang =="DI" ? 'selected':''}}>Diploma I</option>
                                        <option value="DII"{{$jenjang =="DII" ? 'selected':''}}>Diploma II</option>
                                        <option value="DIII"{{$jenjang =="DIII" ? 'selected':''}}>Diploma III</option>
                                        <option value="DIV"{{$jenjang =="DIV" ? 'selected':''}}>Sarjana Terapan</option>
                                        <option value="S1"{{$jenjang =="S1" ? 'selected':''}}>Sarjana</option>
                                        <option value="S2"{{$jenjang =="S2" ? 'selected':''}}>Magister</option>
                                        <option value="S3"{{$jenjang =="S3" ? 'selected':''}}>Doktoral</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div id="foto" name="foto">
                                        @if($foto)
                                            <img src="{{ asset('storage/'.$foto) }}" class="img-thumbnail" style="width: 50%">
                                        @else
                                            <span class="badge badge-danger"> Belum Ada Foto</span>
                                        @endif
                                            <input type="file" class="form-control" @error('foto') is-invalid @enderror" accept="image/*" name="foto">
                                            @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>

{{--                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $jurusan }}">--}}
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>


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
        <!-- /.card -->

    </section>

@endsection




