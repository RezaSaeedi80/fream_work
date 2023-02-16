<?php

namespace Main\Route;

use Main\Request\Request;

class Route
{
    protected static $routes;

    public static function get($url, array $callable)
    {
        self::$routes['get'][$url] = $callable;
    }

    public static function post($url, array $callable)
    {
        self::$routes['post'][$url] = $callable;
    }

    public static function put($url, array $callable)
    {
        self::$routes['put'][$url] = $callable;
    }

    public static function delete($url, array $callable)
    {
        self::$routes['delete'][$url] = $callable;
    }

    public static function run()
    {
        $request = new Request();
        if ($request::$method == 'get') {
            $routes = self::$routes['get'];
        } else {
            if ($request->{'__method'}) {
                $routes = self::$routes[$request->{'__method'}];
            } else {
                $routes = self::$routes['post'];
            }
        }

        if (array_key_exists($request::$uri, $routes)) {
            $route = $routes[$request::$uri];
            call_user_func([new $route[0], $route[1]], $request);
        }
    }

}