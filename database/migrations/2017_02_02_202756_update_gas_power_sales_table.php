<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGasPowerSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gas_power_sales', function (Blueprint $table) {
            $table->dropColumn('company_id');
            $table->integer('customer_id')->after('user_id');
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
            $table->dropColumn('customer_id');
            $table->integer('company_id')->after('user_id');
        });
    }
}
