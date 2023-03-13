<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    public function all()
    {
        $url = env('API_ENDPOINT');
        $response = Http::get($url . '/people');
        $data = $response->json('results');

        return response()->json([
            'data' => $data,
        ]);
    }

    public function index($id)
    {
        $url = env('API_ENDPOINT');
        $response = Http::get($url . '/people/' . $id );
        $data = $response->json();

        return response()->json([
            'data' => $data,
        ]);
    }
}
