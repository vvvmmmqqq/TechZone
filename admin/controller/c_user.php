<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'user': //?mod=user&act=
            //Xử Lý
            require_once '../../Project1_Group-TechZone/model/user.php';
            $user = user_getAll();

            //Hiển thị
            include_once  "./view/layout/header.php";
            include_once  "./view/page_user.php";
            include_once  "./view/layout/footer.php";
            break;

        case 'edit': //?mod=user&act=
            require_once '../../Project1_Group-TechZone/model/pdo.php';
            require_once '../../Project1_Group-TechZone/model/user.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data['user'] = get_userById($_GET['id']); // Lấy thông tin người dùng để hiển thị trong form
            }

            if (isset($_POST['submit-edit'])) {
                print_r([
                    'id' => $_GET['id'],
                    'Ho_nguoiDung' => $_POST['Ho_nguoiDung'],
                    'Ten_nguoiDung' => $_POST['Ten_nguoiDung'],
                    'email_nguoiDung' => $_POST['email_nguoiDung'],
                    'sDt_nguoiDung' => $_POST['sDt_nguoiDung'],
                    'vaiTro' => $_POST['vaiTro'],
                    'trangThai' => $_POST['trang_Thai']
                ]);
                $kq = edit_user(
                    $_GET['id'],
                    $_POST['Ten_nguoiDung'],
                    $_POST['matKhau_nguoiDung'],
                    $_POST['email_nguoiDung'],
                    $_POST['sDt_nguoiDung'],
                    $_POST['vaiTro'],
                    $_POST['trang_Thai']
                );

                if ($kq) {
                    echo "Cập nhật thành công!";
                    header("");
                } else {
                    echo "Cập nhật thất bại!";
                }
            }



            include_once  "./view/layout/header.php";
            include_once  "./view/editUser.php";
            include_once  "./view/layout/footer.php";
            break;
        case 'delete': //?mod=user&act=
            //Xử Lý
            if (isset($_GET['id'])) {
                $kq = user_hide($_GET['id']);
                if ($kq) {
                    $thongbao = "Đã ẩn khách hàng [" . $_GET['id'] . "]thành công";
                    header("Location:?mod=user&act=user");
                } else {
                    $thongbao = "Đã có lỗi không mông muốn";
                };
            }
            //Hiển thị
            include_once  "./view/layout/header.php";
            include_once  "./view/page_user.php";
            include_once  "./view/layout/footer.php";
            break;
        default:

            break;
    }
}
