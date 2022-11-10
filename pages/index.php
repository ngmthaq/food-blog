<?php include("./components/_header.php") ?>
<div class="container">
    <div class="culinary culinary-pt">
        <div class="box-container box-container-center">
            <div class="culinary-left">
                <div class="culinary-main">
                    <h3 class="food-deli-title">Bài viết mới</h3>
                </div>
                <?php for ($i = 0; $i < 10; $i++) : ?>
                    <div class="blog-main">
                        <a href="<?php route(ROUTE_DETAILS) ?>">
                            <img class="blog-img" src="<?php publicPath("img/blog-img.png") ?>"/>
                        </a>
                        <div class="blog-content">
                            <div>
                                <h3 class="blog-content-title limit-text-2">
                                    <a href="<?php route(ROUTE_DETAILS) ?>">
                                        Trứng cuộn tôm hấp - món ăn bổ dưỡng cho cả nhà trọn vị
                                    </a>
                                </h3>
                                <p class="blog-desc limit-text-3">
                                    Món canh là một phần không thể thiếu trong bữa cơm gia đình
                                    phải không nào? Chính vì vậy hôm này hãy cùng tôi tìm hiểu về cách
                                    thức chế biến món ăn này nhé!
                                </p>
                            </div>
                            <div class="blog-box">
                                <div class="blog-user">
                                    <span>
                                        <a href="#" class="blog-name">Trà My</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
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
