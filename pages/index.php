<?php

$db = new Database();
$sql = "SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.status = 1 ORDER BY created_at DESC";
$posts = $db->sql($sql)->get();

?>

<?php include("./components/_header.php") ?>
<div class="container">
    <div class="culinary culinary-pt">
        <div class="box-container box-container-center">
            <div class="culinary-left">
                <div class="culinary-main">
                    <h3 class="food-deli-title">Bài viết mới</h3>
                </div>
                <?php foreach ($posts as $post) : ?>
                    <div class="blog-main">
                        <a href="<?php route(ROUTE_DETAILS, ["s" => $post['slug'], 'id' => $post['id']]) ?>">
                            <img class="blog-img" src="<?php echo $post['image'] ?>" />
                        </a>
                        <div class="blog-content">
                            <div>
                                <h3 class="blog-content-title limit-text-2">
                                    <a href="<?php route(ROUTE_DETAILS, ["s" => $post['slug'], 'id' => $post['id']]) ?>">
                                        <?php echo htmlspecialchars_decode($post['title']) ?>
                                    </a>
                                </h3>
                                <p class="blog-desc limit-text-3">
                                    <?php echo htmlspecialchars_decode($post['subtitle']) ?>
                                </p>
                            </div>
                            <div class="blog-box">
                                <div class="blog-user">
                                    <span>
                                        <a href="javascript:void(0)" class="blog-name"><?php echo $post['name'] ?></a>
                                        <span>|</span>
                                        <a href="javascript:void(0)" class="blog-name"><?php echo $post['created_at'] ?></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="culinary-right culinary-product">
                <div class="blog-ads mb-24">
                    <a href="#">
                        <img class="culinary-img mt-0" src="<?php publicPath("img/ads.png") ?>">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("./components/_footer.php") ?>
