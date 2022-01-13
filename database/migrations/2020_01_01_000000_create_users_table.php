<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->string('full_name_ar')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('full_name_en')->nullable();

            $table->string('registered_date')->nullable();
            $table->string('password_changed')->nullable();
            $table->string('first_login')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('ip_address')->nullable();
            $table->string('salt')->nullable();
            $table->string('forgetting_password_code')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('salt')->nullable();
            $table->string('forgetting_password_code')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('active')->nullable();
            $table->string('sort')->nullable();
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
