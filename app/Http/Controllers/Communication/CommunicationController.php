<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;

class CommunicationController extends Controller
{
    public function index()
    {
        return view('communication.options');
    }
}
