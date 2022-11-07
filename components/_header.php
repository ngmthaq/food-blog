<?php
$isLogin = true;
$isAdmin = false;

?>

<div class="header">
    <a href="#" class="logo">Food Blog</a>
    <div class="header-right">
        <?php if ($isLogin) : ?>
            <a href="#" id="post">Đăng bài</a>
            <?php if ($isAdmin) : ?>
                <a href="#" id="post_management">Quản lý bài viết</a>
            <?php endif; ?>
            <a href="#" id="logout">Đăng xuất</a>
        <?php else : ?>
            <a href="#" id="register">Đăng ký</a>
            <a href="#" id="login">Đăng nhập</a>
        <?php endif; ?>
    </div>
</div>