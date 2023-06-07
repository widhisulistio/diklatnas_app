<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
</head>
<body>
    <center>
        <p>
            <button type="button" onclick="window.location='/mhs/tambah'">
                Tambah
            </button>
        </p>
        @if(session('msg'))
            <p>
                {{ session('msg') }}
            </p>
        @endif
        <table style="width: 80%"; border=1px solid #000 border="1" >
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
                        <button type="button" onclick="window.location='/mhs/edit/{{ $d->id }}'">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </center>
</body>
</html>
