<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Modelmhs;
use Illuminate\Http\Request;

class Mhs extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)){
            $dataMahasiswa = Modelmhs::sortable()
                -> where('mahasiswa.nim','like','%'.$cari.'%')
                -> orwhere('mahasiswa.namamhs','like','%'.$cari.'%')
                ->paginate(10)->onEachSide(2)->fragment('pesertadiklat');
        }else{
            $dataMahasiswa = Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat');
        }

//        $data= [
//          'dataMhs' => Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat'),
//        ];
//        perintah with itu sama juga membawa variabel dataMahasiwa
        return view('mahasiswa.data')->with([
            'dataMhs' => $dataMahasiswa,
            'cari' => $cari,
        ]);
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
        $jk = $r->jk;
        $tlp = $r->tlp;
        $alamat = $r->alamat;
        $institusi = $r->institusi;
        $jurusan = $r->jurusan;
        $jenjang= $r->jenjang;



            $validateData = $r->validate([
                'nim' => 'required|unique:mahasiswa,nim',
                'nama' => 'required',
                'jk' =>'required',
                'tlp' => 'required|numeric',
                'alamat' => 'required',
                'institusi' => 'required',
                'jurusan' => 'required',
                'jenjang' => 'required',
                'foto' => 'mimes:jpg,png,jpeg|image|max:1024',

            ],
            [
                'nim.required'=>'NIM tidak boleh kosong',
                'nim.unique'=>'NIM sudah ada',
                'nama.required'=>'Nama Mahasiswa tidak boleh kosong',
                'jk.required'=>'Jenis Kelamin Mahasiswa tidak boleh kosong',
                'tlp.required'=>'No HP tidak boleh kosong',
                'alamat.required'=>'Alamat tidak boleh kosong',
                'institusi.required'=>'Nama Institusi tidak boleh kosong',
                'jurusan.required'=>'Jurusan tidak boleh kosong',
                'jenjang.required'=>'Jenjang tidak boleh kosong',

            ]);
//            perintah untuk menyimpan foto
//                storeAs('uploads',time().'-'.$nim.'.'.$r->file('foto')->extension()) --perintah untuk memberi nama file
            if ($r->hasFile('foto')){
                $path = $r->file('foto')->storeAs('uploads',time().'-'.$nim.'.'.$r->file('foto')->extension());
            }else{
                $path='';
            }


            $mhs = new Modelmhs();
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
            $r->session()->flash("msg", "Data Mahasiswa $nama behasil Tersimpan!");
            return redirect('/mhs/index');

    }

    public function edit($id){
        $mhs = Modelmhs::find($id);
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
        return view('mahasiswa.edit', $data);
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

            $mhs = Modelmhs::find($id);
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

    public function hapus($id){
        Modelmhs::find($id)->delete();
        return redirect()->back();
    }

    public function restore($id){
        Modelmhs::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id){
        $mhs = Modelmhs::withTrashed()->find($id);
        $pathFoto = $mhs->fotomhs;

        if ($pathFoto != null || $pathFoto !=''){
            Storage::delete($pathFoto);
        }

        Modelmhs::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}
