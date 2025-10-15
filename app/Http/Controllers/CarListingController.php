<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarListingController extends Controller
{
    public function carlist()
    {
        return view('pages.carlist');
    }
}
