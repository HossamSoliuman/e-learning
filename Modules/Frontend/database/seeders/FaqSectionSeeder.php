<?php

namespace Modules\Frontend\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\app\Models\FaqSection;

class FaqSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqSection::create([
            'id' => 1
           ]);
    }
}
