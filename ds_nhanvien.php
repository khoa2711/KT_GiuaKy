<?php
require_once("./Entities/employee.class.php");
include_once("header.php");

// Xử lý xóa nhân viên
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    NhanVien::delete_employee($id);
    header("Location: ds_nhanvien.php");
}

$employees = NhanVien::list_employee();
?>

<div class="employee-list">
    <table>
        <thead>
            <tr>
                <th>Mã NV</th>
                <th>Tên NV</th>
                <th>Giới tính</th>
                <th>Nơi sinh</th>
                <th>Mã phòng</th>
                <th>Lương</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <td><?php echo $employee["MA_NV"]; ?></td>
                    <td><?php echo $employee["TEN_NV"]; ?></td>
                    <td>
                        <?php if ($employee["PHAI"] == "NU") : ?>
                            <img src="image/Hinh_nu.png" alt="Nữ">
                        <?php elseif ($employee["PHAI"] == "NAM") : ?>
                            <img src="image/Hinh_nam.png" alt="Nam">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $employee["NOI_SINH"]; ?></td>
                    <td><?php echo $employee["MA_PHONG"]; ?></td>
                    <td><?php echo $employee["LUONG"]; ?></td>
                    <td>
                        <a href="edit_nhanvien.php?id=<?php echo $employee['MA_NV']; ?>">Sửa</a> |
                        <a href="ds_nhanvien.php?action=delete&id=<?php echo $employee['MA_NV']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once("footer.php"); ?>

<div>
    <li>
        <a href="/KT_GiuaKy/add_nhanvien.php">Thêm nhân viên</a>
    </li>
</div>
