<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('invoice_number');
            $table->string('invoice_date');
         
          
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('company_name');
            $table->float('row_sub_total');
            $table->float('discount_value');
            $table->float(' discount_type');
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
