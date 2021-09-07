<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->string('name', 128);
            $table->integer('ins_id');
            $table->integer('upd_id')->nullable();
            $table->dateTime('ins_datetime');
            $table->dateTime('upd_datetime')->nullable();
            $table->char('del_flag', 1)->default(0)->comment("0: Active, 1: Deleted");
            $table->foreign('group_id')->references('id')->on('m_groups');
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
        Schema::dropIfExists('m_teams');
    }
}
