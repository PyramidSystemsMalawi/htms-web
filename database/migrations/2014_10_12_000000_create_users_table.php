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
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('status',15)->enum('UNVERIFIED', 'VERIFIED')->default('UNVERIFIED');
            $table->string('email',50)->unique();
            $table->integer('organisation');
            $table->integer('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['ACTIVE', 'BLOCKED', 'DELETED'])->default('ACTIVE');
            $table->string('password');
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
