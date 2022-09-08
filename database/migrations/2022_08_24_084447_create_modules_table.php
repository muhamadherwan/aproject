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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subject_vocationals_fk');
            $table->foreign('subject_vocationals_fk')->references('id')->on('subject_vocationals');

            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('session')->nullable();
            $table->string('code')->nullable();
            $table->string('name');

            $table->integer('credit_hour')->nullable();
            $table->integer('b_amali')->nullable();
            $table->integer('b_teori')->nullable();
            $table->integer('a_amali')->nullable();
            $table->integer('a_teori')->nullable();

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
        Schema::dropIfExists('modules');
    }
};
