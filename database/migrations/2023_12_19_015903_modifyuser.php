<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Modifyuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->boolean('isCompleteEducation',1)->default(false);
            $table->boolean('isCompletePersonal',1)->default(false);
            $table->boolean('isCompleteExperence',1)->default(false);
            $table->boolean('isCompleteCarrerPath',1)->default(false);
           
            $table->boolean('isCompleteSkill',1)->default(false);
            $table->boolean('isCompleteLangage',1)->default(false);
            $table->boolean('isCompleteActivities',1)->default(false);
            $table->boolean('isCompleteIntroduction',1)->default(false);
            $table->boolean('isCompleteRefferent',1)->default(false);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
