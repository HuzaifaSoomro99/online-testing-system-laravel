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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->Integer('totalquestions');
            $table->Integer('correct');
            $table->Integer('wrong');
            $table->Integer('obtainmarks');
            $table->float('percentage');
            $table->string('status');
            $table->date('date');
            $table->Integer('duration');
            $table->Integer('no_of_attempts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
