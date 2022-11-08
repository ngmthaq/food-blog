<?php
$isLogin = false;
$isAdmin = false;

?>

<div class="header">
    <div class="container container-flex align-items-center justify-content-between">
        <a href="/" class="logo">Food Blog</a>
        <div class="header-content">
            <a href="/" id="header-post" class="<?php echo uri() === '/' ? 'nav-active' : '' ?>">Trang chủ</a>
            <?php if ($isLogin) : ?>
                <a href="/posts/create" id="header-post">Đăng bài</a>
                <?php if ($isAdmin) : ?>
                    <a href="/admin/check" id="header-post-management">Quản lý bài viết</a>
                <?php endif; ?>
                <a href="javascript:void(0)" id="header-logout">Đăng xuất</a>
            <?php else : ?>
                <a href="javascript:void(0)" id="header-register">Đăng ký</a>
                <a href="javascript:void(0)" id="header-login">Đăng nhập</a>
            <?php endif; ?>
        </div>
    </div>
</div>
