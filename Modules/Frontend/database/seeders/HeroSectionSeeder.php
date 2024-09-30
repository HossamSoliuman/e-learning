<?php

namespace Modules\Frontend\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\app\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'id' => 1
        ]);
    }
}
