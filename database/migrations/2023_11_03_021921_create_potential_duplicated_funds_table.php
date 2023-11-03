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
        Schema::create('potential_duplicated_funds', function (Blueprint $table) {
            $table->unsignedBigInteger('original_fund_id');
            $table->unsignedBigInteger('duplicated_fund_id');

            $table->foreign('original_fund_id')->references('id')->on('funds');
            $table->foreign('duplicated_fund_id')->references('id')->on('funds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potential_duplicated_funds');
    }
};
