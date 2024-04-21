<?php

declare(strict_types=1);

namespace Gym\Apps\Booking\MemberApp\Controller;

use DateTime;
use Gym\Apps\Booking\MemberApp\Request\BookClassRequest;
use Gym\Booking\Application\CreateClassUseCase;
use Gym\Shared\Domain\Exception\GymDomainException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BookClassController
{
    public function __invoke(
        BookClassRequest $request,
        CreateClassUseCase $useCase,
    ): JsonResponse {
        try {
            $useCase->create(
                $request->get('name'),
                new DateTime($request->get('start_date')),
                new DateTime($request->get('end_date')),
                (int) $request->get('capacity'),
            );

            return new JsonResponse();
        } catch (GymDomainException $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (Throwable $throwable) {
            return new JsonResponse([
                'message' => $throwable->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
