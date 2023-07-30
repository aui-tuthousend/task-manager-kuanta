<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'created_by',
    ];


    public function userFromTask(){
        return $this->belongsTo(User::class);
    }

    public function subtasks(){
        return $this->hasMany(SubTask::class, 'id_task');
    }
}
