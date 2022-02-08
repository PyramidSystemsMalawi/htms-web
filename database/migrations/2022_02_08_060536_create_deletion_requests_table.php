<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletion_requests', function (Blueprint $table) {
            $table->id();
            $table->string('case_reference',20)->nullable(false);
            $table->string('officer',40)->nullable(false);
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->string('reason',255)->nullable(false);
            $table->string('comment',255)->nullable(true);
            $table->string('reviewed_by',40)->nullable(true);
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
        Schema::dropIfExists('deletion_requests');
    }
}
