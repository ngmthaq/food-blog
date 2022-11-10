<?php include("./components/_header.php") ?>
<div class="bg-color">
    <div class="container pt-4">
        <div class="row">
            <div class="col-8">
                <div class="post-wrapper">
                    <div class="post-title">
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    </div>
                    <div class="post-subtitle">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Debitis inventore qui adipisci ut earum facilis deserunt,
                            non laborum atque ducimus sunt consectetur minus laudantium accusamus?
                            Adipisci iste repellendus autem saepe.
                        </p>
                    </div>
                    <div class="post-image">
                        <img src="<?php publicPath("img/blog-img.png") ?>">
                    </div>
                    <div class="post-content">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Debitis inventore qui adipisci ut earum facilis deserunt,
                            non laborum atque ducimus sunt consectetur minus laudantium accusamus?
                            Adipisci iste repellendus autem saepe.
                        </p>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Debitis inventore qui adipisci ut earum facilis deserunt,
                            non laborum atque ducimus sunt consectetur minus laudantium accusamus?
                            Adipisci iste repellendus autem saepe.
                        </p>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Debitis inventore qui adipisci ut earum facilis deserunt,
                            non laborum atque ducimus sunt consectetur minus laudantium accusamus?
                            Adipisci iste repellendus autem saepe.
                        </p>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Debitis inventore qui adipisci ut earum facilis deserunt,
                            non laborum atque ducimus sunt consectetur minus laudantium accusamus?
                            Adipisci iste repellendus autem saepe.
                        </p>
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
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment" id="comment-input" placeholder="Nhập bình luận">
                        </div>
                    </form>
                    <div class="comment-list">
                        <?php for ($i = 0; $i < 10; $i++) : ?>
                            <div class="comment-item">
                                <div class="comment-avt"><i class="fa-regular fa-user"></i></div>
                                <div>
                                    <h6 class="comment-user-name">Nguyễn Mạnh Thắng</h6>
                                    <p class="comment-content">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    </p>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("./components/_footer.php") ?>
