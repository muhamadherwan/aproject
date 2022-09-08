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
        if(Schema::hasTable('courses')) return;       // if table already exist
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

//          waiting for zz to pass clusters table migration files:8 sept 2022
            $table->unsignedBigInteger('clusters_fk');
            $table->foreign('clusters_fk')->references('id')->on('clusters');

            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('session')->nullable();
            $table->string('code')->nullable();
            $table->string('name');
            $table->tinyInteger('status');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

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
        Schema::dropIfExists('courses');
    }
};
