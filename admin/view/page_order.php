<h2 class="my-3"></h2>
<header>
        <h1>Quản Lý Đơn Hàng</h1>
        <input type="text" placeholder="Tìm kiếm đơn hàng...">
    </header>
    <div class="category-management">
    <table border="1">
        <thead>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Khách Hàng</th>
                <th>Ngày Đặt</th>
                <th>Địa Chỉ</th>
                <th>SĐT</th>
                <th>Mã Sản Phẩm</th>
                <th>Mã Giảm Giá</th>
               
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; 
            foreach ($orderList as $or): ?>
            <tr>
                <td><?=$i++?></td>
                <td><?= $or['ten_nguoiDung']?></td>
                <td><?= $or['ngay']?></td>
                <td><?= $or['diaChi']?></td>
                <td><?= $or['soDienthoai']?></td>
                <td><?= $or['ma_sanPham']?></td>
                <td><?= $or['ma_giamGia']?></td>
                
                <td><?= number_format($or['tongTien'])?></td>
                <td>
                <form method="POST">
                    <p>Trạng thái hiện tại: 
                        <strong class="status <?= $or['trangThai'] ?>">
                            <?= isset($statusnames[$or['trangThai']] )? $statusnames[$or['trangThai']]:$or['trangThai'] ?>
                        </strong>
                    </p>
                    <input type="hidden" name="ma_donHang" value="<?= $or['ma_donHang'] ?>">
                    <input type="hidden" name="currentStatus" value="<?= $or['trangThai'] ?>">
                    <?php if ($or['trangThai'] !== 'da-van-chuyen') { ?>
                        <button type="submit" name="updateStatus" class="btn">Cập nhật trạng thái </button>
                    <?php } else { ?>
                        <p>Đơn hàng đã hoàn thành.</p>
                    <?php } ?>
                </form>
                </td>
                <td>
                    <a href="?mod=page&act=orderdetail&id=<?=$or['ma_donHang']?>" class="btn">Chi Tiết</a>
                </td>
            </tr>
            <?php endforeach ?>
            <!-- Dòng khác -->
        </tbody>
    </table>
    </div>