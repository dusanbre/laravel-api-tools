<?php

namespace Envoo\LaravelApiTools\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;


class Handler extends ExceptionHandler
{

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(static function (AccessDeniedHttpException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        });

        $this->renderable(static function (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        });

        $this->renderable(static function (AuthenticationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        });

        $this->renderable(static function (MethodNotAllowedHttpException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        });

        $this->renderable(static function (GlobalException $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        });
    }
}