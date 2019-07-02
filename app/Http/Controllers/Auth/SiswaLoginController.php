<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SiswaLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:siswa')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.siswa-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'nis'  => 'required',
            'password' => 'required|min:6'
        ]);

       if (Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' =>$request->password], $request->remember)) {
        return redirect()->intended(route('siswa.dashboard'));
       }
       return redirect()->back()->withInput($request->only('nis','remember'));
    }
    public function logout()
    {
        Auth::guard('siswa')->logout();
        return redirect('/');
    }
}
