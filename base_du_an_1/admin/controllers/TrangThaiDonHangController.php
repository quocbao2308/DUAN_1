<?php
class TrangThaiDonHangController
{
    public $modelTrangThai;
    public function __construct()
    {
        $this->modelTrangThai = new  TrangThai();
    }
    public function index()
    {
        $trangThais = $this->modelTrangThai->getAllTrangThai();
        // var_dump($trangThais);
        require './views/trang_thai_don_hang/list_trang_thai.php';
    }
    public function create()
    {
        require_once './views/trang_thai_don_hang/add_trang_thai.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # lay ra du lieu
            $ten_trang_thai = $_POST['ten_trang_thai'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);
            // validate
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'Nhập tên trạng thái';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trang_thai';
            }
            // them du lieu
            if (empty($errors)) {
                # neu k co loi thi them du lieu
                // Them vao CSDL
                $this->modelTrangThai->postData($ten_trang_thai, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=trang-thai-don-hang');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=them-trang-thai');
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            var_dump($id);
            $this->modelTrangThai->deleteData($id);
            header('Location: ?act=trang-thai-don-hang');
            exit();
        }
    }
    public function edit()
    {

        $id = $_GET['id'];

        $trangThais = $this->modelTrangThai->getDetaiData($id);
        require_once './views/trang_thai_don_hang/update_trang_thai.php';
    }
    public function __destruct()
    {
        $this->modelTrangThai = null;
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # lay ra du lieu
            $id = $_POST['id'];
            $ten_trang_thai = $_POST['ten_trang_thai'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);
            // validate
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'Xin vui lòng nhập tên danh mục';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Xin vui lòng chọn trạng thái';
            }
            // them du lieu
            if (empty($errors)) {
                # neu k co loi thi them du lieu
                // Them vao CSDL
                $this->modelTrangThai->updateData($id, $ten_trang_thai, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=trang-thai-don-hang');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=sua-trang-thai');
            }
        }
    }
}
