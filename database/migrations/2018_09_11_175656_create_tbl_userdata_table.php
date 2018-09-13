<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_userdata', function (Blueprint $table) {
            $table->increments('userdata_id');
            $table->text('card_name');
            $table->integer('user_id');
            $table->longText('user_description');
            $table->longText('uncoverd_description');
            $table->integer('count_star');
            $table->integer('max_star');
            $table->string('card_image');
            $table->integer('publication_status');
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
        Schema::dropIfExists('userdata');
    }
}
