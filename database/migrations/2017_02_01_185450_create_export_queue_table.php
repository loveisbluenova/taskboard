<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExportQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_queue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->index();
            $table->enum('type', ['gas','power','gas power']);
            $table->timestamp('queued_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('export_queue');
    }
}
