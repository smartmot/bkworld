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
            $table->string('name');
            $table->string('email')->unique();
            $table->date("birth_date")->nullable();
            $table->string("photo")->nullable();
            $table->enum("gender", ["male", "female"]);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token');
            $table->enum('status', ["active", "deleted", "blocked"]);
            $table->string('options')->nullable();
            $table->rememberToken();
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
