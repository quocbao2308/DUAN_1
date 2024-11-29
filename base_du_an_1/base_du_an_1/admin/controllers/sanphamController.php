<?php
class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }

    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $sanphams = $this->modelSanPham->getAll();
        // var_dump($sanphams); die;

        require_once './views/sanpham/listsanpham.php';
    }

    // Hiển thị form thêm sản phẩm

    public function create()
    {
        $danhMucModel = new DanhMuc(); // Tạo đối tượng Model
        $listDanhMuc = $danhMucModel->getAll(); // Lấy danh sách danh mục
        $listDanhMuc = $this->modelDanhMuc->getAll();
        // echo (3);

        require_once './views/sanpham/createsanpham.php';
    }


    // Xử lý thêm sản phẩm vào cơ sở dữ liệu
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $hinh_anh = $_FILES['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            $luot_xem = $_POST['luot_xem'] ?? 0; 
            // Mặc định lượt xem là 0 nếu không có
            $danh_muc_id = $_POST['danh_muc_id'];
            // var_dump($danh_muc_id);
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];

            $trang_thai = $_POST['trang_thai'];

            // Xử lý upload ảnh
            try {
                $file_thumb = $this->uploadFile($_FILES['hinh_anh'], '../admin/uploads/avatars/');
            } catch (Exception $e) {
                // Ghi log lỗi hoặc hiển thị lỗi
                echo "Lỗi upload ảnh: " . $e->getMessage();
                exit();
            }
     $newPath = str_replace("../", "", $file_thumb);

            // Kiểm tra lỗi
            $errors = [];
            if (empty($ten_san_pham)) $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            if (empty($gia_san_pham)) $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            if (empty($danh_muc_id)) $errors['danh_muc_id'] = 'Danh mục sản phẩm không được để trống';
            if (empty($ngay_nhap)) $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';

            if (empty($errors)) {
                $this->modelSanPham->postData($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $newPath, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai);
                header('Location: index.php?act=san-phams');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: index.php?act=form-them-san-pham');
                exit();
            }
        }
    }

    // Hiển thị form sửa sản phẩm
    public function edit()
    {
        $id = $_GET['sanpham_id'];
        $sanpham = $this->modelSanPham->getDetailData($id);
        $listDanhMuc = $this->modelDanhMuc->getAll();
        require_once './views/sanpham/editsanpham.php';
    }

    // Cập nhật sản phẩm vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            // $hinh_anh = $_FILES['hinh_anh'];
            $so_luong = $_POST['so_luong'] ?? '';
            $luot_xem = $_POST['luot_xem'] ?? 0;
            $danh_muc_id = $_POST['danh_muc_id'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

            // Xử lý upload ảnh
            try {
                if ($_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
                    // Chỉ truyền phần tử file vào hàm uploadFile
                    $file_thumb = $this->uploadFile($_FILES['hinh_anh'], './uploads/avatars/');
                } else {
                    // Xử lý trường hợp file không được upload
                    $file_thumb = null; // Hoặc giữ giá trị cũ nếu không cần thay đổi ảnh
                }   

            } catch (Exception $e) {
                echo "Lỗi upload ảnh: " . $e->getMessage();
                exit();
            }


            // mảng hình ảnh
            // $img_array = $_FILES['img_array'];

            // Kiểm tra lỗi
            $errors = [];
            if (empty($ten_san_pham)) $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            if (empty($gia_san_pham)) $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            if (empty($danh_muc_id)) $errors['danh_muc_id'] = 'Danh mục sản phẩm không được để trống';
            if (empty($ngay_nhap)) $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';

            if (empty($errors)) {
                $this->modelSanPham->updateData(
                    $id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $danh_muc_id,
                    $ngay_nhap,
                    $mo_ta,
                    $trang_thai,
                    $file_thumb,
                );
                var_dump($_SERVER);
                // die;
                unset($_SESSION['errors']);
                header('Location: index.php?act=san-phams');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: index.php?act=form-sua-san-pham&sanpham_id=$id");
                exit();
            }
        }
    }


    // Xóa sản phẩm
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['sanpham_id'];
            $this->modelSanPham->deleteData($id);
            header('Location: index.php?act=san-phams');
            exit();
        }
    }

    function uploadFile($file, $uploadDir)
    {
        // Check for upload errors
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File upload error: " . $file['error']);
        }

        // Validate file type (e.g., only images are allowed)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif','image/jpg','image/webp'];
        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception("Invalid file type. Only JPEG, PNG, and GIF are allowed.");
        }

        // Validate file size (e.g., max 2MB)
        $maxFileSize = 6 * 1024 * 1024; // 2MB
        if ($file['size'] > $maxFileSize) {
            throw new Exception("File size exceeds the maximum limit of 2MB.");
        }

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
        }

        // Generate a unique filename to avoid overwriting
        $fileName = uniqid() . '-' . basename($file['name']);
        $targetPath = rtrim($uploadDir, '/') . '/' . $fileName;

        // Move the uploaded file
        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            throw new Exception("Failed to move uploaded file.");
        }

        // Return the path of the uploaded file
        return $targetPath;
    }
}
