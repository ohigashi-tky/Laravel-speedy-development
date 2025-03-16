<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use App\Models\Diary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Auth\Middleware\Authenticate;

class DiaryControllerTestOld extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create();

        Diary::factory(10)->create();
        $response = $this->actingAs($user)->get('/diary');
        $response->assertStatus(200);
        $response->assertViewIs('diaries.index');
    }
}
