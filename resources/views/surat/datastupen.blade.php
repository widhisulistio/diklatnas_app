@extends('layout.main')

@section('judul')
    Data Studi Pendahuluan
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
                        <th>@sortablelink('nomor','Nomor')</th>
                        <th>@sortablelink('nim','NIM')</th>
                        <th>Surat</th>

                        <th>Aksi</th>
                    </tr>

                    </thead>
                    <tbody>
                    @php
                        $no = 1 + (($dataStupen->currentPage()-1) * $dataStupen->perPage());
                    @endphp

                    @foreach($dataStupen as $d)
                        <tr>
                            {{--                            <td>{{ $loop->iteration }}</td>--}}
                            <td>{{ $no++ }}</td>
                            <td>{{$d->nomor}}</td>
                            <td>{{$d->namamhs}} </td>
                            <td><em><b>Sifat:</b> {{$d->sifat}} <br>
                                <b>Lampiran:</b> {{$d->lampiran}} <br>
                                <b>Tujuan Surat:</b> {{$d->yth }} <br>
                                <b>Hal:</b> {{$d->hal}} <br>
                                <b>Kegiatan:</b> {{$d->kegiatan}} <br>
                                <b>Judul:</b> {{$d->judul}} <br>
                                <b>Tanggal Surat:</b> {{$d->tanggal}}
                                </em>
                            </td>

                            <td>
                                <a href="/stupen/cetak/{{ $d->id }}" class="dropdown-item">
                                    <i class="fas fa-print"></i> <b style="color: #0c84ff">Cetak</b>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                    {{ $dataMhs->links() }}--}}
                {!! $dataStupen->appends(Request::except('page'))->render() !!}
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


