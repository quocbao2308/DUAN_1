<?php

class DanhMuc
{
    public $conn;


    // kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    //danh sách danh mục
    public function getAllDM()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi:' . $e->getMessage();
        }
    }
    //thêm dữ liệu mới vào csdl
    public function postData($ten_danh_muc, $trang_thai)
    {
        echo (1);
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc,trang_thai)
                  VALUE ( :ten_danh_muc, :trang_thai) ';

            $stmt = $this->conn->prepare($sql);
            // GÁN GIÁ TRỊ VÀO CÁC THAM SỐ 
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'lỗi:' . $e->getMessage();
        }
    }
    // lấy thông tin chi tiết 
    public function getDetaildata($id)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi:' . $e->getMessage();
        }
    }
    // cập nhật dữ liệu vào csdl
    public function updateData($id, $ten_danh_muc, $trang_thai)
    {
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc,trang_thai = :trang_thai WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            // GÁN GIÁ TRỊ VÀO CÁC THAM SỐ 
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'lỗi:' . $e->getMessage();
        }
    }
    //XÓA DỮ LIỆU TRONG CSDL
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'lỗi:' . $e->getMessage();
        }
    }
    // hủy kết nối 
    public function __destruct()
    {
        $this->conn = null;
    }
}
