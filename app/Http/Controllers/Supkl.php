<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelmhs;
use App\Models\ModelSupkl;
use http\Env\Response;
use Illuminate\Http\Request;

class Supkl extends Controller
{
    public function index()
    {
        return view('surat.tambahsupkl');
    }

    public function selectmhs()
    {
//        $data = ModelSupkl::where('namamhs', 'LIKE', '%' . request('q') . '%');
        $data = Modelmhs::select('id', 'namamhs','nim')->get();

        return response()->json($data);

    }
    public function save(Request $r){
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
        return redirect('/stupen/edit/'.$stupen->id);

    }
}
