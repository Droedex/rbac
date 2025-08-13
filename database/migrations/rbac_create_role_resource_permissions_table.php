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
            $table->unsignedSmallInteger('id', true);
            $table->unsignedSmallInteger('role_id');
            $table->unsignedSmallInteger('resource_id');
            $table->string('permissions', 5)->default(0);
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