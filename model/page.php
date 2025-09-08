<?php
function order_getAll(){
    $sql = "SELECT dh.*, nd.ten_nguoiDung FROM donhang dh INNER JOIN nguoidung nd ON 
    dh.ma_nguoiDung=nd.ma_nguoiDung ORDER BY dh.ngay DESC" ;
    return pdo_getAll($sql); 
}
    function order_getById($ma_donHang){
        $sql="SELECT dh.*, nd.ten_nguoiDung FROM donhang dh INNER JOIN nguoidung nd ON dh.ma_nguoiDung = nd.ma_nguoiDung 
        WHERE  dh.ma_donHang = ?";
        return pdo_getOne($sql,$ma_donHang);
    }
    function order_getdetailById($ma_donHang){
        $sql="SELECT * FROM chitietdonhang ct INNER JOIN sanpham sp ON ct.ma_sanPham=sp.ma_sanPham 
        WHERE ct.ma_donHang=?";
        return pdo_getAll($sql,$ma_donHang);
    }

    function edit_order($ma_donHang, $tongTien,$ngay, $diaChi, $soDienthoai, $ma_nguoiDung, $ma_sanPham,$ma_giamGia, $trang_Thai, $ma_danhMuc){
        $conn = pdo_connect();
        $sql = "UPDATE donhang SET 
            `ngay`=:ngay, 
            `tongTien`=:tongTien, 
            `diaChi`=:diaChi, 
            `soDienthoai`=:soDienthoai, 
            `ma_nguoiDung`=:ma_nguoiDung, 
            `ma_sanPham`=:ma_sanPham,
            `ma_giamGia`=:ma_giamGia, 
            `trang_Thai`=:trang_Thai, 
            `ma_danhMuc`=:ma_danhMuc 
            WHERE `ma_donHang`=:ma_donHang";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":ma_donHang", $ma_donHang);
            $stmt->bindParam(":ngay", $ngay);
            $stmt->bindParam(":tongTien", $tongTien);
            $stmt->bindParam(":diaChi", $diaChi);
            $stmt->bindParam(":soDienthoai", $soDienthoai);
            $stmt->bindParam(":ma_nguoiDung", $ma_nguoiDung);
            $stmt->bindParam(":ma_sanPham", $ma_sanPham);
            $stmt->bindParam(":ma_giamGia", $ma_giamGia);
            $stmt->bindParam(":trang_Thai", $trang_Thai);
            $stmt->execute(); // Thực thi lệnh SQL
            return true;
        } catch (PDOException $e) {
            echo "Lỗi cập nhật sản phẩm: " . $e->getMessage();
            return false;
        }
    }
