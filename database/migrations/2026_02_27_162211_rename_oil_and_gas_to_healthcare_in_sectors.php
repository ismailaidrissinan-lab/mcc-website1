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
        $healthcare = \Illuminate\Support\Facades\DB::table('sectors')->where('slug', 'healthcare')->first();
        $oilAndGas = \Illuminate\Support\Facades\DB::table('sectors')->where('slug', 'oil-gas')->orWhere('name', 'Oil & Gas')->first();

        if ($oilAndGas && $healthcare) {
            // Move any projects from Oil & Gas to Healthcare, then delete Oil & Gas
            \Illuminate\Support\Facades\DB::table('projects')
                ->where('sector_id', $oilAndGas->id)
                ->update(['sector_id' => $healthcare->id]);
                
            \Illuminate\Support\Facades\DB::table('sectors')
                ->where('id', $oilAndGas->id)
                ->delete();
        } elseif ($oilAndGas && !$healthcare) {
            // Just rename Oil & Gas to Healthcare
            \Illuminate\Support\Facades\DB::table('sectors')
                ->where('id', $oilAndGas->id)
                ->update([
                    'name' => 'Healthcare',
                    'slug' => 'healthcare'
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $healthcare = \Illuminate\Support\Facades\DB::table('sectors')->where('slug', 'healthcare')->first();
        if ($healthcare) {
            \Illuminate\Support\Facades\DB::table('sectors')
                ->where('id', $healthcare->id)
                ->update([
                    'name' => 'Oil & Gas',
                    'slug' => 'oil-gas'
                ]);
        }
    }
};
