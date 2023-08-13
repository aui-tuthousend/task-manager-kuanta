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

    public function viewAll(){
        $user = Auth::user();
        $subtasks = SubTask::where('id_user', $user->id)->where(function($query) {
            $query->where('status', '=', 'Progres')
                ->orWhereNull('status');
        })->orderBy('created_at', 'DESC')->simplePaginate(5);

//

        return view('homepage.index', compact('subtasks'));
    }

    public function viewDone(){
        $user = Auth::user();
        $subtasks = SubTask::where('id_user', $user->id)->orderBy('created_at', 'DESC')->simplePaginate(5);

//

        return view('homepage.preview.finished', compact('subtasks'));
    }

    public function pick($id){
        $sub = SubTask::find($id);
        $current = Carbon::now('Asia/Jakarta');
        $status = 'Progres';

        $sub->update([
           'picked_at' => $current,
            'status' => $status,
        ]);

        return redirect('/team')->with('Sukses', 'Task picked');
    }

    public function done($id){
        $sub = SubTask::find($id);
        $current = Carbon::now('Asia/Jakarta');
        $status = "Done";

        $sub->update([
            'done_at' => $current,
            'status' => $status
        ]);

        return redirect('/team')->with('Sukses', 'Task picked');
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
        $inputDate = $request->input('deadline');
        $user = Auth::user();

        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);
        $id = $request->input('id_task');
        $judul_task = $request->input('judul_task');

        $requestdata = $request->all();
        $requestdata['id_task'] = $id;
        $requestdata['id_user'] = $selectedUser->id;
        $requestdata['user_name'] = $selectedUser->name;
        $requestdata['deadline'] = $inputDate;
        $requestdata['created_by'] = $user->name;
        $requestdata['judul_task'] = $judul_task;


        SubTask::create($requestdata);
        return redirect(route('preview', $id))->with('success', 'SubTask Added');

    }

    public function store2(Request $request, $idt){
        $inputDate = $request->input('deadline');
        $user = Auth::user();

        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);
        $id = $request->input('id_task');
        $judul_task = $request->input('judul_task');

        $requestdata = $request->all();
        $requestdata['id_task'] = $id;
        $requestdata['id_user'] = $selectedUser->id;
        $requestdata['user_name'] = $selectedUser->name;
        $requestdata['deadline'] = $inputDate;
        $requestdata['created_by'] = $user->name;
        $requestdata['judul_task'] = $judul_task;


        SubTask::create($requestdata);

    $apikey="50aa19d21fdf65a13519716230fa32004b79ceda";
    $tujuan="6281334327567"; //atau $tujuan="Group Chat Name";
    $pesan="Hiii ini pesan test.";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message='.rawurlencode($pesan).'&tujuan='.rawurlencode($tujuan.'@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: '.$apikey
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

        return redirect(route('update', $id))->with('success', 'SubTask Added');

    }



    public function editStore(Request $request, $idt)
    {

        $sub = SubTask::find($idt);
        $selectedUserId = $request->input('selected_user');
        $selectedUser = User::find($selectedUserId);
        $inputDate = $request->input('deadline');

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
            'deadline'=>$inputDate
        ]);


        return redirect (route('update', $idTask))->with('success', 'SubTask Updated');
    }

    public function download(Request $request){
        $user_id = $request->input('user_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $user = User::find($user_id);

        $subtasks = Subtask::where('id_user', $user_id)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        return view('homeadmin.download.export', compact('subtasks', 'user'));
    }

    public function delete($id){
        $sub = SubTask::find($id);

        $idt = $sub->id_task;
        $sub->delete();

        return redirect(route('update', $idt))->with('success', 'SubTask Deleted');

    }
}
