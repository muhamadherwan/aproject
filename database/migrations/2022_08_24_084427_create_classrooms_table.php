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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('courses_fk');
            $table->foreign('courses_fk')->references('id')->on('courses');

            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('session')->nullable();
            $table->string('code')->nullable();
            $table->string('name');
            $table->tinyInteger('status');

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
        Schema::dropIfExists('classrooms');
    }
};
