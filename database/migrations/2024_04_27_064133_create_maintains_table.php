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
        Schema::create('maintains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name', 200)->nullable();
            $table->string('maintenance_ico', 200)->nullable();
            $table->text('maintenance_co')->nullable();
            $table->string('maintenance_lin', 200)->nullable();
            $table->tinyInteger('is_maintenance');
            $table->string('ios_app_version', 10)->nullable();
            $table->string('android_app_ver', 10)->nullable();
            $table->datetime('started_at');
            $table->datetime('ended_at');
            $table->softDeletes()->nullable();
            $table->tinyInteger('is_update');
            $table->tinyInteger('is_force_update');
            $table->tinyInteger('is_device');
            $table->text('ios_os_version')->nullable();
            $table->text('android_os_vers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintains');
    }
};
