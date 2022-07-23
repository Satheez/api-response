<?php

use Illuminate\Http\Response as IlluminateResponse;

it('can return not found error response', function () {
    $response = api()->notFound();
    expect($response)->toBeInstanceOf(Illuminate\Http\JsonResponse::class);
    expect($response->status())->toBe(IlluminateResponse::HTTP_NOT_FOUND);
});

it('can return forbidden error response', function () {
    $response = api()->forbidden();
    expect($response)->toBeInstanceOf(Illuminate\Http\JsonResponse::class);
    expect($response->status())->toBe(IlluminateResponse::HTTP_FORBIDDEN);
});

it('can return internal error response', function () {
    $response = api()->somethingWentWrong();
    expect($response)->toBeInstanceOf(Illuminate\Http\JsonResponse::class);
    expect($response->status())->toBe(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR);
});
