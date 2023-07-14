<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelmhs;
use App\Models\ModelStupen;
use App\Models\ModelSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Stupen extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)){
            $dataStupen = ModelStupen::sortable()
                -> where('stupen.nim','like','%'.$cari.'%')
                -> orwhere('stupen.nomor','like','%'.$cari.'%')
                -> orwhere('mahasiswa.namamhs', 'like','%'.$cari.'%')
                -> join ('mahasiswa','stupen.nim','=','mahasiswa.nim')
                -> select ('stupen.*','mahasiswa.namamhs')
                -> paginate(10)->onEachSide(2)->fragment('pesertadiklat');

        }else{
            $dataStupen = ModelStupen::sortable()
                -> join ('mahasiswa','stupen.nim','=','mahasiswa.nim')
                -> select ('stupen.*','mahasiswa.namamhs')
                -> paginate(10)->onEachSide(2)->fragment('pesertadiklat');
        }
//        echo $cari;
//        exit();

//        $data= [
//          'dataMhs' => Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat'),
//        ];
//        perintah with itu sama juga membawa variabel dataMahasiwa
//        dd($dataStupen);
        return view('surat.datastupen')->with([
            'dataStupen' => $dataStupen,
            'cari' => $cari,
        ]);

    }
    public function editstupen($id){
        $datastupen = ModelStupen::join ('mahasiswa','stupen.nim','=','mahasiswa.nim')->find($id);

//        echo $datastupen;
//        exit();
        $data = [
            'id' => $id,
            'nomor' => $datastupen->nomor,
            'sifat' => $datastupen->sifat,
            'lampiran'=> $datastupen->lampiran,
            'yth'=> $datastupen->yth,
            'hal'=> $datastupen->hal,
            'nim' => $datastupen->nim,
            'kegiatan' => $datastupen->kegiatan,
            'judul'=> $datastupen->judul,
            'tanggal'=> $datastupen->tanggal,
            'nama' => $datastupen->namamhs,
            'jk'=> $datastupen->jk,
            'tlp' => $datastupen->tlpmhs,
            'alamat' => $datastupen->alamatmhs,
            'institusi' => $datastupen->institusimhs,
            'jurusan' => $datastupen->jurusanmhs,
            'jenjang' => $datastupen->jenjangmhs,
        ];
        return view('surat.editdatastupen', $data);

    }

    public function cetakstupen($id){
        $cetakstupen = ModelStupen::join ('mahasiswa','stupen.nim','=','mahasiswa.nim')->find($id);

        $tgl_id = $cetakstupen->tanggal;

        switch (date('m', strtotime($tgl_id))){
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;

            default:
                $bulan = 'tidak diketahui';
                break;
        }

//        echo $cetakstupen;
//        exit();
   // dd($cetakstupen);

        $data = [
            'id' => $id,
            'nomor' => $cetakstupen->nomor,
            'sifat' => $cetakstupen->sifat,
            'lampiran'=> $cetakstupen->lampiran,
            'yth'=> $cetakstupen->yth,
            'hal'=> $cetakstupen->hal,
            'nim' => $cetakstupen->nim,
            'kegiatan' => $cetakstupen->kegiatan,
            'judul'=> $cetakstupen->judul,
            'tanggal'=> date('d',strtotime($tgl_id)). ' ' .$bulan.' '. date('Y',strtotime($tgl_id)),
            'nama' => $cetakstupen->namamhs,
            'jk'=> $cetakstupen->jk,
            'tlp' => $cetakstupen->tlpmhs,
            'alamat' => $cetakstupen->alamatmhs,
            'institusi' => $cetakstupen->institusimhs,
            'jurusan' => $cetakstupen->jurusanmhs,
            'jenjang' => $cetakstupen->jenjangmhs,
        ];
        return view('surat.printhasilstupen', $data);
    }

    public function editstupendua($id){
        $datastupen2 = ModelStupen::join ('mahasiswa','stupen.nim','=','mahasiswa.nim')->find($id);

//        echo $datastupen;
//        exit();
        $data = [
            'id' => $id,
            'nomor' => $datastupen2->nomor,
            'sifat' => $datastupen2->sifat,
            'lampiran'=> $datastupen2->lampiran,
            'yth'=> $datastupen2->yth,
            'hal'=> $datastupen2->hal,
            'nim' => $datastupen2->nim,
            'kegiatan' => $datastupen2->kegiatan,
            'judul'=> $datastupen2->judul,
            'tanggal'=> $datastupen2->tanggal,
            'nama' => $datastupen2->namamhs,
            'jk'=> $datastupen2->jk,
            'tlp' => $datastupen2->tlpmhs,
            'alamat' => $datastupen2->alamatmhs,
            'institusi' => $datastupen2->institusimhs,
            'jurusan' => $datastupen2->jurusanmhs,
            'jenjang' => $datastupen2->jenjangmhs,
        ];
        return view('surat.editdatastupendua', $data);

    }

    public function update (Request $r){ //nama variabel $itu terserah mau dikasih nama apa

        $id = $r->id;
        $nomor = $r->nomor;
        $sifat = $r->sifat;
        $lampiran = $r->lampiran;
        $yth = $r->yth;
        $hal = $r->hal;
        $nim = $r->nim;
        $kegiatan = $r-> kegiatan;
        $judul = $r->judul;
        $tanggal = $r->tanggal;

        $stupen = ModelStupen::find($id);
        $stupen->nomor = $nomor;
        $stupen->sifat= $sifat;
        $stupen->lampiran = $lampiran;
        $stupen->yth = $yth;
        $stupen->hal = $hal;
        $stupen->nim = $nim;
        $stupen->kegiatan = $kegiatan;
        $stupen->judul = $judul;
        $stupen->tanggal = $tanggal;
        $stupen->save();
        //echo "Data Berhasil Tersimpan";
        $r->session()->flash("msg", "Data Mahasiswa $nim behasil Tersimpan!");
        return redirect('/stupen/index/');
    }
    public function hapus($id){
        ModelStupen::find($id)->delete();
        return redirect()->back();
    }

}
