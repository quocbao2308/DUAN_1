<?php

// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
function formatPrice($price)
{
    return number_format($price, 0, '.', '.');
}
function ListDM()
{
    $listDanhMuc = (new DanhMuc)->getAllDM();
    return $listDanhMuc;
}
function deleteSessionError()
{
    // Ensure session is started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the flash message is set and then unset it
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        session_unset();
    }

}
    function uploadFile($file, $folderUpload)
    {
        $pathStorage = $folderUpload .  time() . $file['name'];

        $from = $file['tmp_name'];
        $to = PATH_ROOT . $pathStorage;

        if (move_uploaded_file($from, $to)) {
            return $pathStorage;
        }
        return null;
    }
    function deleteFile($file)
    {
        $pathDelete = PATH_ROOT . $file;
        if (file_exists($pathDelete)) {
            unlink($pathDelete);
        }
    }
    
    function checkLoginAdmin()
    {
        if (!isset($_SESSION['user_admin'])) {
            require_once './views/auth/formLogin.php';
            exit();
        }
    }

    function deleteSessionErrors(){
        if(isset($_SESSION['flash'])){
            // Hủy session sau khi load trang
            unset($_SESSION['flash']);
            unset($_SESSION['errors']);
            unset($_SESSION['thongBao']);
            unset($_SESSION['old_data']);
            unset($_SESSION['successMk']);
            unset($_SESSION['successTt']);
            unset($_SESSION['successAnh']);
            unset($_SESSION['errorsKH']);
            unset($_SESSION['tong']);
            unset($_SESSION['layMk']);
            unset( $_SESSION['dat_hang_thanh_cong']);
        }
    }

