<?php

use Gym\Apps\Booking\MemberApp\Controller\BookClassController;
use Gym\Apps\Booking\OwnerApp\Controller\CreateClassController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

Route::get('/', function() {
    return new JsonResponse([
        'message' => 'Gym API'
    ]);
});

Route::put('/classes', CreateClassController::class);

Route::post('/bookings', BookClassController::class);
