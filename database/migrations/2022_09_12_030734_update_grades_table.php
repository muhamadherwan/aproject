<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->string('grade_bm')->nullable()->change();
            $table->string('grade_bi')->nullable()->change();
            $table->string('grade_sj')->nullable()->change();
            $table->string('grade_sc')->nullable()->change();
            $table->string('grade_mt')->nullable()->change();
            $table->string('grade_pi')->nullable()->change();
            $table->string('grade_pm')->nullable()->change();

            $table->integer('academic_bm_credit_hour')->nullable()->change();
            $table->decimal('academic_bm_pointer', 8, 2)->nullable()->change();

            $table->integer('academic_credit_hour')->nullable()->change();
            $table->decimal('academic_pointer', 8, 2)->nullable()->change();
            $table->integer('academic_credit_hour_cum')->nullable()->change();
            $table->decimal('academic_pointer_cum', 8, 2)->nullable()->change();

            $table->integer('vocational_credit_hour')->nullable()->change();
            $table->decimal('vocational_pointer', 8, 2)->nullable()->change();
            $table->integer('vocational_credit_hour_cum')->nullable()->change();
            $table->decimal('vocational_pointer_cum', 8, 2)->nullable()->change();

            $table->decimal('png_bm', 8, 2)->nullable()->change();  // semak pengiraan di sistem lama
            $table->decimal('pngk_bm', 8, 2)->nullable()->change(); // semak pengiraan di sistem lama

            $table->decimal('png_a', 8, 2)->nullable()->change();
            $table->decimal('pngk_a', 8, 2)->nullable()->change();

            $table->decimal('png_v', 8, 2)->nullable()->change();
            $table->decimal('pngk_v', 8, 2)->nullable()->change();

            $table->decimal('pngk', 8, 2)->nullable()->change();
            $table->decimal('pngkk', 8, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->string('grade_bm')->nullable(false)->change();
            $table->string('grade_bi')->nullable(false)->change();
            $table->string('grade_sj')->nullable(false)->change();
            $table->string('grade_sc')->nullable(false)->change();
            $table->string('grade_mt')->nullable(false)->change();
            $table->string('grade_pi')->nullable(false)->change();
            $table->string('grade_pm')->nullable(false)->change();

            $table->integer('academic_bm_credit_hour')->nullable(false)->change();
            $table->decimal('academic_bm_pointer', 8, 2)->nullable(false)->change();

            $table->integer('academic_credit_hour')->nullable(false)->change();
            $table->decimal('academic_pointer', 8, 2)->nullable(false)->change();
            $table->integer('academic_credit_hour_cum')->nullable(false)->change();
            $table->decimal('academic_pointer_cum', 8, 2)->nullable(false)->change();

            $table->integer('vocational_credit_hour')->nullable(false)->change();
            $table->decimal('vocational_pointer', 8, 2)->nullable(false)->change();
            $table->integer('vocational_credit_hour_cum')->nullable(false)->change();
            $table->decimal('vocational_pointer_cum', 8, 2)->nullable(false)->change();

            $table->decimal('png_bm', 8, 2)->nullable(false)->change(); // semak pengiraan di sistem lama
            $table->decimal('pngk_bm', 8, 2)->nullable(false)->change(); // semak pengiraan di sistem lama

            $table->decimal('png_a', 8, 2)->nullable(false)->change();
            $table->decimal('pngk_a', 8, 2)->nullable(false)->change();

            $table->decimal('png_v', 8, 2)->nullable(false)->change();
            $table->decimal('pngk_v', 8, 2)->nullable(false)->change();

            $table->decimal('pngk', 8, 2)->nullable(false)->change();
            $table->decimal('pngkk', 8, 2)->nullable(false)->change();
        });
    }
};
