<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $technologies = ['Laravel', 'Express','React','Docker','Php','Javascript','Three.js', 'Bootstrap','PrimeReact','Css'];

            foreach ($technologies as $name) {
                Technology::create(['name' => $name]);
            }
    }
}
