<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_records', function (Blueprint $table) {
            $table->id();

            $table->float('quantity')->nullable();
            $table->date('date')->default(now()->format('Y-m-d'));

            $table
                ->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId('meal_id')
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId('product_unit_id')
                ->default(1)
                ->constrained('product_units')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_records');
    }
};
