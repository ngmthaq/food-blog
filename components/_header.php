<?php
$isLogin = true;
$isAdmin = false;

?>

<div class="header">
    <a href="/" class="logo">Food Blog</a>
    <div class="header-right">
        <?php if ($isLogin) : ?>
            <a href="javascript:void(0)" id="header-post">Đăng bài</a>
            <?php if ($isAdmin) : ?>
                <a href="javascript:void(0)" id="header-post-management">Quản lý bài viết</a>
            <?php endif; ?>
            <a href="javascript:void(0)" id="header-logout">Đăng xuất</a>
        <?php else : ?>
            <a href="javascript:void(0)" id="header-register">Đăng ký</a>
            <a href="javascript:void(0)" id="header-login">Đăng nhập</a>
        <?php endif; ?>
    </div>
</div>
