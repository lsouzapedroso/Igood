<?php

namespace App\Http\Controllers\Verificar;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ReadTaskController extends Controller
{
    public function create(Request $request){
        $task = Task::find($request->id);
        return view('task.readTask')->with('task', $task);
    }
}
