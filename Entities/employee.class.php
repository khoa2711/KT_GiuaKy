<?php
require_once("./config/db.class.php");

class NhanVien {
    public $MA_NV;
    public $TEN_NV;
    public $PHAI;
    public $NOI_SINH;
    public $MA_PHONG;
    public $LUONG;

    public function __construct($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $this->MA_NV = $ma_nv;
        $this->TEN_NV = $ten_nv;
        $this->PHAI = $phai;
        $this->NOI_SINH = $noi_sinh;
        $this->MA_PHONG = $ma_phong;
        $this->LUONG = $luong;
    }

    // Hàm này để lưu thông tin nhân viên vào cơ sở dữ liệu
    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO nhanvien(MA_NV, TEN_NV, PHAI, NOI_SINH, MA_PHONG, LUONG) VALUES ('$this->MA_NV', '$this->TEN_NV', '$this->PHAI', '$this->NOI_SINH', '$this->MA_PHONG', '$this->LUONG')";
        $result = $db->query_execute($sql);
        return $result;
    }

    // Hàm này để lấy danh sách nhân viên từ cơ sở dữ liệu
    public static function list_employee()
    {
        $db = new Db();
        $sql = "SELECT MA_NV, TEN_NV, PHAI, NOI_SINH, MA_PHONG, LUONG FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Hàm này để xóa nhân viên từ cơ sở dữ liệu
    public static function delete_employee($id)
    {
        $db = new Db();
        $sql = "DELETE FROM nhanvien WHERE MA_NV = '$id'";
        $result = $db->query_execute($sql);
        return $result;
    }

    // Hàm này để sửa thông tin nhân viên trong cơ sở dữ liệu
    public static function update_employee($id, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $db = new Db();
        $sql = "UPDATE nhanvien SET TEN_NV = '$ten_nv', PHAI = '$phai', NOI_SINH = '$noi_sinh', MA_PHONG = '$ma_phong', LUONG = '$luong' WHERE MA_NV = '$id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>
