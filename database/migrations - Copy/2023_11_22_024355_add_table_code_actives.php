<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsedForToSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeActives', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('code');
            $table->timestamps();
        });
    }
}