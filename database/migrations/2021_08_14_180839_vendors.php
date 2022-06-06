<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('name');
            $table->string('mobile');
            $table->string('password');
            $table->string('address');
            $table->string('email');
            $table->integer('active');
         
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
        Schema::dropIfExists('Vendors');
    }
}
