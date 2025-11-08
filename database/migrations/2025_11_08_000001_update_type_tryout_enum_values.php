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
        DB::statement("
            ALTER TABLE tryouts
            MODIFY type_tryout ENUM(
                'tiu',
                'twk',
                'tkp',
                'skd_full',
                'general',
                'certification',
                'listening',
                'reading',
                'writing',
                'pppk_full',
                'teknis',
                'social culture',
                'management',
                'interview',
                'word',
                'excel',
                'ppt',
                'computer',
                'utbk_full',
                'utbk_pu',
                'utbk_ppu',
                'utbk_kmbm',
                'utbk_pk',
                'utbk_literasi',
                'utbk_pm'
            ) NOT NULL
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE tryouts
            MODIFY type_tryout ENUM(
                'tiu',
                'twk',
                'tkp',
                'skd_full',
                'general',
                'certification',
                'listening',
                'reading',
                'writing',
                'pppk_full',
                'teknis',
                'social culture',
                'management',
                'interview',
                'word',
                'excel',
                'ppt',
                'computer'
            ) NOT NULL
        ");
    }
};
