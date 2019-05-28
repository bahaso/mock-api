<?php

namespace App\Http\Middleware;

use App\Entities\Endpoint;
use Closure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $router = app()->make('router');

        $group_endpoints = Endpoint::get()->groupBy(['url', 'method', 'status']);

        foreach ($group_endpoints as $url => $method_endpoints) {
            foreach ($method_endpoints as $method => $endpoints) {
                $router->$method($url, function () use ($request, $endpoints) {
                    $status_code = (int) $request->header('status-code');
                    $status_code = $status_code ? $status_code : 200;

                    if (isset($endpoints[$status_code])) {
                        $endpoint = $endpoints[$status_code][0];
                        return response()->json(json_decode($endpoint->response), $endpoint->status, ($endpoint->header ? $endpoint->header : []));
                    } else {
                        throw new NotFoundHttpException("The requested status-code for given URL is invalid");
                    }
                });
            }
        }

        return $next($request);
    }
}
