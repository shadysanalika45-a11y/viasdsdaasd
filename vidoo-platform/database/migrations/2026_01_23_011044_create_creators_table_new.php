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
        Schema::create('creators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->string('password');
            $table->enum('gender', ['ذكر', 'أنثى'])->nullable();
            $table->date('birthdate')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->integer('followers_count')->default(0);
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('completed_projects')->default(0);
            $table->boolean('verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('available')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creators');
    }
};
