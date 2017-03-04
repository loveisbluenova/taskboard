<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGasPowerSalesEanField extends Migration
{
    public function up()
    {
        Schema::table('gas_power_sales', function (Blueprint $table) {
            $table->string('ean', 18)->after('iban');
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
            $table->dropColumn('ean');
        });
    }
}
