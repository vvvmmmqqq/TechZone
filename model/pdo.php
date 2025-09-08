<?php
// Kết nối đến CSDL sử dụng PDO

function pdo_connect(){
    $servername="localhost:3308";
    $database="techzone demo";
    $username="root";
    $password="";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e) {
        echo "Kết nối CSDL thất bại: " . $e->getMessage();
    }
}
/**
 * Chạy câu lệnh sql để (INSERT, UPDATE, DELETE)
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 */
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        return $stmt->execute($sql_args);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Chạy câu lệnh sql SELECT
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_getAll($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Chạy lệnh sql để lấy 1 record
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 */
function pdo_getOne($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Chạy câu lệnh sql truy vấn 1 giá trị
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 */
function pdo_getValue($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
function get_danhmuc() {
    $conn = pdo_connect();
    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function get_thuongHieu() {
    $conn = pdo_connect();
    $sql = "SELECT * FROM thuonghieu ORDER BY ten_thuongHieu";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function updateStatus($ma_donHang, $currentStatus) {
    // Chuyển trạng thái dựa trên trạng thái hiện tại
    $nextStatus = null;
    switch ($currentStatus) {
        case 'gio-hang':
            $nextStatus = 'cho-van-chuyen';
            break;
        case 'cho-van-chuyen':
            $nextStatus = 'dang-van-chuyen';
            break;
        case 'dang-van-chuyen':
            $nextStatus = 'da-van-chuyen';
            break;
        case 'da-van-chuyen':
            // Trạng thái cuối cùng, không thể cập nhật
            return false;
    }

    if ($nextStatus) {
        $sql = "UPDATE donhang SET trangThai = ? WHERE ma_donHang = ?";
        return pdo_execute($sql, $nextStatus, $ma_donHang);
    }

    return false;
}
