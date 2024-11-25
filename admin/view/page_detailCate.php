<div class="category-management">
  <header>
    <h2>Danh mục <?=$category_id?></h2>
  </header>
  <div class="category-table">
    <table>
      <thead>
        <tr>
          <th>ID sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Giá</th>
          <th>Số lượng đã bán</th>
          <th>Số lượng sản phẩm</th>
          <th>Trạng Thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><?= $product['ma_sanPham']; ?></td>
              <td><?= $product['ten_sanPham']; ?></td>
              <td><?= number_format($product['gia_sanPham']); ?> VNĐ</td>
              <td><?= $product['ban']; ?></td>
              <td><?=$product["soLuong"];
              if($product["soLuong"] >= 100){
                $trangThai = " Hàng Tồn";
              } elseif($product['soLuong'] <= 100){
                $trangThai = " Sắp Hết";
              }else{
                $trangThai = "Hết Hàng";
              }
                ?></td>
              <td><?=$trangThai?></td>
              <td>
                <!-- <a href="?mod=detailCate&act=edit&product_id=<?= $product['id']; ?>">
                  <button class="edit-btn" id="edit-btn">Sửa</button>
                </a> -->
                <!-- <button class="delete-btn" id="delete-btn" onclick="deleteProduct(<?= $category_id; ?>)">Xóa</button> -->
                </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">Không có sản phẩm nào trong danh mục này.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
