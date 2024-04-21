<?php

declare(strict_types=1);

namespace Tests\Feature\OwnerApp\Controller;

use Tests\TestCase;

class CreateClassController extends TestCase
{
    public function test_create_a_class_successfully(): void
    {
        $response = $this->post('/api/class', [
            'name' => 'Pilates',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-20',
            'capacity' => 10
        ]);

        $response->assertStatus(200);
    }
}
