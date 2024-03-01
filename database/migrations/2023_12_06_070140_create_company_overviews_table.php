<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('companyId')->nullable();
            $table->string('openning')->nullable();
            $table->string('name')->nullable();
            $table->string('headAddreess')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

        });
        Schema::table('codeactives', function($table) {
            $table->char('status',1)->default('1');
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_overviews');
    }
}
