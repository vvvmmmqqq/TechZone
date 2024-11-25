<?php
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_base.php';
require_once '/xampp/htdocs/Project1_Group-TechZone/model/m_cate.php';
$c_Category = new m_Category();
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'cate':
            include_once "view/layout/header.php";
            include_once "/xampp/htdocs/Project1_Group-TechZone/admin/view/page_cate.php";
            include_once "view/layout/footer.php";
            break;

        case 'addCate':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $ten_danhMuc = $_POST['ten_danhMuc'];
                    $ma_danhMuc = $_POST['ma_danhMuc'];
                    $c_Category->addCategory($ten_danhMuc, $ma_danhMuc);
                break;
                }
        case 'deleteCate':
            if (isset($_GET['ma_danhMuc'])) {
                $ma_danhMuc = $_GET['ma_danhMuc'];
            $c_Category->deleteCategory($ma_danhMuc);
            header("Location: ?mod=cate&act=cate");
            }else{
                echo "Không có mã danh mục để xóa!";
            }
            break;
        case 'searchCate':
            $searchResults = [];
            $keyword = $_GET['search'] ?? '';
            $column = $_GET['column'] ?? 'ten_danhMuc';
            $c_Category->searchCategory($keyword, $column);
            include_once "/xampp/htdocs/Project1_Group-TechZone/admin/view/page_cate.php";
            break;
        default:
            break;
    }
} else {
    header("Location: ?mod=page&act=home");
}
