<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->integer('age')->nullable();
            $table->string('gender', 20)->nullable();
             $table->string('doctor')->nullable();
            
            // الحالة العامة للمريض (اختياري)
            $table->string('condition', 255)->nullable();

            // القسم: medical أو surgical
            $table->string('section', 50)->default('medical');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
