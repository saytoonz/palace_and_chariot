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
        Schema::create('travel_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->default(0);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();

            $table->text('depart_location')->nullable();
            $table->string('depart_date')->nullable();
            $table->text('return_location')->nullable();
            $table->string('return_date')->nullable();


            $table->integer('children')->default(0);
            $table->integer('adults')->default(0);

            $table->boolean('require_dropoff')->default(false);
            $table->boolean('require_pick_up')->default(false);
            $table->boolean('require_provide_security')->default(false);
            $table->boolean('require_provide_tour')->default(false);
            $table->boolean('require_provide_accommodation')->default(false);
            $table->boolean('require_provide_rentals')->default(false);

            $table->unsignedBigInteger('opened_by')->nullable();
            $table->enum('status',['active', 'pending','close', 'deleted'])->default('pending');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_requests');
    }
};
