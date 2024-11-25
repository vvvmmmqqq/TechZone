<?php
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_base.php';
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_blog.php';
$c_Blog = new m_Blog();
if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'blog':
        include_once 'view/layout/header.php';
        include_once '/xampp/htdocs/Project1_Group-TechZone/admin/view/page_blog.php';
        include_once 'view/layout/footer.php';
        break;
        case 'addBlog':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $tieuDe = $_POST['tieuDe'];
                $ma_baiViet = $_POST['ma_baiViet'];
                $c_Blog->addBlog($tieuDe, $ma_baiViet);
            break;
            }
    case 'deleteBlog':
        if (isset($_GET['ma_baiViet'])) {
            $ma_baiViet = $_GET['ma_baiViet'];
        $c_Blog->deleteBlog($ma_baiViet);
        header("Location: ?mod=blog&act=blog");
        }else{
            echo "Không có mã danh mục để xóa!";
        }
        break;
    default:
        # code...
        break;
}
}else{
    header("Location: ?mod=page&act=home");
}