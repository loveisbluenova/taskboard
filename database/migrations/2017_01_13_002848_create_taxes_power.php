<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesPower extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes_power', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('year')->unique();
            $table->float('group_xs', 7, 6)->comment('0-10.000');
            $table->float('group_md', 7, 6)->comment('10.000-50.000');
            $table->float('group_lg', 7, 6)->comment('50.000-10.000.000');
            $table->float('group_xl', 7, 6)->comment('>10.000.000');
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
        Schema::dropIfExists('taxes_power');
    }
}
