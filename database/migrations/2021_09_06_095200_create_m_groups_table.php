<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateMGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->integer('ins_id');
            $table->integer('upd_id')->Nullable();
            $table->char('del_flag', 1)->default(0)->comment("0: Active, 1: Deleted");
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
        Schema::dropIfExists('m_groups');
    }
}
