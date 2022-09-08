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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mykad');
            $table->string('student_number');
            $table->string('phonenumber')->nullable();
            $table->string('email')->unique()->nullable();

            $table->unsignedBigInteger('config_genders_fk')->nullable();
            $table->foreign('config_genders_fk')->references('id')->on('config_genders');

            $table->unsignedBigInteger('config_races_fk')->nullable();
            $table->foreign('config_races_fk')->references('id')->on('config_races');

            $table->unsignedBigInteger('config_religions_fk')->nullable();
            $table->foreign('config_religions_fk')->references('id')->on('config_religions');

            $table->string('address')->nullable();
            $table->string('postcode', 5)->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();

            $table->unsignedBigInteger('config_states_fk')->nullable();
            $table->foreign('config_states_fk')->references('id')->on('config_states');

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
        Schema::dropIfExists('students');
    }
};
