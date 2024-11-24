<?php
class User
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả người dùng
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM nguoi_dungs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Tạo người dùng mới
    public function createUser($ten_nguoi_dung, $email, $mat_khau, $ngay_sinh, $gioi_tinh, $avatar, $trang_thai, $sdt, $dia_chi, $vai_tro = 'user')
{
    try {
        $sql = "INSERT INTO nguoi_dungs (ten_nguoi_dung, email, mat_khau, ngay_sinh, gioi_tinh, avatar, trang_thai, sdt, dia_chi, vai_tro)
                VALUES (:ten_nguoi_dung, :email, :mat_khau, :ngay_sinh, :gioi_tinh, :avatar, :trang_thai, :sdt, :dia_chi, :vai_tro)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':trang_thai', $trang_thai);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':vai_tro', $vai_tro); // Thêm binding cho vai trò
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}

    
    

    // Lấy thông tin người dùng theo ID
    public function getUser($id)
    {
        try {
            $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật thông tin người dùng
    public function updateUser($id, $ten_nguoi_dung, $email, $mat_khau, $ngay_sinh, $gioi_tinh, $avatar, $trang_thai, $vai_tro)
{
    try {
        $sql = "UPDATE nguoi_dungs 
                SET ten_nguoi_dung = :ten_nguoi_dung, email = :email, mat_khau = :mat_khau, 
                    ngay_sinh = :ngay_sinh, gioi_tinh = :gioi_tinh, avatar = :avatar, trang_thai = :trang_thai, vai_tro = :vai_tro
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':trang_thai', $trang_thai);
        $stmt->bindParam(':vai_tro', $vai_tro); // Thêm binding cho vai trò
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}


    // Xóa người dùng
    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM nguoi_dungs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}
?>