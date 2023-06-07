<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Data</title>
</head>
<body>
<center>
    <p>
        <button type="button" onclick="window.location='/mhs/index'">
            &laquo; Kembali
        </button>
    <form method="POST" action="{{ '/mhs/update' }}">
        @csrf
        @method('PUT')
        <table style="width: 70%">
            <input type="hidden" name="id" id="id" value="{{ $id }}"> {{--bisa kasih readonly style="crusor:not-allowed"--}}
            <tr>
                <td>NIM :</td>
                <td>
                    <input type="text" name="nim" id="nim" value="{{ $nim }}"> {{--bisa kasih readonly style="crusor:not-allowed"--}}
                </td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td>
                    <input type="text" name="nama" id="nama" value="{{ $nama }}">
                </td>
            </tr>
            <tr>
                <td>Telepon :</td>
                <td>
                    <input type="text" name="tlp" id="tlp" value="{{ $tlp }}">
                </td>
            </tr>
            <tr>
                <td>ALamat :</td>
                <td>
                    <textarea name="alamat"  cols="50" rows="5" >{{ $alamat }}</textarea>
                </td>
            </tr>
            <tr>
                <td>Institusi :</td>
                <td>
                    <input type="text" name="institusi" id="institusi" value="{{ $institusi }}">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">
                        Update
                    </button>
                </td>
            </tr>
        </table>
    </form>
    </p>
</center>
</body>
</html>
