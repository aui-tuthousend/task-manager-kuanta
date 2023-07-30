<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


    public function index(){
        $tasks = Task::orderBy('created_at', 'DESC')->get();

        return view('homepage.index', compact('tasks'));
    }

    public function create(){

        return view('homepage.addtask');
    }

    public function show($id){

        $Task = Task::with('subtasks')->findOrFail($id);

//        $subtask = $Task->subtasks;


        return view('homepage.detailtask', compact('Task'));
    }

    public function store(Request $request){

        $user = Auth::user();
        $task =Task::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'created_by' => $user->name,

        ]);
            $idtask = $task->id;
//        $requestdata = $request->all();
//        $requestdata['created_by'] = $user->name;
//
//
//        Task::create($requestdata);



        return redirect('/addtask/addsubtask')->with('success', 'Task Added');
    }


}
