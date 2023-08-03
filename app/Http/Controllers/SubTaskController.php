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

//    public function index(){
//        $subtasks = SubTask::orderBy('created_at', 'DESC')->get();
//
//        return view('homepage.addtask', compact('subtasks'));
//    }
    public function viewAll(){
        $user = Auth::user();
        $subtasks = SubTask::where('id_user', $user->id)->orderBy('created_at', 'DESC')->get();

//

        return view('homepage.index', compact('subtasks'));
    }

    public function indexdetail($id){
        $task = Task::findOrFail($id);

        $subtasks = $task->subtasksFromTask;

        return view('homepage.detailtask', compact('task', 'subtasks'));
    }

    public function preview($id){
        $Task = Task::with('subtasks')->findOrFail($id);

        return view('homepage.preview.previewtask', compact('Task'));
    }

    public function update($id){
        $Task = Task::with('subtasks')->findOrFail($id);

        return view('homepage.update.update', compact('Task'));
    }

    public function edit($id){
        $Task = SubTask::findOrFail($id);
        $users = User::orderBy('role', 'ASC')->get();

        return view('homepage.update.editsubtask', compact('Task', 'users'));
    }

    public function create($id){
//
//

        return view('homepage.add.addsubtask');
    }

    public function create2($id){
         $Task = Task::find($id);
        $users = User::orderBy('role', 'ASC')->get();


        return view('homepage.update.addsub', compact('Task', 'users'));
    }

    public function store(Request $request, $idt){
        $deadline = Carbon::createFromFormat('d-m-Y', $request->input('deadline'))->format('Y-m-d H:i:s');
        $user = Auth::user();

        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);
        $id = $request->input('id_task');
        $judul_task = $request->input('judul_task');

        $requestdata = $request->all();
        $requestdata['id_task'] = $id;
        $requestdata['id_user'] = $selectedUser->id;
        $requestdata['user_name'] = $selectedUser->name;
        $requestdata['deadline'] = $deadline;
        $requestdata['created_by'] = $user->name;
        $requestdata['judul_task'] = $judul_task;


        SubTask::create($requestdata);
        return redirect(route('preview', $id))->with('success', 'SubTask Added');

    }

    public function store2(Request $request, $idt){
        $deadline = Carbon::createFromFormat('d-m-Y', $request->input('deadline'))->format('Y-m-d H:i:s');
        $user = Auth::user();

        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);
        $id = $request->input('id_task');
        $judul_task = $request->input('judul_task');

        $requestdata = $request->all();
        $requestdata['id_task'] = $id;
        $requestdata['id_user'] = $selectedUser->id;
        $requestdata['user_name'] = $selectedUser->name;
        $requestdata['deadline'] = $deadline;
        $requestdata['created_by'] = $user->name;
        $requestdata['judul_task'] = $judul_task;


        SubTask::create($requestdata);
        return redirect(route('update', $id))->with('success', 'SubTask Added');

    }

    public function delete($id){
        $sub = SubTask::find($id);

        $idt = $sub->id_task;
        $sub->delete();

        return redirect(route('update', $idt))->with('success', 'SubTask Deleted');

    }

    public function editStore(Request $request, $idt)
    {

        $sub = SubTask::find($idt);
        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);

        $deadline = Carbon::createFromFormat('d-m-Y', $request->input('deadline'))->format('d-m-Y H:i:s');
//        $deadline = Carbon::createFromFormat('d-m-Y H:i', $request->input('deadline'))->format('Y-m-d H:i:s');

        $user = Auth::user();

        $idTask = $request->input('id_task');
        $judultask =$request->input('judul_task');
        $des =$request->input('deskripsi');
        $jud =$request->input('judul');

        $sub->update([
            'judul'=>$jud,
            'deskripsi'=>$des,
            'id_task'=>$idTask,
            'id_user'=>$selectedUser->id,
            'judul_task'=>$judultask,
            'user_name'=>$selectedUser->name,
            'created_by'=>$user->name,
            'deadline'=>$deadline
        ]);


        return redirect (route('update', $idTask))->with('success', 'SubTask Updated');
    }
    public function deleteadmin($id){
        $sub = SubTask::find($id);

        $idt = $sub->id_task;
        $sub->delete();

        return redirect(route('preview', $idt))->with('success','Task Deleted');
    }
}
