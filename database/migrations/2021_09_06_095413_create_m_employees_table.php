<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->string('email', 128);
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->char('gender', 1)->comment("1: Nam, 2: Nữ");
            $table->date('birthday');
            $table->string('address', 256);
            $table->string('avatar', 128);
            $table->integer('salary');
            $table->char('position', 1)->comment("1: Manager, 2: Team leader, 3: BSE, 4: Dev, 5: Tester");
            $table->char('status', 1)->comment("1: Đang làm việc, 2: Đã nghỉ việc");
            $table->char('type_of_work', 1)->comment("1: Nhân viên chính thức full time, 2: Nhân viên partime, 3: Nhân viên thử việc, 4: Thực tập sinh");
            $table->integer('ins_id');
            $table->integer('upd_id')->nullable();
            $table->char('del_flag', 1)->default(0)->comment("0: Active, 1: Deleted");
            $table->timestamps();
            $table->foreign('team_id')->references('id')->on('m_teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_employees');
    }
}
