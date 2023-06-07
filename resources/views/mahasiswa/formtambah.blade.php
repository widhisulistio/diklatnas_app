<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tambah Data</title>
</head>
<body>
    <center>
        <p>
            <button type="button" onclick="window.location='/mhs/index'">
                &laquo; Kembali
            </button>
        @if(session('msg'))
            {{ session('msg') }}
        @endif
        <form method="POST" action="{{ '/mhs/simpan' }}">
            @csrf
            <table style="width: 70%">
                <tr>
                    <td>NIM :</td>
                    <td>
                        <input type="text" name="nim" id="nim">
                    </td>
                </tr>
                <tr>
                    <td>Nama :</td>
                    <td>
                        <input type="text" name="nama" id="nama">
                    </td>
                </tr>
                <tr>
                    <td>Telepon :</td>
                    <td>
                        <input type="text" name="tlp" id="tlp">
                    </td>
                </tr>
                <tr>
                    <td>ALamat :</td>
                    <td>
                        <textarea name="alamat"  cols="50" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Institusi :</td>
                    <td>
                        <input type="text" name="institusi" id="institusi">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">
                            Simpan
                        </button>
                    </td>
                </tr>
            </table>
        </form>
        </p>
    </center>
</body>
</html>
