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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('creator_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('package_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['pending', 'assigned', 'in_progress', 'in_review', 'revision', 'completed', 'cancelled'])->default('pending');
            $table->decimal('budget', 10, 2);
            $table->foreignId('currency_id')->constrained()->cascadeOnDelete();
            $table->date('deadline')->nullable();
            $table->text('requirements')->nullable();
            $table->json('attachments')->nullable(); // Array of file paths
            $table->string('final_video')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->text('client_feedback')->nullable();
            $table->integer('revision_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
