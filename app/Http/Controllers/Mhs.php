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

    public function datasoft(){
        $data= [
            'dataMhs' => Modelmhs::onlyTrashed()->get()
        ];
        return view('mahasiswa.datasoft', $data);
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
            $validateData = $r->validate([
                'nim' => 'required|unique:mahasiswa,nim',
                'nama' => 'required',
                'tlp' => 'required|numeric',
                'alamat' => 'required',
                'institusi' => 'required',

            ],
            [
                'nim.required'=>'NIM tidak boleh kosong',
                'nim.unique'=>'NIM sudah ada',
                'nama.required'=>'Nama Mahasiswa tidak boleh kosong',
                'tlp.required'=>'No HP tidak boleh kosong',
                'alamat.required'=>'Alamat tidak boleh kosong',
                'institusi.required'=>'Nama Institusi tidak boleh kosong',

            ]);


            $mhs = new Modelmhs();
            $mhs->nim = $nim;
            $mhs->namamhs = $nama;
            $mhs->tlpmhs = $tlp;
            $mhs->alamatmhs = $alamat;
            $mhs->institusimhs = $institusi;
            $mhs->save();

            //echo "Data Berhasil Tersimpan";
            $r->session()->flash("msg", "Data Mahasiswa $nama behasil Tersimpan!");
            return redirect('/mhs/index');
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

    public function hapus($id){
        Modelmhs::find($id)->delete();
        return redirect()->back();
    }

    public function restore($id){
        Modelmhs::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id){
        Modelmhs::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}
