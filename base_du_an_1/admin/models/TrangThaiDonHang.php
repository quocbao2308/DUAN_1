<?php
class TrangThai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTrangThai()
    {
        try {
            //code...
            $sql = 'SELECT * FROM trang_thai_don_hang';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
    public function postData($ten_trang_thai, $trang_thai)
    {
        try {


            //code...
            $sql = 'INSERT INTO trang_thai_don_hang (ten_trang_thai, trang_thai)
                        VALUES (:ten_trang_thai, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            // Gan gtri vao cac tham so
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
    public function getDetaiData($id)
    {
        try {
            //code...
            $sql = 'SELECT *  FROM trang_thai_don_hang WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return  $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
    public function updateData($id, $ten_trang_thai, $trang_thai)
    {
        try {
            //code...
            $sql = 'UPDATE trang_thai_don_hang SET ten_trang_thai= :ten_trang_thai,trang_thai= :trang_thai WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            // Gan gtri vao cac tham so
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
    public function deleteData($id)
    {
        try {
            //code...
            $sql = 'DELETE  FROM trang_thai_don_hang WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
}
