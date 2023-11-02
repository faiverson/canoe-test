<?php

namespace Tests\Feature;

use App\Models\Fund;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FundTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_it_can_be_created(): void
    {
        $fund = Fund::factory()->create();
        $this->assertModelExists(Fund::find($fund->id));
    }
}
