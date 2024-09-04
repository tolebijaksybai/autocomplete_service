<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (Throwable $e, Request $request) {

            if ($this->isApiRoute($request)) {
                $statusCode = $this->getStatusCode($e->getCode());

                $message = match ($statusCode) {
                    Response::HTTP_INTERNAL_SERVER_ERROR => $e->getMessage(),
                    default                              => $e->getMessage()
                };

                return response()->json(['message' => $message], $statusCode);
            }

        });
    }

    private function isApiRoute(Request $request): bool
    {
        return Str::startsWith($request->getRequestUri(), ['/api', 'api']);
    }

    private function getStatusCode(int $code): int
    {
        return ($code >= 300 && $code < 600) ? $code : Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
