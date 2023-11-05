<?php

use App\Models\Promotion;
use App\Models\User;
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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('style')->nullable();
            $table->string('status')->nullable();
            $table->string('category')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('overall')->default(0);
            $table->unsignedInteger('popularity')->default(0);
            $table->unsignedInteger('endurance')->default(0);
            $table->unsignedInteger('promo_skill')->default(0);
            $table->unsignedInteger('wins')->default(0);
            $table->unsignedInteger('draws')->default(0);
            $table->unsignedInteger('losses')->default(0);
            $table->text('note')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(Promotion::class)->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
