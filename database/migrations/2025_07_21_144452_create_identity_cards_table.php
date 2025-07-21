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
        Schema::create('identity_cards', function (Blueprint $table) {
            $table->id();
            $table->string('card_number')->unique();
            $table->string('last_name')->index();
            $table->string('first_name')->index();
            $table->enum('gender', ["Male","Female"]);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('profession');
            $table->date('issue_date');
            $table->date('expiration_date');
            $table->string('address');
            $table->string('phone_number');
            $table->string('front_photo');
            $table->string('back_photo');
            // $table->bigInteger('user_id')->index();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identity_cards');
    }
};
