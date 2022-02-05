<?php
// membuat controller sendiri

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myController extends Controller
{
    // membuat fungsi index sendiri untuk beranda praktikum
    public function indexp(){
        return view('berandaprak');
    }

    // fungsi index untuk beranda tugas pada modul
    public function index(){
        return view('template.beranda');
    }

    public function about(){
        return view('template.about');
    }
}
