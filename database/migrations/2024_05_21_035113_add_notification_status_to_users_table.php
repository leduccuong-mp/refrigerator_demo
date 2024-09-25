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
        Schema::table('users', function (Blueprint $table) {
            $table->after('is_seller', function (Blueprint $table) {
                $table->tinyInteger('operations_notify')->default(0);
                $table->tinyInteger('campaigns_notify')->default(0);
                $table->tinyInteger('purchases_notify')->default(0);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('notification_status');
        });
    }
};
