<?php

class DonHang
{
   public $conn;


   // kết nối csdl
   public function __construct()
   {
      $this->conn = connectDB();
   }
   //danh sách danh mục
   public function getAll()
   {
      try {
         $sql = 'SELECT  don_hangs.*, trang_thai_don_hangs.trang_thai FROM don_hangs
         INNER JOIN trang_thai_don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id 
        ';
         
         // $sql = 'SELECT * FROM don_hangs.*, ';

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   public function getAllTrangThaiDonHang()
   {
      try {
         // $sql = 'SELECT * FROM don_hangs.*, trang_thai_don_hangs.trang_thai FROM don_hangs
         // INNER JOIN trang_thai_don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id ';

         $sql = 'SELECT * FROM trang_thai_don_hangs ';

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }

   public function getDetailDonHang($id)
   {
      try {
         $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.trang_thai, nguoi_dungs.ten_nguoi_dung,nguoi_dungs.email,nguoi_dungs.sdt,
         phuong_thuc_thanh_toans.ten_phuong_thuc
         FROM don_hangs
         INNER JOIN trang_thai_don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id
         INNER JOIN nguoi_dungs on don_hangs.tai_khoan_id = nguoi_dungs.id
         INNER JOIN phuong_thuc_thanh_toans on don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
         Where don_hangs.id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([':id' => $id]);
         return $stmt->fetch();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   public function getlistSpDonHang($id)
   {
      try {
         $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham
         from chi_tiet_don_hangs
         inner join san_phams on chi_tiet_don_hangs.san_pham_id=san_phams.id
         Where don_hang_id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([':id' => $id]);
         return $stmt->fetchAll();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }


   public function updateDonHang($id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id) {
      try { 
            $sql ='UPDATE don_hangs SET 
            ten_nguoi_nhan =:ten_nguoi_nhan,
            sdt_nguoi_nhan = :sdt_nguoi_nhan,
            email_nguoi_nhan = :email_nguoi_nhan,
            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
            ghi_chu = :ghi_chu,
            trang_thai_id = :trang_thai_id
            where id =:id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
               ':ten_nguoi_nhan' => $ten_nguoi_nhan,
               ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
               ':email_nguoi_nhan' => $email_nguoi_nhan,
               ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
               ':ghi_chu' => $ghi_chu,
               ':trang_thai_id' => $trang_thai_id,
               ':id' => $id

            ]);
            return true;
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }

   public function getDetaildata($id)
   {
      try {
         $sql = 'SELECT * FROM don_hangs WHERE id = :id';

         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id', $id);
         $stmt->execute();

         return $stmt->fetch();
      } catch (PDOException $e) {
         echo 'lỗi:' . $e->getMessage();
      }
   }
   // cập nhật dữ liệu vào csdl
   public function updateData($id, $ma_don_hang, $ngay_dat, $trang_thai_don_hang, $hinh_thuc_thanh_toan, $trang_thai_thanh_toan)
   {
      try {
         $sql = 'UPDATE don_hangs SET ma_don_hang = :ma_don_hang,ngay_dat = :ngay_dat, trang_thai_don_hang = :trang_thai_don_hang,hinh_thuc_thanh_toan = :hinh_thuc_thanh_toan,trang_thai_thanh_toan = :trang_thai_thanh_toan WHERE id = :id';

         $stmt = $this->conn->prepare($sql);
         // GÁN GIÁ TRỊ VÀO CÁC THAM SỐ 
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':ma_don_hang', $ma_don_hang);
         $stmt->bindParam(':ngay_dat', $ngay_dat);
         $stmt->bindParam(':trang_thai_don_hang', $trang_thai_don_hang);
         $stmt->bindParam(':hinh_thuc_thanh_toan', $hinh_thuc_thanh_toan);
         $stmt->bindParam(':trang_thai_thanh_toan', $trang_thai_thanh_toan);
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
         $sql = 'DELETE FROM don_hangs WHERE id = :id';

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
