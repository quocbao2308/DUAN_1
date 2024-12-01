<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/DonHangController.php';
// require_once 'controllers/LienHeController.php';
// require_once 'controllers/tintucController.php';
// require_once 'controllers/BannerController.php';
require_once 'controllers/TrangThaiController.php';
require_once 'controllers/sanphamController.php';
require_once 'controllers/UserController.php';

// require_once 'controllers/KhuyenMaiController.php';


// Require toàn bộ file Models

require_once 'models/DanhMuc.php';
require_once '../models/taiKhoan.php';
require_once 'models/DonHang.php';
// require_once 'models/user.php';
// require_once 'models/LienHe.php';
// require_once 'models/tintuc.php';
// require_once 'models/Banner.php';
require_once 'models/TrangThai.php';
require_once 'models/sanpham.php';      
require_once 'models/User.php';




// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
     // Dashboards
     '/'                   => (new DashboardController())->index(),

     // quản lý danh mục sp 
     'danh-mucs'           => (new DanhMucController())->index(),
     'form-them-danh-muc'  => (new DanhMucController())->create(),
     'them-danh-muc'       => (new DanhMucController())->store(),
     'form-sua-danh-muc'   => (new DanhMucController())->edit(),
     'sua-danh-muc'        => (new DanhMucController())->update(),
     'xoa-danh-muc'        => (new DanhMucController())->destroy(),

     ///Quản lý trạng thái
     'trang-thai'           => (new TrangThaiController())->index(),
     'form-add-trang-thai'  => (new TrangThaiController())->create(),
     'them-trang-thai'      => (new TrangThaiController())->store(),
     'form-update-trang-thai'      => (new TrangThaiController())->edit(),
     'sua-trang-thai'       => (new TrangThaiController())->update(),
     'xoa-trang-thai'       => (new TrangThaiController())->destroy(),
     //quản lý sản phẩm
     'san-phams'           => (new sanphamController())->index(),
     'form-them-san-pham'  => (new sanphamController())->create(),
     'them-san-pham'       => (new sanphamController())->store(),
     'form-sua-san-pham'   => (new sanphamController())->edit(),
     'sua-san-pham'        => (new sanphamController())->update(),
     'xoa-san-pham'        => (new sanphamController())->destroy(),
     
     //quản lý đơn hàng
     //        
     'don-hangs'           => (new DonHangController())->index(),
     'form-sua-don-hang'   => (new DonHangController())->editDonHang(),
     'sua-don-hang'        => (new DonHangController())->postEditDonHang(),
     'chi-tiet-don-hang' => (new DonHangController())->detailDonhang(),
     ///Quản lý người dùng
     'users' => (new UserController())->ListUser(),  // Hiển thị danh sách người dùng
     'add-user' => (new UserController())->Create(),  // Hiển thị form tạo người dùng
     'handle-create-user' => (new UserController())->handleCreate(),  // Xử lý tạo người dùng
     'update-user' => (new UserController())->ShowUpdate(),  // Hiển thị form cập nhật người dùng
     'handle-update-user' => (new UserController())->handleUpdate(),  // Xử lý cập nhật người dùng
     'delete-user' => (new UserController())->handleDelete(),  // Xử lý xóa người dùng
     // route auth
     'login-admin' =>(new UserController)->formLogin(),
     'check-login-admin' =>(new UserController)->login(),

     'logout-admin' =>(new UserController)->logout(),

};
