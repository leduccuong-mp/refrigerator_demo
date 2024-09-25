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
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 20);
            $table->string('url');
            $table->string('image_url');
            $table->integer('priority')->default(1);
            $table->datetime('started_at');
            $table->datetime('ended_at');
            $table->tinyInteger('status')->default(0)->comment('0: private, 1: publish');
            $table->tinyInteger('type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
