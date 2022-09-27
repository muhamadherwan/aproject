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
        Schema::create('marks_vocationals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('students_details_fk');
            $table->foreign('students_details_fk')->references('id')->on('students_details');

            $table->unsignedBigInteger('modules_fk');
            $table->foreign('modules_fk')->references('id')->on('modules');

            $table->float('mark_b_teori')->nullable();
            $table->float('mark_b_amali')->nullable();
            $table->float('mark_a_teori')->nullable();
            $table->float('mark_a_amali')->nullable();

            $table->integer('total_marks')->nullable();

            $table->boolean('is_graded')->default(0);

            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('marks_vocationals');
    }
};
