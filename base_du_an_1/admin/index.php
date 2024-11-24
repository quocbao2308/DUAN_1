<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
// require_once 'controllers/AdminDonHangController.php';
require_once 'controllers/TrangThaiDonHangController.php';
require_once 'controllers/sanphamController.php';
require_once 'controllers/UserController.php';


// Require toàn bộ file Models

require_once 'models/DanhMuc.php';
// require_once 'models/AdmiDonHang.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/sanpham.php';      // quản lý sp 
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
  //quản lý sản phẩm
  'san-phams'           => (new sanphamController())->index(),
  'form-them-san-pham'  => (new sanphamController())->create(),
  'them-san-pham'       => (new sanphamController())->store(),
  'form-sua-san-pham'   => (new sanphamController())->edit(),
  'sua-san-pham'        => (new sanphamController())->update(),
  'xoa-san-pham'        => (new sanphamController())->destroy(),
  // Quản lý trạng thái đơn hàng
  'trang-thai-don-hang'   => (new TrangThaiDonHangController())->index(),
  'them-trang-thai'       => (new TrangThaiDonHangController())->create(),
  'xu-ly-them'            => (new TrangThaiDonHangController())->store(),
  'sua-trang-thai'        => (new TrangThaiDonHangController())->edit(),
  'xu-ly-sua-trang-thai'  => (new TrangThaiDonHangController)->update(),
  'xoa-trang-thai'        => (new TrangThaiDonHangController())->destroy(),
  ///Quản lý người dùng
  'users' => (new UserController())->ListUser(),  // Hiển thị danh sách người dùng
  'add-user' => (new UserController())->Create(),  // Hiển thị form tạo người dùng

  'handle-create-user' => (new UserController())->handleCreate(),  // Xử lý tạo người dùng
  'update-user' => (new UserController())->ShowUpdate(),  // Hiển thị form cập nhật người dùng
  'handle-update-user' => (new UserController())->handleUpdate(),  // Xử lý cập nhật người dùng
  'delete-user' => (new UserController())->handleDelete(),  // Xử lý xóa người dùng

};
