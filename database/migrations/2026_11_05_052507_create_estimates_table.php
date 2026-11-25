<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('property_address');
            $table->string('service_type');
            $table->string('roof_material')->nullable();
            $table->text('project_details')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('status')->default('Pending'); // Pending, Contacted, Scheduled, Completed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};