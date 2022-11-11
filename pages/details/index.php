<?php

try {
    $db = new Database();

    if (isset($_POST['comment']) && isset($_GET['id'])) {
        try {
            $cmt = htmlspecialchars($_POST['comment']);
            $userId = $_SESSION['user_id'];
            $postId = $_GET['id'];
            $sql = "INSERT INTO comments (content, user_id, post_id) VALUES ('$cmt', $userId, $postId)";
            $db->sql($sql)->execute();
        } catch (\Throwable $th) {
            include("./templates/_500.php");
            die();
        }
    }

    if (isset($_GET['s']) && isset($_GET['id'])) {
        $slug = $_GET['s'];
        $id = $_GET['id'];
        $sql = "SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.slug = '$slug' AND posts.id = '$id' AND posts.status = 1";
        $posts = $db->sql($sql)->get();
        if (count($posts) > 0) {
            $post = $posts[0];
            $sql = "SELECT comments.*, users.name FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.post_id = '$id' ORDER BY comments.id DESC";
            $comments = $db->sql($sql)->get();
        } else {
            include("./templates/_404.php");
            die();
        }
    } else {
        include("./templates/_404.php");
        die();
    }
} catch (\Throwable $th) {
    consoleLog($th);
    include("./templates/_500.php");
    die();
}

?>

<?php include("./components/_header.php") ?>
<div class="bg-color">
    <div class="container pt-4">
        <div class="row">
            <div class="col-8">
                <div class="post-wrapper">
                    <div class="post-title">
                        <h1><?php echo htmlspecialchars_decode($post['title']) ?></h1>
                    </div>
                    <small class="d-block pb-3">Ngày đăng <?php echo $post['created_at'] ?></small>
                    <div class="post-subtitle">
                        <p><?php echo htmlspecialchars_decode($post['subtitle']) ?></p>
                    </div>
                    <div class="post-image">
                        <img src="<?php echo $post['image'] ?>">
                    </div>
                    <div class="post-content">
                        <?php echo htmlspecialchars_decode($post['content']) ?>
                        <div class="text-right">
                            <span>Nguồn:</span>
                            <span><?php echo $post['name'] ?></span>
                        </div>
                    </div>
                    <div class="post-footer">
                        <a href="<?php route(ROUTE_HOMEPAGE) ?>">
                            <i class="fa-solid fa-angle-left"></i>
                            <span>Trang chủ</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="comment-wrapper">
                    <h5 class="comment-title">Thêm bình luận</h5>
                    <form action="<?php route(ROUTE_DETAILS, ['s' => $post['slug'], 'id' => $post['id']]) ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment" id="comment-input" placeholder="Nhập bình luận" <?php echo isset($_SESSION['user_id']) ? "" : "disabled" ?>>
                        </div>
                    </form>
                    <div class="comment-list">
                        <?php foreach ($comments as $comment) : ?>
                            <div class="comment-item">
                                <div class="comment-avt"><i class="fa-regular fa-user"></i></div>
                                <div>
                                    <h6 class="comment-user-name"><?php echo htmlspecialchars_decode($comment['name']) ?></h6>
                                    <p class="comment-content"><?php echo htmlspecialchars_decode($comment['content']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("./components/_footer.php") ?>
