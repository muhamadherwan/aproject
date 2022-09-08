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
            $table->string('grade_bm');
            $table->string('grade_bi');
            $table->string('grade_sj');
            $table->string('grade_sc');
            $table->string('grade_mt');
            $table->string('grade_pi');
            $table->string('grade_pm');
            $table->integer('academic_bm_credit_hour');
            $table->decimal('academic_bm_pointer', 8, 2);

            $table->integer('academic_credit_hour');
            $table->decimal('academic_pointer', 8, 2);
            $table->integer('academic_credit_hour_cum');
            $table->decimal('academic_pointer_cum', 8, 2);

            $table->integer('vocational_credit_hour');
            $table->decimal('vocational_pointer', 8, 2);
            $table->integer('vocational_credit_hour_cum');
            $table->decimal('vocational_pointer_cum', 8, 2);

            $table->decimal('png_bm', 8, 2);  // semak pengiraan di sistem lama
            $table->decimal('pngk_bm', 8, 2); // semak pengiraan di sistem lama

            $table->decimal('png_a', 8, 2);
            $table->decimal('pngk_a', 8, 2);

            $table->decimal('png_v', 8, 2);
            $table->decimal('pngk_v', 8, 2);

            $table->decimal('pngk', 8, 2);
            $table->decimal('pngkk', 8, 2);

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
