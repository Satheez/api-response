<?php

namespace Satheez\ApiResponse\Helpers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as IlluminateResponse;

trait ErrorResponses
{
    /**
     * @param  string  $message
     * @param  int  $httpCode
     * @return JsonResponse
     */
    public function error(string $message, int $httpCode = null): JsonResponse
    {
        $this->setError($message);

        $this->setCode($httpCode ?? IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY);

        return $this->json();
    }

    /**
     * @param  string  $message
     * @return JsonResponse
     */
    public function validationError(string $message): JsonResponse
    {
        return $this->error($message, IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @return JsonResponse
     */
    public function unauthorized(): JsonResponse
    {
        return $this->byCode(IlluminateResponse::HTTP_UNAUTHORIZED);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound(): JsonResponse
    {
        return $this->byCode(IlluminateResponse::HTTP_NOT_FOUND);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function accessDenied(): JsonResponse
    {
        return $this->forbidden();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden(): JsonResponse
    {
        return $this->byCode(IlluminateResponse::HTTP_FORBIDDEN);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function invalidRequest(): JsonResponse
    {
        return $this->byCode(IlluminateResponse::HTTP_BAD_REQUEST);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function somethingWentWrong(): JsonResponse
    {
        return $this->byCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param  Exception  $ex
     * @param  string|null  $message
     * @return JsonResponse
     */
    public function exception(Exception $ex, string $message = null): JsonResponse
    {
        return $this->error(
            $message ?? $ex->getMessage(),
            $ex->getCode()
        );
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    private function byCode(int $httpCode): JsonResponse
    {
        return $this->error(config("api-response.messages.by-http-code.{$httpCode}", 'Error'), $httpCode);
    }
}
