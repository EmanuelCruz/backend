<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlanetController extends Controller
{
    public function all()
    {
        $url = env('API_ENDPOINT');
        $response = Http::get($url . '/planets');
        $data = $response->json('results');

        return response()->json([
            'data' => $data,
        ]);
    }

    public function index($id)
    {
        $url = env('API_ENDPOINT');
        $response = Http::get($url . '/planets/' . $id );
        $data = $response->json();

        return response()->json([
            'data' => $data,
        ]);
    }
}
