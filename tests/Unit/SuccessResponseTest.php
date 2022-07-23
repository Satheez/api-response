<?php

use Illuminate\Http\Response as IlluminateResponse;

it('can return success response', function () {
    $response = api()->success();
    expect($response)->toBeInstanceOf(Illuminate\Http\JsonResponse::class);
    expect($response->status())->toBe(IlluminateResponse::HTTP_OK);
});

it('can return stored successfully response', function () {
    $response = api()->stored();
    expect($response)->toBeInstanceOf(Illuminate\Http\JsonResponse::class);
    expect($response->status())->toBe(IlluminateResponse::HTTP_OK);
});

it('can return deleted successfully response', function () {
    $response = api()->deleted();
    expect($response)->toBeInstanceOf(Illuminate\Http\JsonResponse::class);
    expect($response->status())->toBe(IlluminateResponse::HTTP_OK);
});
