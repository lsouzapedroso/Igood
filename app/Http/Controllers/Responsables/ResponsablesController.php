<?php

namespace App\Http\Controllers\Responsables;

use App\Http\Controllers\Controller;

class ResponsablesController extends Controller
{
    public function index(){

        $user = auth()->user();
        $accessLevel = $user->access_level;

        return view('responsables.index', compact('accessLevel'));

    }
}
