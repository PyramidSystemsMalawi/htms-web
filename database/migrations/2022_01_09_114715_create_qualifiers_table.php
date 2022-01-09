<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifiers', function (Blueprint $table) {
            $table->id();
            $table->string('question',255)->nullable();
            $table->enum('responseType',['boolean', 'multiple', 'text', 'number','bool-plus-input']);
            $table->boolean('nullable')->default(true);
            $table->text('possible_answers',1000)->nullable();
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
        Schema::dropIfExists('qualifiers');
    }
}
