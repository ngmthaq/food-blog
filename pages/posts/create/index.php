<?php

if (isset($_POST['create-post'])) {
    try {
        $title = htmlspecialchars($_POST['title']);
        $subtitle = htmlspecialchars($_POST['subtitle']);
        $content = htmlspecialchars($_POST['content']);
        $image = $_FILES['image'];
        $imageUrl = uploadFile($image, "public/img/posts");
        $slug = slug($_POST['title']) . "-" . time();
        $userId = $_SESSION['user_id'];
        $db = new Database();
        $sql = "INSERT INTO `posts` (`title`, `subtitle`, `content`, `image`, `slug`, `user_id`) 
            VALUES ('$title', '$subtitle', '$content', '$imageUrl', '$slug', $userId)";
        $db->sql($sql)->execute();
        redirect(ROUTE_GET_POSTS);
    } catch (\Throwable $th) {
        consoleLog($th->getTrace());
    }
}

?>

<div class="sidebar-layout">
    <?php include("./components/_sidebar.php") ?>
    <div class="main-sidebar-container">
        <div class="main-sidebar-content p-4">
            <h1 class="pb-4">Thêm bài viết</h1>
            <form action="<?php echo currentUri() ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="required">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề" name="title">
                </div>
                <div class="form-group">
                    <label for="subtitle" class="required">Tiêu đề phụ</label>
                    <input type="text" class="form-control" id="subtitle" placeholder="Nhập tiêu đề phụ" name="subtitle">
                </div>
                <div class="form-group">
                    <label class="required">Chọn hình ảnh</label>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                    </div>
                    <img src="" id="img-preview" style="display: none; height: 300px; width: auto;">
                </div>
                <div class="form-group">
                    <label for="editor" class="required">Nội dung bài viết</label>
                    <textarea id="editor" name="content"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Đăng bài" name="create-post" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let imgInp = document.querySelector("#image");
    let imgPreview = document.querySelector("#img-preview");

    imgInp.onchange = function(evt) {
        const file = evt.target.files[0];
        console.log(file);
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            imgPreview.style.display = "block";
        } else {
            imgPreview.style.display = "none";
        }
    }
</script>
