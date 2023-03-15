<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleController extends Controller
{
    public function all(Request $request)
    {
        $element_per_page = 10;

        $page = 1;
        $next_page = $page + 1;
        $url = env('APP_URL') . '/people/?page=' . $next_page;

        if ($request->exists('page')) {
            $page = $request->page;
            $next_page = $page + 1;
            $url = env('APP_URL') . '/people/?page=' . $next_page;
        }

        $data = Vehicle::limit($element_per_page)->offset(($page - 1) * $element_per_page)->get()->toArray();

        if (empty($data)) {
            return response()->json(['status' => 'Page not found'], 400);
        }

        return response()->json([
            'status' => 'success',
            'current_page' => $page,
            'data' => $data,
            'next_page' => $next_page,
            'url_next_page' => $url,
        ], 200);
    }

    public function index($id)
    {
        $url = env('API_ENDPOINT');
        $response = Http::get($url . '/vehicles/' . $id );
        $data = $response->json();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }
}
