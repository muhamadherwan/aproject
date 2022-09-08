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
        Schema::create('marks_academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_details_fk');
            $table->foreign('students_details_fk')->references('id')->on('students_details');
            $table->unsignedBigInteger('subject_academics_fk');
            $table->foreign('subject_academics_fk')->references('id')->on('subject_academics');
            $table->float('mark_b1')->nullable();
            $table->float('mark_b2')->nullable();
            $table->float('mark_b3')->nullable();
            $table->float('mark_b4')->nullable();
            $table->float('mark_a1')->nullable();
            $table->float('mark_a2')->nullable();
            $table->float('mark_a3')->nullable();
            $table->float('mark_a4')->nullable();
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
        Schema::dropIfExists('marks_academics');
    }
};
