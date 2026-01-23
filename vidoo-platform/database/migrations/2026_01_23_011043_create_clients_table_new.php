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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->string('password');
            $table->string('company_name')->nullable();
            $table->text('company_description')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->enum('type', ['brand', 'agency', 'ecommerce'])->default('brand');
            $table->boolean('verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
