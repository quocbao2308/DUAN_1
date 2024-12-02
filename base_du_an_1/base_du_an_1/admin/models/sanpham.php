<?php

class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả sản phẩm
    public function getAll()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                   FROM san_phams
                   INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm sản phẩm
    public function postData($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh){
        try{
            $sql = "INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh) VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':ten_san_pham' => $ten_san_pham,
                    ':gia_san_pham' => $gia_san_pham,
                    ':gia_khuyen_mai' => $gia_khuyen_mai,
                    ':so_luong' => $so_luong,
                    ':ngay_nhap' => $ngay_nhap,
                    ':danh_muc_id' => $danh_muc_id,
                    ':trang_thai' => $trang_thai,
                    ':mo_ta' => $mo_ta,
                    ':hinh_anh' => $hinh_anh

                ]
            );
            
            // Lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }



    // Lấy thông tin chi tiết
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật dữ liệu sản phẩm
    public function updateData($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $danh_muc_id, $ngay_nhap, $mo_ta, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'UPDATE san_phams 
                   SET ten_san_pham = :ten_san_pham,
                       gia_san_pham = :gia_san_pham,
                       gia_khuyen_mai = :gia_khuyen_mai,
                       so_luong = :so_luong,
                       danh_muc_id = :danh_muc_id,
                       ngay_nhap = :ngay_nhap,
                       mo_ta = :mo_ta,
                       trang_thai = :trang_thai,
                       hinh_anh = :hinh_anh
                   WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            

            $stmt->execute(         [
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
                ':id'=> $id

            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi khi cập nhật sản phẩm: ' . $e->getMessage();
        }
    }

    // Xóa dữ liệu sản phẩm
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    // Hủy kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}
