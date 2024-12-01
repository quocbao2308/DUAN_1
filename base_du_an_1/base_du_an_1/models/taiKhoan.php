<?php

class TaiKhoan
{


    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
         
        
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['vai_tro'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    }else{
                        return "tài khoản bị cấm";
                    }
                } else{
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else{
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (\Exception $e) {
            echo "lỗi" .$e->getMessage();
            return false;
        }
    }

    public function getTaiKhoanFromEmail($email){
        try{
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [':email' => $email]
            );
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    
    public function insertTaiKhoan($ho_ten, $ngay_sinh,$email,$so_dien_thoai,$gioi_tinh,$dia_chi,$mat_khau,$chuc_vu_id,$anh_dai_dien)
    {
        try {
            $sql = "INSERT INTO nguoi_dungs (ho_ten,ngay_sinh,email,so_dien_thoai,gioi_tinh,dia_chi,mat_khau,chuc_vu_id,avatar) VALUES (:ho_ten, :ngay_sinh,:email,:so_dien_thoai,:gioi_tinh,:dia_chi,:mat_khau,:chuc_vu_id,:anh_dai_dien)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':ho_ten' => $ho_ten,
                    ':ngay_sinh' => $ngay_sinh,
                    ':email' =>$email,
                    ':so_dien_thoai' =>$so_dien_thoai,
                    ':gioi_tinh' =>$gioi_tinh,
                    ':dia_chi' =>$dia_chi,
                    ':mat_khau' =>$mat_khau,
                    ':chuc_vu_id' =>$chuc_vu_id,
                    ':avatar' =>$anh_dai_dien,
                ]
            );
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function thongTinTaiKhoan($id){
        try{
            $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [':id' => $id]
            );
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function updateTaiKhoan($id,$ho_ten,$email,$so_dien_thoai,$dia_chi){

        try{
            $sql = "UPDATE nguoi_dungs 
                    SET 
                    ho_ten = :ho_ten,
                    email = :email,
                    so_dien_thoai = :so_dien_thoai,
                    dia_chi = :dia_chi
                    WHERE id = :id

                                        ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':dia_chi' => $dia_chi,
                    ':id' => $id
                ]
            );
            
            // Lấy id sản phẩm vừa thêm
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }



    public function updateMatKhau($id,$mat_khau){

        try{
            $sql = "UPDATE nguoi_dungs 
                    SET 
                    mat_khau = :mat_khau
                
                    WHERE id = :id

                                        ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':mat_khau' => $mat_khau,
           
                    ':id' => $id
                ]
            );
            
            // Lấy id sản phẩm vừa thêm
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }



    
    public function updateAnhDaiDien($id,$anh_dai_dien){

        try{
            $sql = "UPDATE nguoi_dungs 
                    SET 
                    avatar = :anh_dai_dien
                  
                    WHERE id = :id

                                        ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':anh_dai_dien' => $anh_dai_dien,
                    ':id' => $id
                ]
            );
            
            // Lấy id sản phẩm vừa thêm
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }


    public function checkEmail($email){
        try{
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute([
                ':email' =>$email,
        
            ]);
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function binhLuan($tai_khoan_id,$san_pham_id,$noi_dung,$ngay_dang){
        try {
            $sql = "INSERT INTO binh_luans (tai_khoan_id,san_pham_id,noi_dung,ngay_dang) VALUES (:tai_khoan_id, :san_pham_id,:noi_dung,:ngay_dang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':tai_khoan_id' => $tai_khoan_id,
                    ':san_pham_id' => $san_pham_id,
                    ':noi_dung' =>$noi_dung,
                    ':ngay_dang' =>$ngay_dang,

                ]
            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
