<?php
class UserController
{
    public $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }

    // Hiển thị danh sách người dùng
    public function ListUser()
    {
        $users = $this->modelUser->getAll();
        require_once './views/Users/ListUser.php'; // Đảm bảo rằng file này tồn tại và không có lỗi
    }

    // Hiển thị form tạo người dùng mới
    public function Create()
    {
        require_once './views/Users/CreateUser.php';
    }

    // Xử lý tạo người dùng mới
    public function handleCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'] ?? null; // Nếu không có giá trị thì là null
            $dia_chi = $_POST['dia_chi'] ?? null; // Nếu không có giá trị thì là null
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $vai_tro = $_POST['vai_tro'] ?? 'user'; // Mặc định vai trò là user nếu không chọn gì
            $trang_thai = $_POST['trang_thai'];




            // Xử lý upload avatar
            $avatar = null;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    $avatar = $target_file;
                } else {
                    echo "Lỗi khi tải lên avatar.";
                }
            }

            // Kiểm tra dữ liệu
            $error = [];
            if (empty($ten_nguoi_dung)) $error['ten_nguoi_dung'] = 'Tên không được để trống.';
            if (empty($email)) $error['email'] = 'Email không được để trống.';
            if (empty($mat_khau)) $error['mat_khau'] = 'Mật khẩu không được để trống.';

            if (empty($error)) {
                // Gọi phương thức tạo người dùng với vai trò và avatar
                $this->modelUser->createUser(
                    $ten_nguoi_dung,
                    $email,
                    $mat_khau,
                    $ngay_sinh,
                    $gioi_tinh,
                    $avatar,
                    $trang_thai,
                    $sdt,
                    $dia_chi,
                    $vai_tro
                )
                ;

                header('Location: ?act=users');
            } else {
                $_SESSION['Error'] = $error;
                header('Location: ?act=create-user');
            }
        }
    }

    // Hiển thị form cập nhật thông tin người dùng
    public function ShowUpdate()
    {
        $id = $_GET['id'];
        $user = $this->modelUser->getUser($id);
        require_once './views/Users/UpdateUser.php';
    }

    // Xử lý cập nhật thông tin người dùng
    public function handleUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['user_id'];
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $trang_thai = $_POST['trang_thai'];
            $vai_tro = $_POST['vai_tro'] ?? 'user'; // Mặc định vai trò là user nếu không chọn gì

            // Xử lý avatar khi cập nhật
            $avatar = null;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    $avatar = $target_file;
                }
            } else {
                // Giữ avatar cũ nếu không cập nhật
                $user = $this->modelUser->getUser($id);
                $avatar = $user['avatar'];
            }

            // Cập nhật thông tin người dùng với vai trò và avatar
            $this->modelUser->updateUser($id, $ten_nguoi_dung, $email, $mat_khau, $ngay_sinh, $gioi_tinh, $avatar, $trang_thai, $vai_tro);
            var_dump($vai_tro);
            // die;
            header('Location: ?act=users');
        }
    }


    // Xử lý xóa người dùng
    public function handleDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $this->modelUser->deleteUser($id);
            header('Location: ?act=users');
        }
    }
}
