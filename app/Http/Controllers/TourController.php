<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    //
    public function index(){
        return view('public.tour.index');
    }

    public function show(){
        return view('public.tour.show');
    }
}
