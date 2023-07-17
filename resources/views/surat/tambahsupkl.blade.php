@extends('layout.main')

@section('judul')
    Tambah Data
@endsection

@section('isi')

    <div class="content" xmlns="">

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
                        <form method="POST" action="{{ '/supkl/simpan' }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nim">No Surat</label>
                                    <input type="text" class="form-control @error('nosuratpkl') is-invalid @enderror"  id="nosuratpkl" placeholder="No Surat" name="nosuratpkl" value="{{ old('nosuratpkl') }}">
                                    @error('nosuratpkl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="selectmhs">Pilih Mahasiswa</label>
                                    <select id="selectmhs" name="namamhs" class="form-control">

                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#selectmhs").select2({
                placeholder: 'Pilih Mahasiswa',
                ajax: {
                    url: "{{ route('select.mhs') }}",
                    processResults: function({
                                                 data
                                             }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.namamhs
                                }
                            })
                        }
                    }
                }
            });

        });
    </script>
@endsection


