<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGvoCo2ProductGas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_gas', function (Blueprint $table) {
            $table->float('co2', 6, 5)->after('region_10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_gas', function (Blueprint $table) {
            $table->dropColumn('co2');
        });
    }
}
