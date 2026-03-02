<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exists = DB::table('sectors')->where('slug', 'oil-gas')->exists();

        if (!$exists) {
            DB::table('sectors')->insert([
                'name' => 'Oil & Gas',
                'slug' => 'oil-gas',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('sectors')->where('slug', 'oil-gas')->delete();
    }
};
