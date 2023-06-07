<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelmhs;
use Illuminate\Http\Request;

class Mhs extends Controller
{
    public function index()
    {
        $data= [
          'dataMhs' => Modelmhs::all()
        ];
        return view('mahasiswa.data', $data);
    }

    public function add(){
        return view('mahasiswa.formtambah');
    }

    public function save(Request $r){
        $nim = $r->nim;
        $nama = $r->nama;
        $tlp = $r->tlp;
        $alamat = $r->alamat;
        $institusi = $r->institusi;

        try {
            $mhs = new Modelmhs();
            $mhs->nim = $nim;
            $mhs->namamhs = $nama;
            $mhs->tlpmhs = $tlp;
            $mhs->alamatmhs = $alamat;
            $mhs->institusimhs = $institusi;
            $mhs->save();

            //echo "Data Berhasil Tersimpan";
            $r->session()->flash("msg", "Data Mahasiswa $nama behasil Tersimpan!");
            return redirect('/mhs/tambah');
        }catch (Throwable $e){
            echo $e;
        }
    }

    public function edit($id){
        $mhs = Modelmhs::find($id);
        $data = [
            'id' => $id,
            'nim' => $mhs->nim,
            'nama' => $mhs->namamhs,
            'tlp' => $mhs->tlpmhs,
            'alamat' => $mhs->alamatmhs,
            'institusi' => $mhs->institusimhs
        ];
        return view('mahasiswa.edit', $data);
    }

    public function update (Request $r){ //nama variabel $itu terserah mau dikasih nama apa
        $id = $r->id;
        $nim = $r->nim;
        $nama = $r->nama;
        $tlp = $r->tlp;
        $alamat = $r->alamat;
        $institusi = $r->institusi;
        ///dd($r);
        //echo $id;
        //exit();
        try {
            $mhs = Modelmhs::find($id);
            $mhs->nim = $nim;
            $mhs->namamhs = $nama;
            $mhs->tlpmhs = $tlp;
            $mhs->alamatmhs = $alamat;
            $mhs->institusimhs = $institusi;
            $mhs->save();

            //echo "Data Berhasil Tersimpan";
            $r->session()->flash("msg", "Data Mahasiswa $nama behasil diupdate!");
            return redirect('/mhs/index');
        }catch (Throwable $e){
            echo $e;
        }
    }
}
