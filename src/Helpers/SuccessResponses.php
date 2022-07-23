<?php

namespace Satheez\ApiResponse\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as IlluminateResponse;

trait SuccessResponses
{
    /**
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    public function success(mixed $data = [], string $message = ''): JsonResponse
    {
        return $this
            ->setMessage($message)
            ->setData($data)
            ->setCode(IlluminateResponse::HTTP_OK)
            ->json();
    }

    /**
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    public function stored($data = [], string $message = null): JsonResponse
    {
        $message = $message ?? config('api-response.messages.success.stored');
        return $this->success($data, $message);
    }

    /**
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    public function deleted($data = [], string $message = null): JsonResponse
    {
        $message = $message?? config('api-response.messages.success.deleted');
        return $this->success($data, $message);
    }

}
