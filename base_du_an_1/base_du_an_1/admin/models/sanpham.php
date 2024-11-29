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
    public function postData($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai)
    {

        try {
            $sql = 'INSERT INTO san_phams (ten_san_pham,gia_san_pham,gia_khuyen_mai,hinh_anh,so_luong,luot_xem,ngay_nhap,mo_ta,danh_muc_id,trang_thai)
                   VALUES (:ten_san_pham,:gia_san_pham,:gia_khuyen_mai,:hinh_anh,:so_luong,:luot_xem,:ngay_nhap,:mo_ta,:danh_muc_id,:trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':gia_san_pham', $gia_san_pham);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':luot_xem', $luot_xem);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            // var_dump($danh_muc_id);die;
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
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
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':gia_san_pham', $gia_san_pham);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':hinh_anh', $hinh_anh);

            $stmt->execute();
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
