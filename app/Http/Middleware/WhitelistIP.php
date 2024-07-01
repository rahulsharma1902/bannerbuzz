<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WhitelistIP
{
    /**
     * List of allowed IP addresses.
     */
    protected $allowedIps = [
        '2401:4900:1c2b:4d9e:c9a6:f310:1b18:3009',  //hitesh
        '2401:4900:1c2b:4d9e:e1d7:13a:c279:c63b',   // designer shiwani
        '2401:4900:1c2b:4d9e:8c1d:a5d5:fff4:d9d2',  // developer shiwani
        '2401:4900:1c2b:4d9e:ab62:1075:5fd8:244b',   // rahul sir
        '127.0.0.1',
        // // '2401:4900:1c2b:5887:1e2:3ebb:c29d:e1c7',
        // // '51.7.219.99',
        // '2401:4900:1c2b:573b:efd:d6b9:3a07:716c',
        // '2401:4900:1c2b:573b:c997:197f:177e:6975',
        // '49.43.97.239',
        
    ];

    protected $excludedRoutes = [
        'notify',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->path(), $this->excludedRoutes)) {
            return $next($request);
        }
        if (in_array($request->ip(), $this->allowedIps)) {
            return $next($request);
        }

        abort(503);
    }
}