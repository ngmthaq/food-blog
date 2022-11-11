<?php

// Get data về
$db = new Database();
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM `posts` WHERE `user_id` = '$userId'";
$data = $db->sql($sql)->get();

if (isset($_POST['delete']) && isset($_POST['id'])) {
    $posId = $_POST['id'];
    try {
        $db = new Database();
        $sql = "DELETE FROM `posts` WHERE `id` = '$posId'";
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
        <div class="main-sidebar-content p-4">
            <h1 class="pb-4">Quản lý bài viết</h1>
            <table id="datas" class="table table-bordered" style="width:100%">
                <thead style="color:black;">
                    <th class="text-center col-1">ID bài viết</th>
                    <th class="text-center col-3">Tên bài viết</th>
                    <th class="text-center">Tiêu đề phụ</th>
                    <th class="text-center col-1">Ảnh</th>
                    <th class="text-center col-1">Trạng thái bài viết</th>
                    <th class="text-center col-1"></th>
                </thead>
                <tbody>
                    <?php
                    foreach ($data

                        as $result) {
                        $id = $result['id'];
                        $title = $result['title'];
                        $subtitle = $result['subtitle'];
                        $image = $result['image'];
                        $status = $result['status'];
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $id; ?></td>
                            <td class="text-center"><?php echo $title; ?></td>
                            <td class="text-center"><?php echo $subtitle; ?></td>
                            <td>
                                <img src="<?php echo $image; ?>" style="height:10rem;width:10rem;border-radius:10px;">
                            </td>
                            <td class="text-center">
                                <?php if ($status == 0) {
                                    echo "Đang đợi duyệt";
                                } elseif ($status == 1) {
                                    echo "Đã đươợc duyệt";
                                } else {
                                    echo "Từ chối";
                                } ?>
                            </td>


                            <td class="text-center">
                                <?php if ($status == 0 ||  $status == 1) { ?>
                                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <button type="submit" name="delete" class="border-0">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($status == 0) { ?>
                                    <a href="<?php route(ROUTE_UPDATE_POST, ['id' => $id]); ?>">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                <?php } ?>
                            </td>




                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</div>