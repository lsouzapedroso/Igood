<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function create(){
        $user = auth()->user();
        return view('dashboard');
    }
}
