<?php

require_once("./configs/constants.php");
require_once("./configs/helpers.php");
require_once("./configs/database.php");

try {
    $uri = str_replace("/", "\\", $_SERVER["REQUEST_URI"]);
    $uri = isLocalhost() ? str_replace("\\" . DIR_NAME, "", $uri) : $uri;
    $page = DIR_PAGE_ROOT . $uri . "\\index.php";

    if (!file_exists($page)) {
        include(DIR_TEMPLATE_ROOT . "\\_404.php");
        die();
    }
} catch (\Throwable $th) {
    include(DIR_TEMPLATE_ROOT . "\\_500.php");
    consoleLog($th);
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./components/_head.php") ?>
</head>

<body>
    <section id="app">
        <?php include("./components/_header.php") ?>
        <section class="main">
            <?php include($page) ?>
        </section>
        <?php include("./components/_footer.php") ?>
    </section>

    <?php include("./components/_script.php") ?>
</body>

</html>
