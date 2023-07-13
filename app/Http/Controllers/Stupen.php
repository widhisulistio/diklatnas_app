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
            'tanggal'=> $cetakstupen->tanggal,
            'nama' => $cetakstupen->namamhs,
            'jk'=> $cetakstupen->jk,
            'tlp' => $cetakstupen->tlpmhs,
            'alamat' => $cetakstupen->alamatmhs,
            'institusi' => $cetakstupen->institusimhs,
            'jurusan' => $cetakstupen->jurusanmhs,
            'jenjang' => $cetakstupen->jenjangmhs,
        ];
        return view('surat.cetakstupen', $data);
    }
    public function update (Request $r){ //nama variabel $itu terserah mau dikasih nama apa
        $id = $r->id;
        $nim = $r->nim;
        $nama = $r->nama;
        $jk = $r->jk;
        $tlp = $r->tlp;
        $alamat = $r->alamat;
        $institusi = $r->institusi;
        $jurusan = $r->jurusan;
        $jenjang = $r->jenjang;

        if ($r->hasFile('foto')){
            $path = $r->file('foto')->storeAs('uploads',time().'-'.$nim.'.'.$r->file('foto')->extension());
        }else{
            $path='';
        }

        $validateData = $r->validate([
            'foto' => 'mimes:jpg,png,jpeg|image|max:1024',
        ]);
        ///dd($r);
        //echo $id;
        //exit();

        $mhs = ModelStupen::find($id);
        $pathFoto = $mhs->fotomhs;

        if ($pathFoto !=null || $pathFoto!=''){
            Storage::delete($pathFoto);
        }

        $mhs->nim = $nim;
        $mhs->namamhs = $nama;
        $mhs->jk = $jk;
        $mhs->tlpmhs = $tlp;
        $mhs->alamatmhs = $alamat;
        $mhs->institusimhs = $institusi;
        $mhs->jurusanmhs = $jurusan;
        $mhs->jenjangmhs = $jenjang;
        $mhs->fotomhs = $path;
        $mhs->save();

        //echo "Data Berhasil Tersimpan";
        $r->session()->flash("msg", "Data Mahasiswa $nama behasil diupdate!");
        return redirect('/mhs/index');

    }

}
