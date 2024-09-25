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
            $table->string('name')->nullable()->default(null)->change();
            $table->string('email')->nullable()->default(null)->change();
            $table->string('password')->nullable()->default(null)->change();
            $table->after('remember_token', function (Blueprint $table) {
                $table->string('phone', 20)->unique()->nullable(false);
                $table->date('birthday')->nullable()->default(null);
                $table->string('code', 10)->nullable()->default(null);
                $table->integer('code_expired_at')->nullable()->default(null);
                $table->datetime('login_at')->nullable()->default(null);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'birthday', 'code', 'code_expired_at', 'login_at']);
        });
    }
};
