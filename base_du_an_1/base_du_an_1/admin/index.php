<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/DonHangController.php';
// require_once 'controllers/UserController.php';
// require_once 'controllers/LienHeController.php';
// require_once 'controllers/tintucController.php';
// require_once 'controllers/BannerController.php';
require_once 'controllers/TrangThaiController.php';
require_once 'controllers/sanphamController.php';
// require_once 'controllers/KhuyenMaiController.php';


// Require toàn bộ file Models

require_once 'models/DanhMuc.php';
require_once 'models/DonHang.php';
// require_once 'models/user.php';
// require_once 'models/LienHe.php';
// require_once 'models/tintuc.php';
// require_once 'models/Banner.php';
require_once 'models/TrangThai.php';
require_once 'models/sanpham.php';      // quản lý sp 
// require_once 'models/KhuyenMai.php';

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

     //     // Quản lý người dùng
     //     'users'               => (new UserController())->index(),
     //     'form-them-user'      => (new UserController())->create(),
     //     'them-user'           => (new UserController())->store(),
     //     'form-sua-user'       => (new UserController())->edit(),
     //     'sua-user'            => (new UserController())->update(),
     //     'xoa-user'            => (new UserController())->destroy(),

     //     'banners'               => (new BannerController())->index(),
     //     'form-them-banner'      => (new BannerController())->create(),
     //     'them-banner'           => (new BannerController())->store(),
     //     'form-sua-banner'       => (new BannerController())->edit(),
     //     'sua-banner'            => (new BannerController())->update(),
     //     'xoa-banner'            => (new BannerController())->destroy(),

     //      // Quản lý liên hệ
     //      'lien-hes'            => (new LienHeController())->index(),
     //      'form-them-lien-he'   => (new LienHeController())->create(),
     //      'them-lien-he'        => (new LienHeController())->store(),
     //      'form-sua-lien-he'    => (new LienHeController())->edit(),
     //      'sua-lien-he'         => (new LienHeController())->update(),
     //      'xoa-lien-he'         => (new LienHeController())->destroy(),
     // // Quản lý tin tức
     //      'tin-tucs'               => (new tintucController())->index(),
     //      'form-them-tin-tuc'      => (new tintucController())->create(),
     //      'them-tin-tuc'           => (new tintucController())->store(),
     //      'form-sua-tin-tuc'       => (new tintucController())->edit(),
     //      'sua-tin-tuc'            => (new tintucController())->update(),
     //      'xoa-tin-tuc'            => (new tintucController())->destroy(),
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
     //     // Quản lý khuyến mãi
     //     'khuyen-mais'               => (new KhuyenMaiController())->index(),
     //     'form-them-khuyen-mai'      => (new KhuyenMaiController())->create(),
     //     'them-khuyen-mai'           => (new KhuyenMaiController())->store(),
     //     'form-sua-khuyen-mai'       => (new KhuyenMaiController())->edit(),
     //     'sua-khuyen-mai'            => (new KhuyenMaiController())->update(),
     //     'xoa-khuyen-mai'            => (new KhuyenMaiController())->destroy(),
     //     //     //quản lý đơn hàng
     //        
     'don-hangs'           => (new DonHangController())->index(),
     'form-sua-don-hang'   => (new DonHangController())->editDonHang(),
     'sua-don-hang'        => (new DonHangController())->postEditDonHang(),
     'chi-tiet-don-hang' => (new DonHangController())->detailDonhang(),
};
