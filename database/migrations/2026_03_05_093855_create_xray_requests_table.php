<?php
// database/migrations/xxxx_create_xray_requests_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('xray_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('patient_id')->constrained()->onDelete('cascade');
        $table->string('doctor_name');
        $table->string('body_part');
        $table->string('side')->nullable();
        $table->text('notes')->nullable();
        $table->text('report')->nullable();
        $table->string('image_path')->nullable();
        $table->string('urgency')->default('عادي');
        $table->string('status')->default('pending');
        $table->timestamps();
    });
}

public function down(): void {
    Schema::dropIfExists('xray_requests');
}
};