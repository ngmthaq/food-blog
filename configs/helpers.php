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

function slug($text)
{
    $trans = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'jo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'jj',
        'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
        'х' => 'kh', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'eh', 'ю' => 'ju', 'я' => 'ja',
    ];
    $text  = mb_strtolower($text, 'UTF-8'); // lowercase cyrillic letters too
    $text  = strtr($text, $trans); // transliterate cyrillic letters
    $text  = preg_replace('/[^A-Za-z0-9 _.]/', '', $text);
    $text  = preg_replace('/[ _.]+/', '-', trim($text));
    $text  = trim($text, '-');

    return $text . "-" . time();
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
