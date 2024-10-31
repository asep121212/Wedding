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
        Schema::create('profilens', function (Blueprint $table) {
            $table->id();
            $table->string('username_pria');
            $table->string('username_wanita');
            $table->string('user_pria');
            $table->string('user_wanita');
            $table->string('user_bapak_pria');
            $table->string('user_ibu_pria');
            $table->string('user_ibu_wanita');
            $table->string('user_bapak_wanita');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profilens');
    }
};