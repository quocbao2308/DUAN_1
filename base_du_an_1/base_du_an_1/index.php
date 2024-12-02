<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/GIoHangDonHangController.php';


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/taiKhoan.php';
require_once './admin/models/DanhMuc.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),
   'da-dat-hang' =>(new HomeController())->daDatHang(),
//    'search' =>(new HomeController())->timKiem(),
//    'lien-he' =>(new HomeController())->lienHe(),
//    'gioi-thieu' =>(new HomeController())->gioiThieu(),

    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'form-login'=> (new HomeController())->formLogin(),
    'check-login'=>(new HomeController())->postLogin(),
    'dm'=>(new HomeController())->danhmuc(),
    'logout' =>(new TaiKhoanController())->logout(),
    // Giỏ hàng ,đơn hàng
   'them-gio-hang' =>(new GioHangDonHangController())->addGioHang(),
   'gio-hang' =>(new GioHangDonHangController())->gioHang(),
   'thanh-toan' =>(new GioHangDonHangController())->thanhToan(),
   'xu-ly-thanh-toan' =>(new GioHangDonHangController())->postThanhToan(),
   'xoa-san-pham-gio-hang' =>(new GioHangDonHangController())->xoaSp(),

   'form-dang-ky' =>(new TaiKhoanController())->formDangKy(),
   'dang-ky' =>(new TaiKhoanController())->dangKy(),

   'quan-ly-tai-khoan' =>(new TaiKhoanController())->suaTaiKhoan(),
   'sua-thong-tin-ca-nhan' =>(new TaiKhoanController())->suaThongTinCaNhan(),
   'sua-mat-khau' =>(new TaiKhoanController())->suaMatKhau(),
   'sua-anh-tai-khoan' =>(new TaiKhoanController())->suaAnhTaiKhoan(),

   'quen-mat-khau' =>(new TaiKhoanController())->quenMatKhau(),
   'lay-mat-khau' =>(new TaiKhoanController())->layMatKhau(),
};