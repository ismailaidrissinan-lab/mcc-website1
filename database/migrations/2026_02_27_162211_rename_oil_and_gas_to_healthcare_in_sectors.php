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
        \Illuminate\Support\Facades\DB::table('sectors')
            ->where('name', 'Oil & Gas')
            ->orWhere('slug', 'oil-gas')
            ->update([
                'name' => 'Healthcare',
                'slug' => 'healthcare'
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('sectors')
            ->where('name', 'Healthcare')
            ->orWhere('slug', 'healthcare')
            ->update([
                'name' => 'Oil & Gas',
                'slug' => 'oil-gas'
            ]);
    }
};
