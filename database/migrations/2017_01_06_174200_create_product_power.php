<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPower extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_power', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->uuid('uuid');
            $table->float('fixed_costs', 3, 2)->comment('monthly');
            $table->float('single', 6, 5)->comment('bare price');
            $table->float('normal', 6, 5)->comment('bare price');
            $table->float('low', 6, 5)->comment('bare price');
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
        Schema::dropIfExists('product_power');
    }
}
