<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_gas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->uuid('uuid');
            $table->float('fixed_costs', 3, 2)->comment('monthly');
            $table->float('purchase', 6, 5)->comment('bare price');
            $table->float('region_1', 6, 5);
            $table->float('region_2', 6, 5);
            $table->float('region_3', 6, 5);
            $table->float('region_4', 6, 5);
            $table->float('region_5', 6, 5);
            $table->float('region_6', 6, 5);
            $table->float('region_7', 6, 5);
            $table->float('region_8', 6, 5);
            $table->float('region_9', 6, 5);
            $table->float('region_10', 6, 5);
            $table->float('tax', 3, 1);
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
        Schema::dropIfExists('product_gas');
    }
}
