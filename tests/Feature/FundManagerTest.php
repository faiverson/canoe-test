<?php

namespace Tests\Feature;

use App\Models\FundManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FundManagerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_it_can_be_created(): void
    {
        $fund_manager = FundManager::factory()->create();
        $this->assertModelExists(FundManager::find($fund_manager->id));
    }
}
