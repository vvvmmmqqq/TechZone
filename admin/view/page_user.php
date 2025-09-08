<h2>Danh sách người dùng</h2>
<br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Vai trò</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    <?php $i=1; 
    foreach ($user as $us): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $us['Ten_nguoiDung'] ?></td>
            <td><?= $us['email_nguoiDung'] ?></td>
            <td><?= $us['sDt_nguoiDung'] ?></td>
            <td><?= $us['vaiTro'] == 1 ? 'Admin' : 'User' ?></td>
            <td><?= $us['trang_Thai'] == 0 ? 'Bình thường' : 'Bị ẩn' ?></td>
            <td>
                <a href="?mod=user&act=edit&id=<?= $us['ma_nguoiDung'] ?>">Sửa</a> |
                <?php if ($us['trang_Thai'] == 0): ?>
                    <a href="?mod=user&act=hide&id=<?= $us['ma_nguoiDung'] ?>" 
                       onclick="return confirm('Bạn có chắc chắn muốn ẩn người dùng này?')">Ẩn</a>
                <?php else: ?>
                    <span>Đã ẩn</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
