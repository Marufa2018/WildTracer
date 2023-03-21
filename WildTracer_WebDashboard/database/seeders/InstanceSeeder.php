<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instance;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instance::factory()->times(10)->create();
    }
}
