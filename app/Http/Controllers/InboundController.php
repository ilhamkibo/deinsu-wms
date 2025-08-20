<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboundController extends Controller
{
    public function index()
    {
        return view('inbound.index');
    }
}
