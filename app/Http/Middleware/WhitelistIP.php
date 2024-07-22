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
        '2405:201:5023:4020:b586:d117:f65d:c472',  //hitesh
        '2405:201:5023:4020:4e5f:bf9e:5a6b:2467',   // rahul  
        '2405:201:5023:4020:3ec:2698:8465:2547', //nikita designer
        
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