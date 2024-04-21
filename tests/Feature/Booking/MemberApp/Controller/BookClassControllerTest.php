<?php

declare(strict_types=1);

namespace Tests\Feature\Booking\OwnerApp\Controller;

use Tests\TestCase;

class BookClassControllerTest extends TestCase
{
    public function test_book_a_class_successfully(): void
    {
        $response = $this->post('/api/bookings', [
            'class_id' => '9315a7b4-6f43-4b66-bbaa-5c88783f00cc',
            'member_name' => 'Jane Doe',
            'date' => '2024-06-20',
        ]);

        $response->assertStatus(200);
    }
}
