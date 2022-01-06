<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVictimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->string('case_reference', 15);
            $table->string('name',100);
            $table->string('gender')->enum('MALE','FEMALE');
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('marital_status')->enum('UNKNOWN','SINGLE','MARRIED','DIVORCED','SEPARATED','WIDOWED')->default('UNKNOWN');
            $table->string('phone_number', 15)->nullable();
            $table->string('residency_address',250)->nullable();
            $table->string('home_address',250)->nullable();
            $table->string('image_url',255)->nullable();
            $table->string('health_status')->enum('UNKNOWN','HEALTHY','INJURED','DECEASED')->default('UNKNOWN');


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
        Schema::dropIfExists('victims');
    }
}
