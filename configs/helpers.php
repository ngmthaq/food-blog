<?php

function dump(mixed $data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function isLocalhost(): bool
{
    $host = $_SERVER["HTTP_HOST"];

    return $host === 'localhost' || $host === '127.0.0.1' ? true : false;
}

function consoleLog($data)
{
    echo "<script>" . PHP_EOL;
    echo "var __console_log_data__ = '" . str_replace("\\", "\\\\", json_encode($data)) . "'" . PHP_EOL;
    echo "console.log(JSON.parse(__console_log_data__));" . PHP_EOL;
    echo "</script>";
}

function publicPath($path)
{
    $dir = DIR_NAME;
    echo isLocalhost() ? "/$dir/public/" . $path . "?v=" . time() : "/public/" . $path . "?v=" . time();
}

function uri()
{
    $uri= isLocalhost() ? str_replace("/" . DIR_NAME, "", $_SERVER["REQUEST_URI"]) : $_SERVER["REQUEST_URI"];
    $uri = explode("?", $uri);

    return $uri[0];
}

function currentUri()
{
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("?", $uri);

    return $uri[0];
}

function route($route)
{
    $dir = DIR_NAME;
    echo isLocalhost() ? "/$dir$route" : $route;
}

function reload()
{
    $uri = uri();
    header("Location: $uri");
}

function redirect($path)
{
    header("Refresh:0; url=$path");
}
