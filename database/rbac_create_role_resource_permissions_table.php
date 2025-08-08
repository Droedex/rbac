<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * No foreign keys — handled by domain logic
     */
    public function up(): void
    {
        Schema::create('rbac_role_resource_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('resource_id');
            $table->boolean('create')->default(0);
            $table->boolean('read')->default(0);
            $table->boolean('update')->default(0);
            $table->boolean('delete')->default(0);
            $table->boolean('list')->default(0);
            $table->unique(['role_id', 'resource_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rbac_role_resource_permissions');
    }
};