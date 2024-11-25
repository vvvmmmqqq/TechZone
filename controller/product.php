<?php
if (isset($_GET['action'])) {
    include_once "view/header.php";
    switch ($_GET['action']) {
        case 'login':
            include_once "view/login.php";
            break;
        case 'register':
            include_once "view/register.php";
            break;
        case 'cart':
            include_once "view/cart.php";
            break;
        case 'post':
            include_once "view/post.php";
            break;
        case 'detail':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // function get detail
                // $product_detail=["id" => 1, "name"=>"sản phẩm 1", "price" => "12000000"];
            } else {
                $id = 0;
            }
            include_once "view/detail.php";
            break;
        case 'category':
            include_once "view/category.php";
            break;
        default:
            break;
    }
    include_once "view/footer.php";
} else {
    header('Location: index.php');
}
