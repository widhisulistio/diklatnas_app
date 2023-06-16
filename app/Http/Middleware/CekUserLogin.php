<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
//    tambahkan parameter $rules yang mengatur masuknya sebagai level apa
    public function handle(Request $request, Closure $next, $rules)
    {
        //jagan lupa panggil class Auth
        if (!Auth::check()){
            return redirect('login');
        }

        $user = Auth::user();
        if ($user->level==$rules){
            return $next($request);
        }

        return redirect('login')->with('error', "Kamu tidak ada akses");

//        return $next($request);

        //middleware yang dibuat harus didaftarkan pada kernelnya supaya bisa terbaca, buka middleware-->kernel
    }
}
