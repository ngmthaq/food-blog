<?php
$post = "";
try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $db = new Database();
        $sql = "SELECT * FROM `posts` WHERE `id` = '$id'";
        $data = $db->sql($sql)->get();
//        print_r($data);
        $post = $data[0];
    }
} catch (\Throwable $th) {
    consoleLog($th->getTrace());
    include("./templates/_500.php");
    die();
}

if (isset($_POST['update-post'])) {
    try {
        $id = $_GET['id'];
        $title = htmlspecialchars($_POST['title']);
        $subtitle = htmlspecialchars($_POST['subtitle']);
        $content = htmlspecialchars($_POST['content']);
        var_dump($_FILES['image']['error']);
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $image = $_FILES['image'];
            $imageUrl = uploadFile($image, "public/img/posts");
            $imageUrl = isLocalhost() ? "/" . DIR_NAME . $imageUrl : $imageUrl;
        } else {
            $imageUrl = $post['image'];
        }
        $slug = slug($_POST['title']) . "-" . time();
        $userId = $_SESSION['user_id'];

        $db = new Database();
        $sql = "UPDATE `posts` SET `title` = '$title', `subtitle`  = '$subtitle', `content` = '$content', `image` =  '$imageUrl', `slug` = '$slug' WHERE `id` = $id";
        $db->sql($sql)->execute();
        redirect(ROUTE_GET_POSTS);
    } catch (\Throwable $th) {
        consoleLog($th->getTrace());
        include("./templates/_500.php");
        die();
    }
}

?>

<div class="sidebar-layout">
    <?php include("./components/_sidebar.php") ?>
    <div class="main-sidebar-container">
        <div class="main-sidebar-content">
            <h1 class="pb-4">Chỉnh sửa bài viết</h1>
            <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="required">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề" name="title" value="<?php echo htmlspecialchars_decode($post['title'])?>">
                </div>
                <div class="form-group">
                    <label for="subtitle" class="required">Tiêu đề phụ</label>
                    <input type="text" class="form-control" id="subtitle" placeholder="Nhập tiêu đề phụ" name="subtitle" value="<?php echo htmlspecialchars_decode($post['subtitle'])?>">
                </div>
                <div class="form-group">
                    <label class="required">Chọn hình ảnh</label>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                    </div>
                    <img src="<?php echo $post['image'] ?>" id="img-preview" style="height: 300px; width: auto;">
                </div>
                <div class="form-group">
                    <label for="editor" class="required">Nội dung bài viết</label>
                    <textarea id="editor" name="content"><?php echo htmlspecialchars_decode($post['content'])?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Sửa bài" name="update-post" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview ảnh
    let imgInp = document.querySelector("#image");
    let imgPreview = document.querySelector("#img-preview");

    imgInp.onchange = function(evt) {
        const file = evt.target.files[0];
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            imgPreview.style.display = "block";
        } else {
            imgPreview.style.display = "none";
        }
    }
</script>
