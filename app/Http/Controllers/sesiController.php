<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sesiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login',
        );

        return view('login',$data);
    }
    
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib diisi',
            'password.required' => 'Password Wajib diisi'
        ]);

        $infologin =[
            'email' => $request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'manajer') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'staff'){
                return redirect('/admin/staff');
            }
        } else {
            return redirect('')->withErrors('Email atau password tidak sesuai')->withInput();
        }
    }
    
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
