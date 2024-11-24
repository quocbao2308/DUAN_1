<?php
class DanhMucController
{
    // kết nổi đến file model
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();  // khởi tạo đối tượng modelDanhMuc để sử dụng trong các hàm khác
    }
    // hàm hiển thị danh sách
    public function index()
    {
        // lấy ra dữ liệu danh mục
        $danhMucs = $this->modelDanhMuc->getAll();
        //  var_dump($danhMucs);

        // đưa dữ liệu ra view
        require_once './views/danhmuc/listDanhMuc.php';
    }
    // hàm hiển thị thêm
    public function create()
    {

        require_once './views/danhmuc/createdanhMuc.php';
    }
    // hàm thêm vào csdl
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            //  validate

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }
            //thêm dữ liệu

            if (empty($errors)) {
                // nếu không có lỗi thì thêm dữ liệu
                // thêm vào csdl
                $this->modelDanhMuc->postData($ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: index.php?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: index.php?act=form-them-danh-muc');
                exit();
            }
        }
    }
    // hàm hiển thị sửa
    public function edit()
    {
        //lấy id 
        $id = $_GET['DanhMuc_id'];

        // lấy thông tin chi tiết của danh mục
        $danhMuc = $this->modelDanhMuc->getDetaildata($id);

        //đổ dữ liệu ra form
        require_once './views/danhmuc/editdanhMuc.php';
    }
    // hàm cập nhật dữ liệu vào csdl
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            //  validate

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }
            //thêm dữ liệu

            if (empty($errors)) {
                // nếu không có lỗi thì thêm dữ liệu
                // thêm vào csdl
                $this->modelDanhMuc->updateData($id, $ten_danh_muc, $trang_thai);
                // Debugging
                var_dump($_POST);
                unset($_SESSION['errors']);
                header('Location: index.php?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: index.php?act=form-sua-danh-muc');
                exit();
            }
        }
    }
    // hàm xóa dữ liệu trong csdl
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['DanhMuc_id'];

            //xóa danh mục
            $this->modelDanhMuc->deleteData($id);
            header('Location: index.php?act=danh-mucs');
            exit();
        }
    }
}
