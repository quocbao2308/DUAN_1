<?php

 class DonHang
 {
    public $conn;


    // kết nối csdl
    public function __construct()
    {
        $this -> conn = connectDB();
    }
    //danh sách danh mục
    public function getAll() {
         try {
            $sql = 'SELECT * FROM don_hangs ';

            $stmt= $this->conn->prepare($sql);

            $stmt ->execute();

            return $stmt->fetchAll();
         }
         catch (PDOException $e) {
            echo 'lỗi:' . $e->getMessage();
         }
         
    }
    //thêm dữ liệu mới vào csdl
    public function postData($ma_don_hang,$ngay_dat,$trang_thai_don_hang,$hinh_thuc_thanh_toan,$trang_thai_thanh_toan) {
      try {
         $sql = 'INSERT INTO don_hangs (ma_don_hang,ngay_dat,trang_thai_don_hang,hinh_thuc_thanh_toan,trang_thai_thanh_toan)
                  VALUE ( :ma_don_hang,:ngay_dat,:trang_thai_don_hang,:hinh_thuc_thanh_toan,:trang_thai_thanh_toan) ';

         $stmt= $this->conn->prepare($sql);
         // GÁN GIÁ TRỊ VÀO CÁC THAM SỐ 
         $stmt ->bindParam(':ma_don_hang',$ma_don_hang);
         $stmt ->bindParam(':ngay_dat',$ngay_dat);
         $stmt ->bindParam(':trang_thai_don_hang',$trang_thai_don_hang);
         $stmt ->bindParam(':hinh_thuc_thanh_toan',$hinh_thuc_thanh_toan);
         $stmt ->bindParam(':trang_thai_thanh_toan',$trang_thai_thanh_toan);
         $stmt ->execute();

         return true;
      }
      catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   // lấy thông tin chi tiết 
   public function getDetaildata($id) {
      try {
         $sql = 'SELECT * FROM don_hangs WHERE id = :id';
   
         $stmt= $this->conn->prepare($sql);
         $stmt ->bindParam(':id', $id);
         $stmt ->execute();
   
         return $stmt->fetch();
      }
      catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }      
} 
// cập nhật dữ liệu vào csdl
public function updateData($id,$ma_don_hang,$ngay_dat,$trang_thai_don_hang,$hinh_thuc_thanh_toan,$trang_thai_thanh_toan) {
      try {
         $sql = 'UPDATE don_hangs SET ma_don_hang = :ma_don_hang,ngay_dat = :ngay_dat, trang_thai_don_hang = :trang_thai_don_hang,hinh_thuc_thanh_toan = :hinh_thuc_thanh_toan,trang_thai_thanh_toan = :trang_thai_thanh_toan WHERE id = :id';
               
         $stmt= $this->conn->prepare($sql);
         // GÁN GIÁ TRỊ VÀO CÁC THAM SỐ 
         $stmt ->bindParam(':id',$id);
         $stmt ->bindParam(':ma_don_hang',$ma_don_hang);
         $stmt ->bindParam(':ngay_dat',$ngay_dat);
         $stmt ->bindParam(':trang_thai_don_hang',$trang_thai_don_hang);
         $stmt ->bindParam(':hinh_thuc_thanh_toan',$hinh_thuc_thanh_toan);
         $stmt ->bindParam(':trang_thai_thanh_toan',$trang_thai_thanh_toan);
         $stmt ->execute();

         return true;
      }
      catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   //XÓA DỮ LIỆU TRONG CSDL
 public function deleteData($id) {
   try {
      $sql = 'DELETE FROM don_hangs WHERE id = :id';

      $stmt= $this->conn->prepare($sql);
      $stmt ->bindParam(':id', $id);
      $stmt ->execute();

      return true;
   }
   catch (PDOException $e) {
      echo 'lỗi:' . $e->getMessage();
   }
   
   }
    // hủy kết nối 
    public function __destruct()
    {
        $this -> conn = null;
    }
 }