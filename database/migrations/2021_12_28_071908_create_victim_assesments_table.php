<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVictimAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victim_assesments', function (Blueprint $table) {
            $table->id();
            $table->string('case',15)->default('UNASSIGNED');
            $table->integer('victim')->unique();
            $table->integer('Distance')->nullable();
            $table->integer('Accessibility')->nullable();
            $table->integer('Interaction')->nullable();
            $table->integer('QualityOfService')->nullable();
            $table->integer('Referals')->nullable();
            $table->integer('Timeliness')->nullable();
            $table->integer('FriendlinessOfStaff')->nullable();
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
        Schema::dropIfExists('victim_assesments');
    }
}
