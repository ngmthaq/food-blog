<?php

// Get data về
try {
    $db = new Database();
    $sql = "SELECT * FROM `posts` WHERE `status` = '0'";
    $data = $db->sql($sql)->get();
} catch (\Throwable $th) {
    consoleLog($th->getTrace());
    include("./templates/_500.php");
    die();
}

if (isset($_POST['done']) && isset($_POST['id'])) {
    $posId = $_POST['id'];
    try {
        $db = new Database();
        $sql = "UPDATE `posts` SET `status` = '1' WHERE `id` = '$posId'";
        $db->sql($sql)->execute();
        redirect(ROUTE_ADMIN);
    } catch (\Throwable $th) {
        consoleLog($th->getTrace());
        include("./templates/_500.php");
        die();
    }
}

if (isset($_POST['close']) && isset($_POST['id'])) {
    $posId = $_POST['id'];
    try {
        $db = new Database();
        $sql = "UPDATE `posts` SET `status` = '2' WHERE `id` = '$posId'";
        $db->sql($sql)->execute();
        redirect(ROUTE_ADMIN);
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
            <h1 class="pb-4">Duyệt bài viết </h1>
            <table id="datas" class="table table-bordered" style="width:100%">
                <thead style="color:black;">
                <th class="text-center col-1">ID bài viết</th>
                <th class="text-center col-3">Tên bài viết</th>
                <th class="text-center">Tiêu đề phụ</th>
                <th class="text-center col-1">Ảnh</th>
                <th class="text-center col-1">Duyệt bài</th>
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

                    <?php if ($status == 0) { ?>
                        <td class="text-center">
                            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" name="done" class="border-0">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </form>

                            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" name="close" class="border-0">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </form>
                        </td>
                    <?php } ?>
                </tr>


                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>