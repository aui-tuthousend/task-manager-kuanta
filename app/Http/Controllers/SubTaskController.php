<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use App\Models\Task;
use App\Models\User;
use Carbon\Doctrine\DateTimeType;
use Faker\Provider\DateTime;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SubTaskController extends Controller
{

    public function index(){
        $subtasks = SubTask::orderBy('created_at', 'DESC')->get();

        return view('homepage.addtask', compact('subtasks'));
    }

    public function indexdetail($id){
        $task = Task::findOrFail($id);

        $subtasks = $task->subtasksFromTask;

        return view('homepage.detailtask', compact('task', 'subtasks'));
    }

    public function preview($id){
        $Task = Task::with('subtasks')->findOrFail($id);

        return view('homepage.previewtask', compact('Task'));
    }

    public function create($id){
//
//

        return view('homepage.addsubtask');
    }

    public function store(Request $request, $idt){

//        $request->validate([
//           'deadline' => 'required|date',
//        ]);
//        $reqdate = $request->input('deadline');
        $deadline = Carbon::createFromFormat('d-m-Y', $request->input('deadline'))->format('Y-m-d H:i:s');
        $user = Auth::user();

        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);
        $id = $request->input('id_task');

        $requestdata = $request->all();
        $requestdata['id_task'] = $id;
        $requestdata['id_user'] = $selectedUser->id;
        $requestdata['deadline'] = $deadline;
        $requestdata['created_by'] = $user->name;


        SubTask::create($requestdata);

//        $prev = \Illuminate\Support\Facades\URL::previous();
//        $twprev = back()->getTargetUrl();

        return redirect(route('preview', $id))->with('success', 'SubTask Added');

    }
}
