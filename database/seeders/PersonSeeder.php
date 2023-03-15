<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $url = env('API_ENDPOINT');
            $response = Http::get($url . '/people/?page=' . $i);
            $response = $response->collect('results');

            foreach ($response as $key => $item) {
                DB::table('people')->insert([
                    'name' => $item['name'],
                    'height' => $item['height'],
                    'mass' => $item['mass'],
                    'hair_color' => $item['hair_color'],
                    'skin_color' => $item['skin_color'],
                    'eye_color' => $item['eye_color'],
                    'birth_year' => $item['birth_year'],
                    'gender' => $item['gender'],
                    'homeworld' => $item['homeworld'],
                    'films' => implode(", ", $item['films']),
                    'species' => implode(", ", $item['species']),
                    'vehicles' => implode(", ", $item['vehicles']),
                    'starships' => implode(", ", $item['starships']),
                    'url' => $item['url'],
                ]);
            }
        }
    }
}
