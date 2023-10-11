<?php

namespace App\Http\Controllers\ReEnrolling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReEnrollingContactsController extends Controller
{
    public function index()
    {
        return view('re-enrolling.contacts');
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'cpf' => $request->input('cpf'),
            'phone' => $request->input('phone'),
        ];

    }

}
