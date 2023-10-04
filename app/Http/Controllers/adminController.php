<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    function index(){
        $data = array(
            'title' => 'Homepage',
        );
        return view('admin',$data);
    }

    function manajer(){
        $data = array(
            'title' => 'Homepage',
        );
        return view('admin',$data);
    }

    function staff(){
        $data = array(
            'title' => 'Homepage',
        );
        return view('admin',$data);
    }
}
