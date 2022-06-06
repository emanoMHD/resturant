<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MainCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 


        Schema::create('main_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('translation_lang');
            $table->unsignedInteger('translation_of');
            $table->string('name');
            $table->string('photo');
            $table->unsignedInteger('active');
            $table->timestamps();
        });
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
