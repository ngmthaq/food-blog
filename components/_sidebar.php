<?php

if (isset($_POST['logout'])) {
    session_unset();
    $_POST = [];
    redirect(ROUTE_HOMEPAGE);
}

?>

<aside class="sidebar">
    <h1><a href="<?php route(ROUTE_HOMEPAGE) ?>" class="logo">FOOD BLOG</a></h1>
    <p>
        <a href="<?php route(ROUTE_GET_POSTS) ?>" class="sidebar-link <?php echo uri() === ROUTE_GET_POSTS ? 'sidebar-link-active' : '' ?>">
            Danh sách bài viết
        </a>
    </p>
    <p>
        <a href="<?php route(ROUTE_CREATE_POST) ?>" class="sidebar-link <?php echo uri() === ROUTE_CREATE_POST ? 'sidebar-link-active' : '' ?>">
            Thêm bài viết
        </a>
    </p>
    <form id="logout-form" action="<?php echo currentUri() ?>" method="POST" class="d-inline-block w-100">
        <input type="submit" name="logout" value="Đăng xuất" class="sidebar-link bg-transparent border-0">
    </form>
</aside>
