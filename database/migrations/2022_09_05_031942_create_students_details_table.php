<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_fk');
            $table->foreign('students_fk')->references('id')->on('students');

            $table->unsignedBigInteger('colleges_fk');
            $table->foreign('colleges_fk')->references('id')->on('colleges');

            $table->unsignedBigInteger('courses_fk')->nullable();
            $table->foreign('courses_fk')->references('id')->on('courses');

            $table->unsignedBigInteger('classrooms_fk')->nullable();
            $table->foreign('classrooms_fk')->references('id')->on('classrooms');

            $table->integer('year');
            $table->integer('year_current')->nullable();
            $table->integer('semester');
            $table->integer('session')->nullable();

            $table->unsignedBigInteger('config_statuses_fk');
            $table->foreign('config_statuses_fk')->references('id')->on('config_statuses');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            
            $table->timestamps();
            $table->string('old_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_details');
    }
};
