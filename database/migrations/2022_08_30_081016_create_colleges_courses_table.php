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
        Schema::create('colleges_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colleges_fk');
            $table->foreign('colleges_fk')->references('id')->on('colleges');
            $table->unsignedBigInteger('courses_fk');
            $table->foreign('courses_fk')->references('id')->on('courses');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('colleges_courses');
    }
};
