<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelmhs;
use App\Models\ModelStupen;
use Illuminate\Http\Request;

class Stupen extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)){
            $dataStupen = ModelStupen::sortable()
                -> where('stupen.nim','like','%'.$cari.'%')
                -> orwhere('stupen.nomor','like','%'.$cari.'%')
                ->paginate(10)->onEachSide(2)->fragment('pesertadiklat');
        }else{
            $dataStupen = ModelStupen::sortable()->paginate(10)->onEachSide(2)->fragment('daftarstupen');
        }

//        $data= [
//          'dataMhs' => Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('pesertadiklat'),
//        ];
//        perintah with itu sama juga membawa variabel dataMahasiwa
        return view('mahasiswa.datastupen')->with([
            'dataStupen' => $dataStupen,
            'cari' => $cari,
        ]);
    }
}
