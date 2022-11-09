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
    <p>
        <a href="<?php route(ROUTE_GET_POSTS) ?>" class="sidebar-link">
            Đăng xuất
        </a>
    </p>
</aside>
