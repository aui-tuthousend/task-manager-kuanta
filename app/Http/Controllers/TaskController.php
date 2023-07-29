<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function index(){
        $tasks = Task::orderBy('created_at', 'DESC')->get();

        return view('homepage.index', compact('tasks'));
    }

    public function create(){

        return view('homepage.addtask');
    }

    public function detail(){

        return view('homepage.detailtask');
    }

}
