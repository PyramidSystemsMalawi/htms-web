<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();
            $table->string('case_reference', 15);
            $table->string('name', 100);
            $table->string('gender',10)->enum('MALE', 'FEMALE', 'OTHER')->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('last_known_address',255)->nullable();
            $table->integer('age')->nullable();
            $table->string('current_status', 50)->nullable();
            $table->string('image_url',255)->nullable();
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
        Schema::dropIfExists('suspects');
    }
}
