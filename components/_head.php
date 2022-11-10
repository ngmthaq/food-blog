<?php if (uri() === ROUTE_HOMEPAGE) : ?>
    <title>Trang chủ</title>
<?php elseif (uri() === ROUTE_DETAILS) : ?>
    <title>Chi tiết bài viết</title>
<?php elseif (uri() === ROUTE_CREATE_POST) : ?>
    <title>Tạo bài viết mới</title>
<?php elseif (uri() === ROUTE_GET_POSTS) : ?>
    <title>Danh sách bài viết</title>
<?php elseif (uri() === ROUTE_CREATE_POST) : ?>
    <title>Thêm bài viết</title>
<?php elseif (uri() === ROUTE_ADMIN) : ?>
    <title>Duyệt bài viết</title>
<?php endif  ?>
