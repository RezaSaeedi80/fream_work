<?php

namespace Main\Request;

class Request
{
    public static $method;
    public static $uri;

    public function __construct()
    {
        self::$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        self::$method = strtolower($_SERVER['REQUEST_METHOD']);
        foreach ($_REQUEST as $key => $item) {
            $this->{$key} = $item;
        }
    }
}