<?php

namespace App\Http\Controllers;

use App\Models\ModelStupen;
use Illuminate\Support\Facades\Storage;
use App\Models\ModelSurat;
use App\Models\Modelmhs;
use Illuminate\Http\Request;

class Surat extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)){
            $dataMahasiswa = ModelSurat::sortable()
                -> where('mahasiswa.nim','like','%'.$cari.'%')
                -> orwhere('mahasiswa.namamhs','like','%'.$cari.'%')
                ->paginate(10)->onEachSide(2)->fragment('pesertadiklat');
        }else{
            $dataMahasiswa = ModelSurat::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat');
        }

//        $data= [
//          'dataMhs' => Modelsurat::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat'),
//        ];
//        perintah with itu sama juga membawa variabel dataMahasiwa
        return view('surat.surat')->with([
            'dataMhs' => $dataMahasiswa,
            'cari' => $cari,
        ]);
    }

//    public function datasoft(){
//        $data= [
//            'dataMhs' => ModelSurat::onlyTrashed()->get()
//        ];
//        return view('mahasiswa.datasoft', $data);
//    }



    public function simpanstupen(Request $r){
        $nomor = $r->nomor;
        $sifat = $r->sifat;
        $lampiran = $r->lampiran;
        $yth = $r->yth;
        $hal = $r->hal;
        $nim = $r->nim;
        $kegiatan = $r-> kegiatan;
        $judul = $r->judul;
        $tanggal = $r->tanggal;


        $validateData = $r->validate([
            'nomor' => 'required|',
            'sifat' => 'required',
            'lampiran' =>'required',
            'yth' => 'required',
            'hal' => 'required',
            'kegiatan' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',

        ],
            [
                'sifat.required'=>'Sifat Surat tidak boleh kosong',
                'lampiran.required'=>'Lapiran tidak boleh kosong',
                'yth.required'=>'Tujuan surat tidak boleh kosong',
                'hal.required'=>'Prihal surat tidak boleh kosong',
                'kegiatan.required'=>'Jenis Kegaitan tidak boleh kosong',
                'judul.required'=>'Judul Penelitian tidak boleh kosong',
                'tanggal.required'=>'Tanggal surat tidak boleh kosong',


            ]);
//            perintah untuk menyimpan foto
//                storeAs('uploads',time().'-'.$nim.'.'.$r->file('foto')->extension()) --perintah untuk memberi nama file
//        if ($r->hasFile('foto')){
//            $path = $r->file('foto')->storeAs('uploads',time().'-'.$nim.'.'.$r->file('foto')->extension());
//        }else{
//            $path='';
//        }

        $stupen = new ModelStupen();
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
        return redirect('/stupen/index');

    }

    public function stupen($id){
        $mhs = ModelSurat::find($id);
        $data = [
            'id' => $id,
            'nim' => $mhs->nim,
            'nama' => $mhs->namamhs,
            'jk'=> $mhs->jk,
            'tlp' => $mhs->tlpmhs,
            'alamat' => $mhs->alamatmhs,
            'institusi' => $mhs->institusimhs,
            'jurusan' => $mhs->jurusanmhs,
            'jenjang' => $mhs->jenjangmhs,
            'foto' => $mhs->fotomhs
        ];
        return view('surat.stupen ', $data);

    }

    public function hapus($id){
        ModelSurat::find($id)->delete();
        return redirect()->back();
    }

    public function restore($id){
        ModelSurat::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id){
        $mhs = ModelSurat::withTrashed()->find($id);
        $pathFoto = $mhs->fotomhs;

        if ($pathFoto != null || $pathFoto !=''){
            Storage::delete($pathFoto);
        }

        ModelSurat::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}
