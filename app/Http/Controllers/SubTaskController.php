<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{

    public function index(){
        $subtasks = SubTask::orderBy('created_at', 'DESC')->get();

        return view('homepage.addtask', compact('subtasks'));
    }

    public function create(){

        return view('homepage.addsubtask');
    }
}
