<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblStaticalarmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staticalarm', function (Blueprint $table) {
            $table->increments('alarm_id');
            $table->text('topbell_alarm');
            $table->text('leftinfo_alarm');
            $table->text('rightinfo_alarm');
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
        Schema::dropIfExists('staticalarm');
    }
}
