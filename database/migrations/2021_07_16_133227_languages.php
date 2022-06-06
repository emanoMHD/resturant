<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Languages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::create('languages', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('abbr');
        $table->string('direction');
      
        $table->string('local');
        $table->string('name');
       
        $table->unsignedInteger('active')->default(1);
      
        $table->timestamps();
    });
    //
        //
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
