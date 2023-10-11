<?php

namespace App\Http\Controllers\ReEnrolling;

use App\Http\Controllers\Controller;
use App\Models\ReEnrollingStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function statusIndex()
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;

        $statuses = ReEnrollingStatus::All();
        return view('re-enrolling.controller.status', ['statuses' => $statuses], compact('accessLevel'));
    }

    public function statusNew()
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;

        return view('re-enrolling.controller.create-status', compact('accessLevel'));
    }


    public function createStatus(Request $request)
    {
        $user = auth()->user();
        $accessLevel = $user->access_level;

        $data = [
            'status' => $request->input('status'),
        ];

        $status = $request->input('status');

        $exists = ReEnrollingStatus::where('status', $status)->exists();

        if ($exists) {
            return redirect('/status');
        } else {
            ReEnrollingStatus::create($data);
            return redirect('/status');
        }
    }
}
