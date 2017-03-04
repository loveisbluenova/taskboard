<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasPowerSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_power_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->index();
            $table->integer('user_id')->index();
            $table->integer('company_id')->nullable();
            $table->uuid('product_uuid');
            $table->string('file_id');
            $table->string('iban', 40)->nullable();
            $table->integer('ean');
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
        Schema::drop('gas_power_sales');
    }
}
