<?php

namespace App\Http\Controllers\ReEnrolling;

use App\Http\Controllers\Controller;

class ContractsController extends Controller
{
    public function index(){

        $user = auth()->user();
        $accessLevel = $user->access_level;





        return view('re-enrolling.contracts.index', compact('accessLevel'));

    }
}
