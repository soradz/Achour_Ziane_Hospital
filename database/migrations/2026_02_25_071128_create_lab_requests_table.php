<?php
// database/migrations/2024_01_01_000002_create_lab_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lab_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('doctor_name')->default('غير محدد');
            $table->json('tests');           // قائمة التحاليل
            $table->string('urgency')->default('عادي'); // عادي / مستعجل / حرج
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending / done
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_requests');
    }
};