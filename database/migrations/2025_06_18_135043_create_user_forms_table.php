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
        Schema::create('user_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // General Info
            $table->date('dob');
            $table->string('sex');
            $table->unsignedSmallInteger('height');
            $table->unsignedSmallInteger('weight');
            $table->string('blood_pressure');
            $table->string('alcohol');
            $table->string('smoke');
            $table->text('allergy_details')->nullable();

            // Acknowledgements
            $table->boolean('has_erectile_premature_ack')->nullable();
            $table->boolean('has_general_medicines_ack')->nullable();
            $table->boolean('has_steroids_medicines_ack')->nullable();
            $table->boolean('has_weight_loss_ack')->nullable();
            $table->boolean('has_birth_control_ack')->nullable();

            $table->json('medications')->nullable();
            $table->json('conditions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_forms');
    }
};
