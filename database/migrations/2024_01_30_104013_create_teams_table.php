<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('password');
            $table->string('binusian');
            $table->string('leader_name');
            $table->string('email_leader');
            $table->bigInteger('whatsapp_leader');
            $table->string('line');
            $table->string('github');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('cv');
            $table->string('id_card');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
