<?php

declare(strict_types=1);

namespace Gym\Apps\Booking\MemberApp\Controller;

use DateTime;
use Gym\Apps\Booking\MemberApp\Request\BookClassRequest;
use Gym\Booking\Application\BookClassUseCase;
use Gym\Booking\Application\CreateClassUseCase;
use Gym\Shared\Domain\Exception\GymDomainException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BookClassController
{
    public function __invoke(
        BookClassRequest $request,
        BookClassUseCase $useCase,
    ): JsonResponse {
        try {
            $useCase->book(
                $request->get('class_id'),
                $request->get('member_name'),
                new DateTime($request->get('date')),
            );

            return new JsonResponse();
        } catch (GymDomainException $exception) {
            return new JsonResponse(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        } catch (Throwable $throwable) {
            return new JsonResponse(['message' => $throwable->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
