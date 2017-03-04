<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGasPowerSalesEanField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gas_power_sales', function (Blueprint $table) {
            $table->dropColumn('ean');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gas_power_sales', function (Blueprint $table) {
            $table->integer('ean')->after('iban');
        });
    }
}
