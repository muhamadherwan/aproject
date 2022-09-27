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
        Schema::create('config_grade_vocationals', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('semester');
            $table->integer('mark_from');
            $table->integer('mark_to');
            $table->string('grade');
            $table->string('status');
            $table->string('competency');
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
        Schema::dropIfExists('config_grade_vocationals');
    }
};
