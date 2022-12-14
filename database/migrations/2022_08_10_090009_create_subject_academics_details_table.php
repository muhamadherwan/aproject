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
        Schema::create('subject_academics_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_academics_fk');
            $table->foreign('subject_academics_fk')->references('id')->on('subject_academics');
            $table->string('code')->nullable();
            $table->integer('year');
            $table->integer('year_exam')->nullable();
            $table->integer('semester');
            $table->integer('credit_hour');
            $table->integer('continuous')->nullable();
            $table->integer('final1')->nullable();
            $table->integer('final2')->nullable();
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
        Schema::dropIfExists('subject_academics_details');
    }
};
