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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_details_fk');
            $table->foreign('students_details_fk')->references('id')->on('students_details');
            $table->string('grade_bm')->nullable();
            $table->string('grade_bi')->nullable();
            $table->string('grade_sj')->nullable();
            $table->string('grade_sn')->nullable();
            $table->string('grade_mt')->nullable();
            $table->string('grade_pi')->nullable();
            $table->string('grade_pm')->nullable();

            $table->integer('academic_bm_credit_hour')->nullable();
            $table->decimal('academic_bm_pointer', 8, 2)->nullable();

            $table->integer('academic_credit_hour')->nullable();
            $table->decimal('academic_pointer', 8, 2)->nullable();
            $table->integer('academic_credit_hour_cum')->nullable();
            $table->decimal('academic_pointer_cum', 8, 2)->nullable();

            $table->string('grade_module1')->nullable();
            $table->string('grade_module2')->nullable();
            $table->string('grade_module3')->nullable();
            $table->string('grade_module4')->nullable();
            $table->string('grade_module5')->nullable();
            $table->string('grade_module6')->nullable();
            $table->string('grade_module7')->nullable();
            $table->string('grade_module8')->nullable();

            $table->integer('vocational_credit_hour')->nullable();
            $table->decimal('vocational_pointer', 8, 2)->nullable();
            $table->integer('vocational_credit_hour_cum')->nullable();
            $table->decimal('vocational_pointer_cum', 8, 2)->nullable();

            $table->decimal('png_bm', 8, 2)->nullable();  // semak pengiraan di sistem lama
            $table->decimal('pngk_bm', 8, 2)->nullable(); // semak pengiraan di sistem lama

            $table->decimal('png_a', 8, 2)->nullable();
            $table->decimal('pngk_a', 8, 2)->nullable();

            $table->decimal('png_v', 8, 2)->nullable();
            $table->decimal('pngk_v', 8, 2)->nullable();

            $table->decimal('pngk', 8, 2)->nullable();
            $table->decimal('pngkk', 8, 2)->nullable();

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
        Schema::dropIfExists('grades');
    }
};
