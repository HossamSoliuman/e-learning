<?php

namespace Modules\Frontend\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\app\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        AboutSection::create([
            'id' => 1,
        ]);
    }
}
