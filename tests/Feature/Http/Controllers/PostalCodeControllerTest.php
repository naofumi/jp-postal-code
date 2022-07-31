<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\PostalCode;
use Tests\TestCase;

class PostalCodeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->postalCode = PostalCode::factory()
                                ->create([
                                    'postal_code' => '2140036',
                                    'prefecture' => '神奈川県',
                                    'city' => '川崎市',
                                    'street' => '多摩区生田'
                                ]);
    }

    public function test_index_with_no_query_paramters()
    {
        $response = $this->get('/postal_codes');

        $response->assertStatus(200);
        $response->assertSee('多摩区生田');
    }

    public function test_index_with_matching_prefecture()
    {
        $response = $this->get('/postal_codes', ['prefecture' => '神奈川県']);

        $response->assertStatus(200);
        $response->assertSee('多摩区生田');
    }

}
