<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('start_time');
            $table->unsignedBigInteger('start_year');
            $table->unsignedBigInteger('start_month');
            $table->unsignedBigInteger('start_day');
//            $table->unsignedBigInteger('start_hour');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('end_year');
            $table->unsignedBigInteger('end_month');
            $table->unsignedBigInteger('end_day');
//            $table->unsignedBigInteger('end_hour');
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
        Schema::dropIfExists('attendances');
    }
}
