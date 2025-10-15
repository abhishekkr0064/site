<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarBookingController extends Controller
{
    public function CarBooking()
    {
        return view('pages.car-booking');
    }
    public function MyBooking()
    {
        return view('pages.my-booking');
    }
}
