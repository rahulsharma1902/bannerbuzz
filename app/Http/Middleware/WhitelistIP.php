<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\MaintenanceIps;
use Auth;
class WhitelistIP
{
    /**
     * List of routes and middleware groups to exclude from IP whitelist check.
     */
    protected $excludedRoutes = [
        'what-is-my-ip',
        'loginProcc',
        'logout',
    ];

    protected $excludedMiddlewareGroups = [
        'admin',
    ];
    protected $excludedFrontPagesWithPara = [
        'login',
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
        // Fetch the maintenance mode status from the database
        $maintenanceStatus = MaintenanceIps::whereNull('ip_address')->first();

        // Check if the current route is in the excluded routes list
        if (in_array($request->route()->getName(), $this->excludedRoutes) || in_array($request->path(), $this->excludedRoutes)) {
            return $next($request);
        }

        if (in_array($request->route()->getName(), $this->excludedFrontPagesWithPara)) {
            // print_r($request->query());
            if (isset($request->query()['siteonmaintenance']) && $request->query('siteonmaintenance') !== '') {
                // Auth::logout();
                return $next($request);
            }
            
            
        }
        // Check if the request contains an excluded middleware group
        foreach ($request->route()->gatherMiddleware() as $middleware) {
            if (in_array($middleware, $this->excludedMiddlewareGroups)) {
                return $next($request);
            }
        }

        // If the site is in maintenance mode
        if ($maintenanceStatus && $maintenanceStatus->status === 'on') {
            // Fetch allowed IPs from the database
            $allowedIps = MaintenanceIps::whereNotNull('ip_address')->pluck('ip_address')->toArray();

            // Check if the client's IP is in the allowed IPs list
            if (in_array($request->ip(), $allowedIps)) {
                return $next($request);
            }

            // If the IP is not allowed, abort with a 503 status
            abort(503);
        }

        // If maintenance mode is off, proceed with the request
        return $next($request);
    }
}
