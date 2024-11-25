<?php 
//Lấy tất cả sản phẩm
// function get_product($madm=0,$start=0,$limit=0){
//     global $conn;
//     $sql = "SELECT s.*, d.tendm FROM sanpham s INNER JOIN danhmuc";
//     if($madm!=0){
//         $sql .= " WHERE s.madm =".$madm;
//     }
//     if($limit!=0){
//         $sql .= "LIMIT".$start.",".$limit;
//     }
//     // $conn = pdo_get_connection();
//     $stmt = $conn->prepare($sql);
//     $stmt -> execute();
//     return $stmt->fetchAll(); 
// }
// hiển thị sản phẩm đã xem
function get_viewproduct($limit){
    global $conn;
    $sql = "SELECT * FROM sanphamdaxem ORDER BY id DESC LIMIT $limit";
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll(); 
}
?>