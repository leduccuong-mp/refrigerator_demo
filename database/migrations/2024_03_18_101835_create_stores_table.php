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
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('post_code', 8);
            $table->string('pref21');
            $table->string('addr21');
            $table->string('strt21');
            $table->text('desc');
            $table->tinyInteger('status')->default(0)->comment('0: private, 1: publish');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
