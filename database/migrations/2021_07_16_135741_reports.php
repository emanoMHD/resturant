<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('report_number');
            $table->string('report_date');
            $table->string('vendor_name');
          
            $table->string('vendor_email');
         
            $table->float('row_sub_total');
            $table->float('discount_value');
            $table->float('VAT_value');
           
            $table->float('shipping');
            $table->float('total_due');
         
          
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
