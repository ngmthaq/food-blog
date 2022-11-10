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
    $uri = isLocalhost() ? str_replace("/" . DIR_NAME, "", $_SERVER["REQUEST_URI"]) : $_SERVER["REQUEST_URI"];
    $uri = explode("?", $uri);

    return $uri[0];
}

function currentUri()
{
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("?", $uri);

    return $uri[0];
}

function route(string $route, array $queries = [])
{
    $dir = DIR_NAME;
    $handleQueries = [];

    foreach ($queries as $key => $value) {
        $handleQueries[] = "$key=$value";
    }

    $queryString = implode("&", $handleQueries);

    $result = isLocalhost() ? "/$dir$route" : $route;

    echo $queryString === "" ? $result : "$result?$queryString";
}

function reload()
{
    $uri = uri();
    header("Location: $uri");
}

function redirect($path)
{
    $path = isLocalhost() ? "/" . DIR_NAME . $path : $path;
    header("Location: $path");
}

function convertUploadFileToB64($file)
{
    $fileTmp = $file['tmp_name'];
    $type = pathinfo($fileTmp, PATHINFO_EXTENSION);
    $data = file_get_contents($fileTmp);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    return $base64;
}

function slug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}

function uploadFile($file, $dir = "public/img")
{
    $fileName = strtolower(pathinfo($file['name'], PATHINFO_FILENAME));
    $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $finalFileName = "$fileName.$fileExt";
    $tmpFile = $file['tmp_name'];
    if (!is_dir($dir)) {
        mkdir($dir);
    }

    return move_uploaded_file($tmpFile, "$dir/$finalFileName") ? "/$dir/$finalFileName" : null;
}
