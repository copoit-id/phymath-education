<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add UTBK subtest codes to enum while keeping existing ones to avoid breaking existing data
        DB::statement("ALTER TABLE tryout_details MODIFY COLUMN type_subtest ENUM(
            'twk','tiu','tkp','general',
            'listening','reading','writing',
            'teknis','social culture','management','interview',
            'word','excel','ppt',
            'utbk_pu','utbk_ppu','utbk_kmbm','utbk_pk','utbk_literasi','utbk_pm'
        ) NOT NULL");
    }

    public function down(): void
    {
        // Revert to previous enum definition (without UTBK codes)
        DB::statement("ALTER TABLE tryout_details MODIFY COLUMN type_subtest ENUM(
            'twk','tiu','tkp','general',
            'listening','reading','writing',
            'teknis','social culture','management','interview',
            'word','excel','ppt'
        ) NOT NULL");
    }
};

