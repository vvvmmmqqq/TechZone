<?php
if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'user': //?mod=user&act=user
        //Xử Lý
        //Hiển thị
        include_once  "../admin/view/layout/header.php";
        include_once  "../admin/view/page_user.php";
        include_once  "../admin/view/layout/footer.php";
        break;
    }
}