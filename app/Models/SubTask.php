<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_task',
        'judul',
        'deskripsi',
        'durasi',
        'created_by',
        'picked_at',
        'done_at',
        'deadline',
        'user_name',
        'judul_task',
        'status'
    ];

    public function usersFromSubTask(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function task(){
        return $this->belongsTo(Task::class, 'id_task');
    }
}
