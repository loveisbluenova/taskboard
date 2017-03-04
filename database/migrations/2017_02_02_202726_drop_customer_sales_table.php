<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCustomerSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('customer_sales');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('customer_sales', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('sale_id');
            $table->string('file_id');
            $table->enum('type', ['gas','power','gas power']);

            $table->unique(['customer_id', 'sale_id']);
        });
    }
}
