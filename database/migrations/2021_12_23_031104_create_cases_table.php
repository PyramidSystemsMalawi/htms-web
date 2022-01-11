<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('reference',15)->unique();
            $table->string('case_name',100);
            $table->string('district',20)->nullable();
            $table->string('traditional_authority',100)->nullable();
            $table->string('village',50)->nullable();
            $table->text('brief',5000)->nullable();
            $table->string('status')->enum('OPEN','CLOSED')->default('OPEN');
            $table->string('stage')->enum('INVESTIGATION','LITIGATION','CONVICTION','DISMISSAL')->default('INVESTIGATION');
            $table->decimal('qualification_index')->default(0.00);
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
        Schema::dropIfExists('cases');
    }
}
