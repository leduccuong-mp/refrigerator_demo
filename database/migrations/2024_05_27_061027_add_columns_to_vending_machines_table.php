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
        Schema::table('vending_machines', function (Blueprint $table) {
            $table->after('category_id', function (Blueprint $table) {
                $table->time('business_start')->nullable();
                $table->time('business_end')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vending_machines', function (Blueprint $table) {
            $table->dropColumn('business_start');
            $table->dropColumn('business_end');
        });
    }
};
