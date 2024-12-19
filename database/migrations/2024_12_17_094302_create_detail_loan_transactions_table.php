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
        Schema::create('detail_loan_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('id_loan');
            $table->integer('id_book');
            $table->integer('id_package');
            $table->string('return_status');
            $table->date('receipt_date');
            $table->integer('monetary_fine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_loan_transactions');
    }
};
