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
        Schema::table('promotions', function (Blueprint $table) {
            $table->string('owner')->nullable()->after('name');
            $table->string('booker')->nullable()->after('owner');
            $table->string('based_in')->nullable()->after('booker');
            $table->string('country')->nullable()->after('based_in');
            $table->string('style')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropColumn('owner');
            $table->dropColumn('booker');
            $table->dropColumn('based_in');
            $table->dropColumn('country');
            $table->dropColumn('style');
        });
    }
};
