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
        Schema::disableForeignKeyConstraints();
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('permission_id')->index();
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->integer('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->tinyInteger('value');
            $table->timestamp('expires')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_roles');
    }
};
