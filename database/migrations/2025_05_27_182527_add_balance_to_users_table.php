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
        // Column 'balance' already exists, so this migration is now a no-op.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op: do not drop 'balance' column since it is already present.
    }
};
