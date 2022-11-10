<?php

if (isset($_POST['ckeditor-upload-file'])) {
    echo json_encode(['url' => isLocalhost() ? '/' . DIR_NAME . '/public/img/ads.png' : '/public/img/ads.png']);
    exit();
}
