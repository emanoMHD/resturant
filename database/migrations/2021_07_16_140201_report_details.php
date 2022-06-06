<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReportDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('report_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('unite');
            $table->float('quantity');
            $table->string('unite_price');
            $table->float('sub_total');
            $table->float('row_sub_total');
            $table->float('discount_value');
            $table->float('VAT_value');
           
            $table->float('shipping');
            $table->float('total_due');
            $table->unsignedInteger('invoice_id');
          
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
