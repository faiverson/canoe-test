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
        Schema::create('alias_fund', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alias_id');
            $table->unsignedBigInteger('fund_id');

            $table->foreign('alias_id')->references('id')->on('aliases');
            $table->foreign('fund_id')->references('id')->on('funds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alias_fund');
    }
};
