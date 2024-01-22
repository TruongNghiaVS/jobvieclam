<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteForJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_for_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('jobId')->nullable();
            $table->string('statusOld')->nullable();
            $table->string('statusNew')->nullable();
            $table->string('Noted')->nullable();
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_for_jobs');
    }
}
