<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VehicleSeeder extends Seeder
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
            $response = Http::get($url . '/vehicles/?page=' . $i);
            $response = $response->collect('results');

            foreach ($response as $key => $item) {
                DB::table('vehicles')->insert([
                    'name' => $item['name'],
                    'model' => $item['model'],
                    'manufacturer' => $item['manufacturer'],
                    'cost_in_credits' => $item['cost_in_credits'],
                    'length' => $item['length'],
                    'max_atmosphering_speed' => $item['max_atmosphering_speed'],
                    'crew' => $item['crew'],
                    'passengers' => $item['passengers'],
                    'cargo_capacity' => $item['cargo_capacity'],
                    'consumables' => $item['consumables'],
                    'vehicle_class' => $item['vehicle_class'],
                    'pilots' => implode(", ", $item['pilots']),
                    'films' => implode(", ", $item['films']),
                    'url' => $item['url'],
                ]);
            }
        }
    }
}
