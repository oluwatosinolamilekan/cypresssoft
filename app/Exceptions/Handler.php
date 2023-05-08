<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            if ($exception instanceof ValidationException) {
                return $this->convertValidationExceptionToResponse($exception, $request);
            }
            if ($exception instanceof ModelNotFoundException) {
                $modelName = strtolower(class_basename($exception->getModel()));

                return response()->errorResponse("Unable to find any {$modelName} with the specified ID", [], 404);
            }
            if ($exception instanceof AuthenticationException) {
                return $this->unauthenticated($request, $exception);
            }
            if ($exception instanceof AuthorizationException) {
                return response()->errorResponse($exception->getMessage(), [], 403);
            }
            if ($exception instanceof MethodNotAllowedException) {
                $method = $request->method();

                return response()->errorResponse("{$method} request method is not supported on this endpoint", [], 403);
            }
            if ($exception instanceof NotFoundHttpException) {
                return response()->errorResponse('The requested endpoint does not exist', [], 404);
            }
            if ($exception instanceof HttpException) {
                return response()->errorResponse($exception->getMessage(), [], $exception->getStatusCode());
            }
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->wantsJson()
            ? response()->errorResponse($exception->getMessage(), $exception, 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        if ($e->response) {
            return $e->response;
        }

        return $request->expectsJson()
                    ? response()->errorResponse('One or more fields are invalid', $e->errors(), $e->status)
                    : $this->invalid($request, $e);
    }


    public function errorResponse($message, $statuscode)
    {
        return response()->json([
            'status' => $statuscode,
            'message' => $message,
        ]);
    }
}
