<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\ValueObjects\PhoneNumber;

class FormatPhoneNumberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('phone')) {
            $request->merge(['phone' => PhoneNumber::getFormattedPhoneNumber($request->phone)]);
        }

        return $next($request);
    }
}
