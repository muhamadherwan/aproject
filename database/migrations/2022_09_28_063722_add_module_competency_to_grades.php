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
        Schema::table('grades', function (Blueprint $table) {
            $table->boolean('is_vocational_pb')->default(0)->after('grade_module8'); //SMP_PB
            $table->boolean('is_vocational_paa')->default(0)->after('is_vocational_pb'); //SMP_PAA
            $table->boolean('is_vocational_pat')->default(0)->after('is_vocational_paa'); //SMP_PAT
            $table->boolean('is_competent')->default(0)->after('is_vocational_pat'); //GRED_KOMPETEN
            $table->boolean('total_vocational')->after('is_competent')->nullable();
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
            //
        });
    }
};
