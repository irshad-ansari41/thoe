<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/*',
        'cache-page',
        'save-lead',
        'save-lead-salesforace',
        'subscribe',
        'save-lead-wdoors',
        'en/online-payments/response',
        'admin/sale-center/*',
        'save-meta',
    ];

}
