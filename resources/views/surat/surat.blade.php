@extends('layout.main')

@section('judul')
    Data Persuratan
@endsection

@section('isi')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
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
                @if(session('msg'))
                    <p>
                        {{ session('msg') }}
                    </p>
                @endif
                <form method="GET">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">
                            Cari Data
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari bedasarkan NIM/Nama" autofocus="true" value="{{ $cari }}">
                        </div>

                    </div>

                </form>
                {{--untuk menu pencarian tambahkan script berikut di terminal: composer require
                kyslik/column-sortable kemudian tambahkan clas di dolder config app.php
                 \Kyslik\ColumnSortable\ColumnSortableServiceProvider::class,
                 kemudian ke terminal kemudian jalankan php artisan vendor:publish --provider=Kyslik\ColumnSortable\ColumnSortableServiceProvider --tag=config
                 dan di controller tambahkan sortable sebelum paginate Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat')--}}
                <table class="table table-sm table-bordered ">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>@sortablelink('nim','NIM')</th>
                        <th>@sortablelink('namamhs','Nama')</th>
                        <th>@sortablelink('jk','JK')</th>
{{--                        <th>@sortablelink('tlpmhs','No HP')</th>--}}
{{--                        <th>@sortablelink('alamatmhs','Alamat')</th>--}}
                        <th>@sortablelink('institusimhs','Institusi')</th>
                        <th>@sortablelink('jurusanmhs','Jurusan')</th>
{{--                        <th>@sortablelink('jenjangmhs','Jenjang')</th>--}}
                        <th>Buat Surat</th>
                    </tr>

                    </thead>
                    <tbody>
                    @php
                        $nomor = 1 + (($dataMhs->currentPage()-1) * $dataMhs->perPage());
                    @endphp

                    @foreach($dataMhs as $d)
                        <tr>
                            {{--                            <td>{{ $loop->iteration }}</td>--}}
                            <td>{{ $nomor++ }}</td>
                            <td>{{$d->nim}}</td>
                            <td>{{$d->namamhs}}</td>
                            <td>{{$d->jk }}</td>
{{--                            <td>{{$d->tlpmhs}}</td>--}}
{{--                            <td>{{$d->alamatmhs}}</td>--}}
                            <td>{{$d->institusimhs}}</td>
                            <td>{{$d->jurusanmhs}}</td>
{{--                            <td>{{$d->jenjangmhs}}</td>--}}
                            <td>
                                <div class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <i class="far fa-envelope mr-2"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                                        <div class="dropdown-divider"></div>
                                        <a href="/surat/stupen/{{ $d->id }}" class="dropdown-item">
                                            <i class="fas fa-pencil-alt"></i> Studi Pendahuluan
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-pencil-alt"></i> Ijin Penelitian
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-pencil-alt"></i> Etical Clearance
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                    {{ $dataMhs->links() }}--}}
                {!! $dataMhs->appends(Request::except('page'))->render() !!}
                <script>
                    function hapusData(){
                        pesan = confirm('Yakin data ini dihapus? ')
                        if (pesan)
                            return true;
                        else return false;
                    }
                </script>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection


