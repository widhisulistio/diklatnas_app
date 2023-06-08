@extends('layout.main')

@section('judul')
    Data Mahasiswa
@endsection

@section('isi')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button class="btn btn-primary" type="button" onclick="window.location='/mhs/tambah'">
                        Tambah
                    </button>
                    <button class="btn btn-info" type="button" onclick="window.location='/mhs/datasoft'">
                        Tampil Data Softdelete
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
                @if(session('msg'))
                    <p>
                        {{ session('msg') }}
                    </p>
                @endif
                <table class="table table-sm table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Asal Institusi</th>
                        <th>Aksi</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($dataMhs as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$d->nim}}</td>
                            <td>{{$d->namamhs}}</td>
                            <td>{{$d->tlpmhs}}</td>
                            <td>{{$d->alamatmhs}}</td>
                            <td>{{$d->institusimhs}}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" type="button" onclick="window.location='/mhs/edit/{{ $d->id }}'">
                                    Edit
                                </button>
                                <form method="POST" action="/mhs/hapus/{{ $d->id }}" style="display: inline;" onsubmit="return hapusData()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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


