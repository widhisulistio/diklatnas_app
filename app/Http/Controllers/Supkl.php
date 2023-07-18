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
}
