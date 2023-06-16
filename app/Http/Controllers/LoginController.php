<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if ($user = Auth::user()){
            if ($user->level=='1'){
                return redirect()->intended('beranda');
            }elseif ($user->level=='2'){
                return redirect()->intended('dashboard');
            }
        }
        return view('login.view_login');
    }

    public function proses(Request $request)
    {

    }
}
