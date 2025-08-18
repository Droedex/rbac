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
        Schema::create('rbac_role_unit_permissions', function (Blueprint $table) {
            $table->unsignedSmallInteger('id', true);
            $table->unsignedSmallInteger('role_id');
            $table->unsignedSmallInteger('unit_id');
            $table->string('permissions', 4)->comment('CRUD');
            $table->unique(['role_id', 'unit_id']);
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