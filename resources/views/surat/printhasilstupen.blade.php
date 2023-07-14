<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity= "sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"  crossorigin="anonymous">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Gaya cetak surat */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            size: A4;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
        .subject {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .content {
            margin-bottom: 20px;
        }
        .signature {
            text-align: right;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            /*border-collapse: collapse;*/
            border: 1px solid;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        @page {
            size: A4;
            margin: 0;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="header">
        <h1>RSUD Nyi Ageng Serang</h1>
        <p>l. Sentolo Nanggulan, Bantar Kulon, Banguncipto, Kec. Sentolo, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55664</p>
    </div>

    <div class="date">
        <p>Kulonprogo: {{ $tanggal }} </p>
    </div>

    <div class="content">
        <table class="table">
            <thead>

            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky">Nomor</td>
                <td class="tg-0pky" colspan="4">: {{$nomor}}</td>
                <td class="tg-0pky" rowspan="3">Yth. {{ $yth }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Sifat</td>
                <td class="tg-0pky" colspan="4">: {{$sifat}}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Lampiran</td>
                <td class="tg-0pky" colspan="4">: {{$lampiran}}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Hal</td>
                <td class="tg-0pky" colspan="4">: {{$hal}}</td>
                <td class="tg-0pky"></td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="5">Menindaklanjuti </td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="2">Nama</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky" colspan="2">{{ $nama }}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="2">NIM</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky" colspan="2">{{ $nim }}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="2">Prodi</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky" colspan="2">{{ $jurusan }}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="2">Kegiatan yang dilakukan</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky" colspan="2">{{ $kegiatan }}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="2">Judul</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="2">{{ $judul }} </td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="5">Kami berikan ijin</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky" colspan="5">Demikian surat</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4"></td>
                <td class="tg-0pky" colspan="2">Plt Direktur</td>
            </tr>
            </tbody>
        </table>

        <p>Isi surat:</p>
        <p id="letterContent"></p>
    </div>

    <div class="signature">
        <p>Hormat kami,</p>
        <img src="tanda_tangan.png" alt="Tanda Tangan">
        <p>John Doe</p>
        <p>Manajer</p>
    </div>

    <div class="footer">
        <p>&copy; 2023 Perusahaan ABC. Hak Cipta Dilindungi.</p>
    </div>
</div>

<script>
    // Mengatur tanggal saat ini
    var today = new Date();
    var currentDate = today.getDate() + '/' + (today.getMonth()+1) + '/' + today.getFullYear();
    document.getElementById('currentDate').innerHTML = currentDate;

    // Mengatur subjek surat
    var subject = "Contoh Subjek Surat";
    document.getElementById('subject').innerHTML = subject;

    // Mengatur isi surat
    var letterContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac ultricies est, et volutpat dolor. Sed euismod nisl et mauris fermentum, vitae finibus eros iaculis. In at purus auctor, commodo est ut, aliquam mauris. Aenean vel ex rutrum, dignissim elit a, commodo erat. Sed vel nisl sed nibh gravida auctor a vitae mauris. Sed eleifend velit eget tincidunt scelerisque. Mauris a est ultricies, auctor libero at, venenatis risus. Duis pellentesque justo id ipsum volutpat, vitae faucibus lorem dapibus. Pellentesque a fringilla neque, vitae efficitur odio.";
    document.getElementById('letterContent').innerHTML = letterContent;
</script>
</body>
</html>

