<?php

namespace Modules\Frontend\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\app\Models\OurFeaturesSection;

class OurFeaturesSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurFeaturesSection::create([
            'id' => 1
        ]);
    }
}
