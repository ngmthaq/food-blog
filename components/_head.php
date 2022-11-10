<?php if (uri() === ROUTE_HOMEPAGE) : ?>
    <title>Trang chủ</title>
<?php elseif (uri() === ROUTE_DETAILS) : ?>
    <title>Chi tiết bài viết</title>
<?php elseif (uri() === ROUTE_CREATE_POST) : ?>
    <title>Thêm bài viết</title>
<?php endif  ?>
