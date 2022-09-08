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
        Schema::create('config_score_vocationals', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('semester');
            $table->integer('session');
            $table->decimal('score_pba', 8, 2);
            $table->decimal('score_pbt', 8, 2);
            $table->decimal('score_paa', 8, 2);
            $table->decimal('score_pat', 8, 2);
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
        Schema::dropIfExists('config_score_vocationals');
    }
};
