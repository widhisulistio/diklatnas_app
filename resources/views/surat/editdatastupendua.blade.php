@extends('layout.main')

@section('judul')
    Data Permohonan Studi Pendahuluan
@endsection

@section('isi')


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button class="btn btn-primary" type="button" onclick="window.location='/stupen/index'">
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
                        <form class="row g-3 ml-3 mr-3" enctype="multipart/form-data" method="POST" action="{{ '/stupen/update' }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="id" value="{{ $id }}">
                            <div class="col-md-6">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $nim }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $nama }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="selectjk">Jenis Kelamin</label>
                                <select id="selectjk" name="jk" class="form-control" disabled>
                                    <option value="L"{{$jk =="L" ? 'selected':''}}>Laki-laki</option>
                                    <option value="P"{{$jk =="P" ? 'selected':''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tlp" class="form-label">No Handphone</label>
                                <input type="text" class="form-control" id="tlp" name="tlp" value="{{ $tlp }}" readonly>
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $alamat }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="institusi" class="form-label">Institusi</label>
                                <input type="text" class="form-control" id="institusi" name="institusi" value="{{ $institusi }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="selectjenjang">Jenjang</label>
                                <select id="selectjenjang" name="jenjang" class="form-control" disabled>
                                    <option value="DI"{{$jenjang =="DI" ? 'selected':''}}>Diploma I</option>
                                    <option value="DII"{{$jenjang =="DII" ? 'selected':''}}>Diploma II</option>
                                    <option value="DIII"{{$jenjang =="DIII" ? 'selected':''}}>Diploma III</option>
                                    <option value="DIV"{{$jenjang =="DIV" ? 'selected':''}}>Sarjana Terapan</option>
                                    <option value="S1"{{$jenjang =="S1" ? 'selected':''}}>Sarjana</option>
                                    <option value="S2"{{$jenjang =="S2" ? 'selected':''}}>Magister</option>
                                    <option value="S3"{{$jenjang =="S3" ? 'selected':''}}>Doktoral</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="nomor" class="form-label">Nomor Surat</label>
                                <input type="text" class="form-control"  id="nomor" name="nomor" value="{{ $nomor }}">
                            </div>
                            <div class="col-md-3">
                                <label for="sifat">Sifat Surat</label>
                                <select id="selectsifat" name="sifat" class="form-control" >
                                    <option value="Biasa"{{ $sifat =="Biasa" ? 'selected':'' }}>Biasa</option>
                                    <option value="Rahasia"{{ $sifat =="Rahasia" ? 'selected':'' }}>Rahasia</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="lampiran">Lampiran Surat</label>
                                <select id="selectlampiran" name="lampiran" class="form-control">
                                    <option value="-">-</option>
                                    <option value="1 Bendel"{{ $lampiran =="1 Bendel" ? 'selected':'' }}>1 Bendel</option>
                                    <option value="2 Bendel"{{ $lampiran =="2 Bendel" ? 'selected':'' }}>2 Bendel</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="tanggal" class="form-label">Tanggal Surat</label>
                                <input type="date" class="form-control " id="tanggal" name="tanggal"value="{{ $tanggal }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="yth" class="form-label">Tujuan Surat</label>
                                <input type="text" class="form-control" id="yth" name="yth" value="{{ $yth }}">
                            </div>
                            <div class="col-md-6">
                                <label for="hal" class="form-label">Prihal Surat</label>
                                <input type="text" class="form-control" id="hal" name="hal" value="{{ $hal }}">
                            </div>
                            <div class="col-md-6">
                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{ $kegiatan }}">
                            </div>
                            <div class="col-md-6">
                                <label for="judul" class="form-label">Judul Penelitian</label>
                                <input type="text" class="form-control " id="judul" name="judul" value="{{ $judul }}" >
                            </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
{{--                                <a href="/stupen/cetak/{{ $id }}" class="btn btn-primary"> <i class="fas fa-print"></i> Cetak</a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).read(function (){
                    $("#selectjk").select2();
                    $("#selectjenjang").select2();
                    $("#selectsifat").select2();
                    $("#selectlampiran").select2();
                });

            </script>
        </div>
        <!-- /.card -->

    </section>

@endsection




