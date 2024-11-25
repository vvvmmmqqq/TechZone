<?php
if(isset($_GET['act'])) {
switch ($_GET['act']) {
    case 'chart':
        include_once 'view/layout/header.php';
        include_once '/xampp/htdocs/Project1_Group-TechZone/admin/view/page_chart.php';
        include_once 'view/layout/footer.php';
        break;
    default:
        # code...
        break;
}
}else{
    header("Location: ?mod=page&act=home");
}