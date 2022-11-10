<?php

// Nếu tồn tại message lỗi thì xoá message
if (isset($_SESSION["login-error"])) {
    unset($_SESSION["login-error"]);
}

// Kiểm tra user đã đăng nhập hay chưa và phân quyền của user
$isLogin = isset($_SESSION["user_id"]);
$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] == 1;

// Bắt sự kiện người dùng đăng nhập
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_POST = [];
    $db = new Database();
    $data = $db->sql("SELECT * FROM users WHERE email = '$email'")->get();
    if (count($data) > 0) {
        $user = $data[0];
        if ($user["password"] === $password) {
            unset($_SESSION["login-error"]);
            $isLogin = true;
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"];
            $isAdmin = $user["role"] == 1;
        } else {
            unset($_SESSION["user_id"]);
            unset($_SESSION["role"]);
            $_SESSION["login-error"] = "Sai tài khoản hoặc mật khẩu";
        }
    } else {
        unset($_SESSION["user_id"]);
        unset($_SESSION["role"]);
        $_SESSION["login-error"] = "Sai tài khoản hoặc mật khẩu";
    }
}

// Bắt sự kiện người dùng đăng xuất
if (isset($_POST['logout'])) {
    session_unset();
    $_POST = [];
    $isAdmin = false;
    $isLogin = false;
}

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
                <form id="logout-form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <input type="submit" name="logout" value="Đăng xuất">
                </form>
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
    <!-- Form đăng nhập -->
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
                    <form id="login-form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                        <div class="form-group">
                            <label for="login-email-input" class="required">Email</label>
                            <input type="email" class="form-control" name="email" id="login-email-input" placeholder="Vui lòng nhập email của bạn">
                            <small id="login-email-err" class="form-text text-danger"><?php echo isset($_SESSION["login-error"]) ? $_SESSION["login-error"] : "" ?></small>
                        </div>
                        <div class="form-group">
                            <label for="login-password-input" class="required">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="login-password-input" placeholder="Vui lòng nhập mật khẩu của bạn">
                            <small id="login-password-err" class="form-text text-danger"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="login-form" class="btn btn-primary" name="login">Đăng nhập</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form đăng ký -->
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


<?php if (isset($_SESSION["login-error"])) : ?>
    <script>
        document.querySelector("#header-login").click();
    </script>
<?php endif; ?>
