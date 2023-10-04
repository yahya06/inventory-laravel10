<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home page',
        );

        return view('index',$data);
        // return view('home',$data);
    }
}
