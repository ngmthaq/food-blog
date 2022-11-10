<?php

// Bắt sự kiện người dùng thêm ảnh trong text editor
if (isset($_POST['ckeditor-upload-file'])) {
    if ($url = uploadFile($_FILES['file'], "public/img/ckeditor")) {
        echo json_encode(['url' => isLocalhost() ? '/' . DIR_NAME . $url : $url]);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Không thể tải file lên']);
    }
    exit();
}
