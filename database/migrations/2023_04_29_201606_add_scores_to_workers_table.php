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
        Schema::table('workers', function (Blueprint $table) {
            $table->integer('wins')->default(0)->after('image');
            $table->integer('draws')->default(0)->after('wins');
            $table->integer('losses')->default(0)->after('draws');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn('wins');
            $table->dropColumn('draws');
            $table->dropColumn('losses');
        });
    }
};
