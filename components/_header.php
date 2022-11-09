<?php
$isLogin = false;
$isAdmin = false;

?>

<div class="header">
    <div class="container container-flex align-items-center justify-content-between">
        <a href="<?php route(ROUTE_HOMEPAGE) ?>" class="logo">Food Blog</a>
        <div class="header-content">
            <a href="<?php route(ROUTE_HOMEPAGE) ?>" id="header-post" class="<?php echo uri() === ROUTE_HOMEPAGE ? 'nav-active' : '' ?>">
                Trang chủ
            </a>
            <?php if ($isLogin) : ?>
                <a href="<?php route(ROUTE_CREATE_POST) ?>" id="header-post">Đăng bài</a>
                <?php if ($isAdmin) : ?>
                    <a href="<?php route(ROUTE_ADMIN) ?>" id="header-post-management">Quản lý bài viết</a>
                <?php endif; ?>
                <a href="javascript:void(0)" id="header-logout">Đăng xuất</a>
            <?php else : ?>
                <a href="javascript:void(0)" id="header-register" data-toggle="modal" data-target="#register-model">
                    Đăng ký
                </a>
                <a href="javascript:void(0)" id="header-login" data-toggle="modal" data-target="#login-model">
                    Đăng nhập
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (!$isLogin) : ?>
    <!-- Login modal -->
    <div class="modal fade" id="login-model" tabindex="-1" aria-labelledby="login-model-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login-model-label">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="login-form">
                        <div class="form-group">
                            <label for="login-email-input" class="required">Email</label>
                            <input type="email" class="form-control" id="login-email-input" placeholder="Vui lòng nhập email của bạn">
                            <small id="login-email-err" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="login-password-input" class="required">Mật khẩu</label>
                            <input type="password" class="form-control" id="login-password-input" placeholder="Vui lòng nhập mật khẩu của bạn">
                            <small id="login-password-err" class="form-text text-danger"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="login-form" class="btn btn-primary">Đăng nhập</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Register modal -->
    <div class="modal fade" id="register-model" tabindex="-1" aria-labelledby="register-model-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register-model-label">Đăng ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="register-form">
                        <div class="form-group">
                            <label for="register-email-input" class="required">Họ và tên</label>
                            <input type="text" class="form-control" id="register-name-input" placeholder="Vui lòng nhập họ tên của bạn">
                            <small id="register-name-err" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="register-email-input" class="required">Email</label>
                            <input type="email" class="form-control" id="register-email-input" placeholder="Vui lòng nhập email của bạn">
                            <small id="register-emai-err" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="register-password-input" class="required">Mật khẩu</label>
                            <input type="password" class="form-control" id="register-password-input" placeholder="Vui lòng nhập mật khẩu của bạn">
                            <small id="register-password-err" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="register-password-confirmation-input" class="required">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="register-password-confirmation-input" placeholder="Vui lòng nhập mật khẩu của bạn">
                            <small id="register-password-confirmation-err" class="form-text text-danger"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="register-form" class="btn btn-primary">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
