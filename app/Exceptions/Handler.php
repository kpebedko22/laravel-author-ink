<?php

namespace App\Exceptions;

use App\Http\Responses\Api\v1\JsonErrorResponse;
use App\Managers\Admin\NotificationSessionManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RuntimeException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

//    public function register(): void
//    {
//        $this->renderable(function (RuntimeException $e, Request $request) {
//            NotificationSessionManager::error($e->getMessage());
//
//            return back();
//        });
//
//        $this->reportable(function (Throwable $e) {
//            //
//        });
//    }

//    public function render($request, Throwable $e)
//    {
//        return match (true) {
//            $request->is('api*') => $this->renderApi($request, $e),
//            default => parent::render($request, $e)
//        };
//    }

    public function renderApi($request, Throwable $e): JsonResponse
    {
        $version = match (true) {
            $request->is('api/v1*') => 'v1',
            default => '',
        };

        $className = get_class($e);

        switch ($className) {
            case NotFoundHttpException::class:
            case ModelNotFoundException::class:
                $response = new JsonErrorResponse(__("api/$version/exception.not_found"));
                $status = 404;
                break;
            default:
                $response = new JsonErrorResponse($e->getMessage());
                $status = 500;
                break;
        }

        return response()->json(
            $response,
            $status
        );
    }
}
