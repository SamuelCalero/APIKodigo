<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'PUT',
        'DELETE',
        'POST',
        'GET',
    ];
    protected $addHttpMethods = [
        'PUT',
        'DELETE',
        'POST',
        'GET',
    ];
    protected $addHttpHeaders = [
        'Access-Control-Allow-Origin' => 'http://localhost:3000',
    ];
}
