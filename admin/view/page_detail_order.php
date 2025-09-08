<h2 class="">
    Chi tiết đơn <?=$order['ma_donHang']?>
    <?php switch ($order['trang_Thai']){
                        case 'gio-hang':
                         echo '<span class="badge text-bg-secondary">Chờ xác nhận</span>';
                        break;
                        case 'cho-van-chuyen':
                            echo '<span class="badge text-bg-secondary">Chờ vận chuyển</span>';
                           break;
                           case 'dang-van-chuyen':
                            echo '<span class="badge text-bg-secondary">Đã vận chuyển</span>';
                           break;
                           case 'da-van-chuyen':
                            echo '<span class="badge text-bg-secondary">Đã vận chuyển</span>';
                           break;
                    }
                    ?>
</h2>
<div class="">
  <div class="">
    <table class="" >
      <tbody>
        <tr>
          <th>Khách hàng</th>
          <td><?=$order['ten_nguoiDung']?></td>
        </tr>
        <tr>
          <th>Ngày đặt</th>
          <td><?=$order['ngay']?></td>   
        </tr>
        <tr>
          <th>Địa chỉ</th>
          <td><?=$order['diaChi']?></td>
        </tr>
        <tr>
          <th>SĐT</th>
          <td><?=$order['soDienthoai']?></td>
        </tr>
        <tr>
          <th>Mã sản phẩm </th>
          <td><?=$order['ma_sanPham']?></td>
        </tr>
        <tr>
          <th>Tổng tiền</th>
          <td><?=$order['tongTien']?></td>
        </tr>
        <tr>
          <th>Trạng thái</th>
          <td>
            <select name="" id="">
                <option value="gio-hang" <?=$order['trang_Thai'] == 'gio-hang' ?'selected':'' ?>>Gio hang</option>
                <option value="cho-van-chuyen" <?=$order['trang_Thai'] == 'cho-van-chuyen' ?'selected':'' ?>>Cho van chuyen</option>
                <option value="dang-van-chuyen"<?=$order['trang_Thai'] == 'dang-van-chuyen' ?'selected':'' ?>> dang van chuyen</option>
                <option value="da-van-chuyen" <?=$order['trang_Thai'] == 'da-van-chuyen' ?'selected':'' ?>>da van chuyen</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Hành động</th>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="">
    <table class="table">

      <thead>
        <tr>
                <th>Mã Chi Tiet Đơn Hàng</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Mã đơn hàng</th>
                <th>Mã sản phẩm</th>
                
        </tr>
      </thead>
      <tbody>
        <tr>
            <?php foreach ($orderDetail as $key): ?>
            <td><?=$key['ma_chiTietdonHang']?></td>
          <td><?=$key['soLuong']?></td>
          <td><?=$key['donGia']?></td>
          <td><?=$key['ma_donHang']?></td>
          <td><?=$key['ma_sanPham']?></td>
          <?php endforeach;?>
        </tr>
      </tbody>
    </table>
  </div>
</div>