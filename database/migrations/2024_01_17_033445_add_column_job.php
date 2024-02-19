<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            // $table->json('tags')->nullable();
        });

        Schema::table('blogs', function (Blueprint $table) {
            
            // $table->string('authorPost')->nullable();
        });

        // Schema::table('history_actions', function (Blueprint $table) {
        //     $table->integer('userId')->nullable();
        //     $table->integer('jobId')->nullable();
        //     $table->integer('userNotification')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
