<?php
require_once("./Entities/employee.class.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $employee = NhanVien::list_employee()[$id];
}
?>

<?php include_once("header.php"); ?>

<form method="post">
    <h2>Chỉnh sửa thông tin nhân viên</h2>

    <div class="row">
        <div class="lbLtitle">
            <label>Tên nhân viên</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtName" value="<?php echo $employee["TEN_NV"]; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Giới tính</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtPHAI" value="<?php echo $employee["PHAI"]; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Nơi sinh</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtNOI_SINH" value="<?php echo $employee["NOI_SINH"]; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Mã phòng</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtMA_PHONG" value="<?php echo $employee["MA_PHONG"]; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbLtitle">
            <label>Lương</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtLUONG" value="<?php echo $employee["LUONG"]; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Lưu chỉnh sửa">
        </div>
    </div>

</form>

<?php include_once("footer.php"); ?>
