
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Standard API response class

[![Latest Version on Packagist](https://img.shields.io/packagist/v/satheez/api-response.svg?style=flat-square)](https://packagist.org/packages/satheez/api-response)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/satheez/api-response/run-tests?label=tests)](https://github.com/satheez/api-response/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/satheez/api-response/Check%20&%20fix%20styling?label=code%20style)](https://github.com/satheez/api-response/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/satheez/api-response.svg?style=flat-square)](https://packagist.org/packages/satheez/api-response)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require satheez/api-response
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="api-response-config"
```

## Usage

Example

```php
<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // todo, paginate the user data
        return api()->success(User::all()->toArray());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // todo validate the request data
        $user = User::create($request->all());
        return api()->created($user->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = User::find($id);

        // todo update process
        return !empty($user)
            ? api()->success($user->toArray())
            : api()->notFound();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        // todo update process
        return api()->stored(User::find($id)->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        User::destroy($id);
        return api()->deleted();
    }
}
```

## Available methods

### Success Methods :v:
| Method | Status code | Description |
|---|---|---|
|api()->success()|200|Successful get, patch (return a JSON object)|
|api()->created()|201|Successful record create (return a JSON object)|
|api()->updated()|200|Successful record update (return a JSON object)|

### Error Status :shit:
| Method | Status code | Description |
|---|---|---|
|api()->unauthorized()|401|Error Not authenticated|
|api()->invalidRequest()|400|Error invalid request|
|api()->accessDenied()|403|Error Not authorized (Authenticated, but no permissions)|
|api()->forbidden()|403|Error Not authorized (Authenticated, but no permissions)|
|api()->notFound()|404|Error Not Found|
|api()->validationError($message)|422|Error Validation|
|api()->somethingWentWrong()|500|Internal error|
|api()->exception($exception)||Error with exception|

### Extra methods :man:
| Method | Status code | Description |
|---|---|---|
|api()->error($message, $httpCode)|422 (default)|Custom Error response|
|api()->success($data, $message, $httpCode)|200 (default)|Custom Success response|


## Testing

```bash
composer test
```
## Credits

- [Satheez](https://github.com/Satheez)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
