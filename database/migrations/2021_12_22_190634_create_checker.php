<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('checker');
        Schema::create('checker', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('classes_id')->unsigned();
            $table->bigInteger('people_id')->unsigned();
            $table->string('flag_status')->default('enabled');
            $table->timestamps();
        });

        Schema::table('checker', function($table) {
            $table->foreign('classes_id')->references('id')->on('classes');
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
        Schema::dropIfExists('checker');
    }
}
