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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('config_colleges_types_fk');
            $table->foreign('config_colleges_types_fk')->references('id')->on('config_colleges_types');
            $table->string('code');
            $table->string('name');
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('postcode', 5)->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('config_states_fk');
            $table->foreign('config_states_fk')->references('id')->on('config_states');
            $table->string('director_name')->nullable();
            $table->string('director_email')->nullable();
            $table->string('director_telephone')->nullable();
            $table->string('director_mobilephone')->nullable();
            $table->string('kjpp_name')->nullable();
            $table->string('kjpp_email')->nullable();
            $table->string('kjpp_telephone')->nullable();
            $table->string('kjpp_mobilephone')->nullable();
            $table->string('sup_name')->nullable();
            $table->string('sup_email')->nullable();
            $table->string('sup_telephone')->nullable();
            $table->string('sup_mobilephone')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->string('old_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleges');
    }
};
