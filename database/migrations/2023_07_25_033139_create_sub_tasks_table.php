<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_task');
            $table->string('judul');
            $table->string('deskripsi');
            $table->integer('durasi');
            $table->string('created_by');
            $table->timestamp('picked_at')->nullable();
            $table->timestamp('done_at')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->timestamps();

            @$table->foreign('id_user')
                ->references('id')->on('users');

            @$table->foreign('id_task')
                ->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_tasks');
    }
};
