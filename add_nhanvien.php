<?php
require_once("./entities/employee.class.php");

if (isset($_POST["btnsubmit"])) {
    $MA_NV = $_POST["txtMANV"];
    $TEN_NV = $_POST["txtName"];
    $PHAI = $_POST["txtPHAI"];
    $NOI_SINH = $_POST["txtNOI_SINH"];
    $MA_PHONG = $_POST["txtMA_PHONG"];
    $LUONG = $_POST["txtLUONG"];

    $newEmployee = new NhanVien($MA_NV, $TEN_NV, $PHAI, $NOI_SINH, $MA_PHONG, $LUONG);
    $result = $newEmployee->save();

    if (!$result) {
        header("Location: ds_nhanvien.php?failure");
    } else {
        header("Location: ds_nhanvien.php?inserted");
    }
}

if (isset($_GET["inserted"])) {
    echo "<h2>Thêm nhân viên thành công</h2>";
}

include_once("header.php");
?>

<form method="post">
    <h2>Nhập thông tin nhân viên</h2>
    <div class="row">
        <div class="lbLtitle">
            <label>Mã nhân viên</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtMANV" value="<?php echo isset($_POST["txtMANV"]) ? $_POST["txtMANV"] : ""; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbLtitle">
            <label>Tên nhân viên</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Giới tính</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtPHAI" value="<?php echo isset($_POST["txtPHAI"]) ? $_POST["txtPHAI"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Nơi sinh</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtNOI_SINH" value="<?php echo isset($_POST["txtNOI_SINH"]) ? $_POST["txtNOI_SINH"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Mã phòng</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtMA_PHONG" value="<?php echo isset($_POST["txtMA_PHONG"]) ? $_POST["txtMA_PHONG"] : ""; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbLtitle">
            <label>Lương</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtLUONG" value="<?php echo isset($_POST["txtLUONG"]) ? $_POST["txtLUONG"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm nhân viên">
        </div>
    </div>

</form>
<div>
    <li>
        <a href="/KT_GiuaKy/ds_nhanvien.php">Danh sách nhân viên</a>
    </li>
</div>

<?php
include_once("footer.php");
?>
