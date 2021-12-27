<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('classes');
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('people_id')->unsigned();
            $table->dateTime('date_time_start');
            $table->dateTime('date_time_end');
            $table->string('name_class');
            $table->string('name_teacher');
            $table->integer('limit_student');
            $table->string('flag_status')->default('enabled');
            $table->timestamps();
        });

        Schema::table('classes', function($table) {
            $table->foreign('people_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
