<link rel="stylesheet" href="<?php publicPath("libs/bootstrap-4.6.2/css/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?php publicPath("libs/fontawesome-6.2.0/css/all.min.css") ?>">

<?php if (uri() === "/") : ?>
    <title>Trang chủ</title>
<?php elseif (uri() === "/detail") : ?>
    <title>Chi tiết</title>
<?php endif  ?>
