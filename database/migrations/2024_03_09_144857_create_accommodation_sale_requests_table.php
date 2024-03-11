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
        Schema::create('accommodation_sale_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->default(0);
            $table->unsignedBigInteger('accommodation_id');
            $table->string('name');
            $table->string('email');
            $table->string('country_code');
            $table->string('phone');
            $table->enum('status',['active', 'inactive', 'deleted'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodation_sale_requests');
    }
};