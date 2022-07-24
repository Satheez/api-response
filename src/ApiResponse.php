<?php

namespace Satheez\ApiResponse;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as IlluminateResponse;
use Satheez\ApiResponse\Helpers\ErrorResponses;
use Satheez\ApiResponse\Helpers\SuccessResponses;

class ApiResponse
{
    use SuccessResponses;
    use ErrorResponses;

    /**
     * @var mixed
     */
    private mixed $data = [];

    /**
     * @var array
     */
    private array $headers = [];

    /**
     * @var string|null
     */
    private ?string $message = null;

    /**
     * @var string|null
     */
    private ?string $error = null;

    /**
     * @var int
     */
    private int $httpCode = IlluminateResponse::HTTP_OK;

    /**
     * @param  mixed  $data
     * @return $this
     */
    public function setData(mixed $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param  string  $error
     * @return $this
     */
    public function setError(string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param  string  $message
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->message = ! empty($message) ? $message : null;

        return $this;
    }

    /**
     * @param  int  $httpCode
     * @return $this
     */
    public function setCode(int $httpCode): self
    {
        $this->httpCode = $httpCode;

        return $this;
    }

    /**
     * @param  array  $headers
     * @return $this
     */
    public function withHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param  string  $key
     * @param  string  $value
     * @return $this
     */
    public function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * @return array[string: mixed]
     */
    public function get(): array
    {
        $response = ['data' => $this->data];

        if ($this->error !== null) {
            $response['error'] = $this->error;
        }

        if ($this->message !== null) {
            $response['message'] = $this->message;
        }

        return $response;
    }

    /**
     * @return JsonResponse
     */
    public function json(): JsonResponse
    {
        return response()->json($this->get(), $this->httpCode, $this->headers);
    }
}
