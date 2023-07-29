<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        echo "halo selamat datang";
        echo "<h1> Halo ". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>LogOut>></a>";
    }

    function admin(){
//        echo "halo admin";
//        echo "<h1> Halo ". Auth::user()->name ."</h1>";
//        echo "<a href='/logout'>LogOut>></a>";

        return view('homeadmin.homeadmin');

    }
    function team(){
//        echo "halo selamat datang";
//        echo "<h1> Halo ". Auth::user()->name ."</h1>";
//        echo "<a href='/logout'>LogOut>></a>";
        return view('homepage.index');
    }
}
