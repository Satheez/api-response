<?php

namespace Satheez\ApiResponse\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as IlluminateResponse;

trait SuccessResponses
{
    /**
     * @param  mixed  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function success(mixed $data = [], string $message = '', int $httpCode = null): JsonResponse
    {
        return $this
            ->setMessage($message)
            ->setData($data)
            ->setCode($httpCode ?? IlluminateResponse::HTTP_OK)
            ->json();
    }

    /**
     * @param  mixed  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function created($data = [], string $message = null): JsonResponse
    {
        return $this->success($data, $message ?? config('api-response.messages.success.created'), IlluminateResponse::HTTP_CREATED);
    }

    /**
     * @param  mixed  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function stored($data = [], string $message = null): JsonResponse
    {
        return $this->success($data, $message ?? config('api-response.messages.success.stored'));
    }

    /**
     * @param  mixed  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function deleted($data = [], string $message = null): JsonResponse
    {
        return $this->success($data, $message ?? config('api-response.messages.success.deleted'));
    }
}
