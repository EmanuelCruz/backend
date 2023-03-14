<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class PersonTest extends TestCase
{
    public function test_endpoint_person_retorna_status_401_si_falta_token()
    {
        $response = $this->json('get', route('person.all'));
        $response->assertJsonStructure(['status']);
        $response->assertStatus(401);
    }

    public function test_endpoint_planets_retorna_status_401_si_falta_token()
    {
        $response = $this->json('get', route('planets.all'));
        $response->assertJsonStructure(['status']);
        $response->assertStatus(401);
    }

    public function test_endpoint_vehicles_retorna_status_401_si_falta_token()
    {
        $response = $this->json('get', route('vehicles.all'));
        $response->assertJsonStructure(['status']);
        $response->assertStatus(401);
    }

    public function test_endpoint_person_retorna_data_si_ingreso_token()
    {
        $user = User::factory()->make();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->json('get', route('person.all'));
        $response->assertJsonStructure(['data']);
        $response->assertStatus(200);
    }

    public function test_endpoint_planets_retorna_data_si_ingreso_token()
    {
        $user = User::factory()->make();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->json('get', route('planets.all'));
        $response->assertJsonStructure(['data']);
        $response->assertStatus(200);
    }

    public function test_endpoint_vehicles_retorna_data_si_ingreso_token()
    {
        $user = User::factory()->make();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->json('get', route('vehicles.all'));
        $response->assertJsonStructure(['data']);
        $response->assertStatus(200);
    }
}