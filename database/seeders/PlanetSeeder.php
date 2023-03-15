<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 7; $i++) {
            $url = env('API_ENDPOINT');
            $response = Http::get($url . '/planets/?page=' . $i);
            $response = $response->collect('results');

            foreach ($response as $key => $item) {
                DB::table('planets')->insert([
                    'name' => $item['name'],
                    'rotation_period' => $item['rotation_period'],
                    'orbital_period' => $item['orbital_period'],
                    'diameter' => $item['diameter'],
                    'climate' => $item['climate'],
                    'gravity' => $item['gravity'],
                    'terrain' => $item['terrain'],
                    'surface_water' => $item['surface_water'],
                    'population' => $item['population'],
                    'residents' => implode(", ", $item['residents']),
                    'films' => implode(", ", $item['films']),
                    'url' => $item['url'],
                ]);
            }
        }
    }
}
