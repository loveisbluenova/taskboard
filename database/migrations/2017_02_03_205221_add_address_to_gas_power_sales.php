<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToGasPowerSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gas_power_sales', function ($table) {
            $table->string('country', 2)->nullable()->after('file_id');
            $table->string('zip', 25)->nullable()->after('file_id');
            $table->string('state')->nullable()->after('file_id');
            $table->string('city')->nullable()->after('file_id');
            $table->string('address')->nullable()->after('file_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function ($table) {
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip');
            $table->dropColumn('country');
        });
    }
}
