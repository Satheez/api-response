<?php

use Illuminate\Http\Response;

return [
  'messages' => [
    'by-http-code' => [
      Response::HTTP_UNAUTHORIZED => 'Unauthorized',
      Response::HTTP_NOT_FOUND => 'Not found',
      Response::HTTP_UNAUTHORIZED => 'Access Denied',
      Response::HTTP_FORBIDDEN => 'Access Denied',
      Response::HTTP_BAD_REQUEST => 'Invalid Request',
      Response::HTTP_INTERNAL_SERVER_ERROR => 'Something went wrong. Please try again later.',
    ],

    'success' => [
      'stored' =>  'Successfully Stored',
      'deleted' => 'Successfully Deleted',
    ],

  ],
];
