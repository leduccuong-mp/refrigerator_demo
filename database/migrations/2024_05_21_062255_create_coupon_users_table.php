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
        Schema::create('coupon_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('coupon_id');
            $table->bigInteger('user_id');
            $table->dateTime('used_at');
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['coupon_id', 'user_id'], 'unique_coupon_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_users');
    }
};
