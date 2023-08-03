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

    public function indexadmin(){
        $tasks = Task::orderBy('created_at', 'DESC')->get();

        return view('homeadmin.indexadmin', compact('tasks'));
    }

    public function create(){

        return view('homepage.add.addtask');
    }

    public function show($id){

        $Task = Task::with('subtasks')->findOrFail($id);

//        $subtask = $Task->subtasks;

        return view('homepage.preview.detailtask', compact('Task'));
    }

    public function showadmin($id){
        $Task = Task::with('subtasks')->FindOrFail($id);
        return view('homeadmin.detailtaskadmin',compact('Task'));
    }

    public function store(Request $request){

        $user = Auth::user();
        $task =Task::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'created_by' => $user->name,

        ]);
//        $requestdata = $request->all();
//        $requestdata['created_by'] = $user->name;
//
//
//        Task::create($requestdata);
//            $idtask = $task->id;
        session()->put('task', $task);
        $idtask = session('task')->getAttribute('id');



        return redirect()->route('preview', $idtask)->with('success', 'Task Added');
    }


}
