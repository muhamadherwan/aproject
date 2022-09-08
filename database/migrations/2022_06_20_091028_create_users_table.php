<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mykad');
            $table->date('dob');
            $table->string('phonenumber')->nullable();
            $table->string('title')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('grade')->nullable();
            $table->string('address');
            $table->string('postcode', 5);
            $table->string('area');
            $table->string('city');
            $table->unsignedBigInteger('config_states_fk');
            $table->foreign('config_states_fk')->references('id')->on('config_states');
            $table->text('avatar');
            $table->integer('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
