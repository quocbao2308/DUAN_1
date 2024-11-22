<?php
 class DonHangController
 {
    // kết nổi đến file model
    public $modelDonHang;
      
    public function __construct() {
       $this->modelDonHang = new DonHang();  // khởi tạo đối tượng modelDonHang để sử dụng trong các hàm khác
    }
    // hàm hiển thị danh sách
    public function index(){
      // lấy ra dữ liệu danh mục
       $donhangs = $this->modelDonHang->getAll();
      //  var_dump($danhMucs);

      // đưa dữ liệu ra view
      require_once './views/donhang/listdonHang.php';
    }
    // hàm hiển thị thêm
    public function create(){
      require_once './views/donhang/createdonHang.php';
    }
    // hàm thêm vào csdl
    public function store(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // lấy ra dữ liệu
        $ma_don_hang = $_POST['ma_don_hang'];
        $ngay_dat = $_POST['ngay_dat'];
        $trang_thai_don_hang = $_POST['trang_thai_don_hang'];
        $hinh_thuc_thanh_toan = $_POST['hinh_thuc_thanh_toan'];
        $trang_thai_thanh_toan = $_POST['trang_thai_thanh_toan'];
      //  validate

      $errors = [];
      if (empty ($ma_don_hang)) {
        $errors['ma_don_hang'] = 'Mã không được để trống';
      }

      if (empty($ngay_dat)) {
        $errors['ngay_dat'] = 'ngày đặt không được để trống';
      }
      if (empty($trang_thai_don_hang)) {
        $errors['trang_thai_don_hang'] = 'Trạng thái không được để trống';
      }
      if (empty($hinh_thuc_thanh_toan)) {
        $errors['hinh_thuc_thanh_toan'] = 'lựa chọn hình thức thanh toán';
      }
      if (empty($trang_thai_thanh_toan)) {
        $errors['trang_thai_thanh_toan'] = 'Trạng thái không được để trống';
      }
      //thêm dữ liệu

      if (empty($errors)) {
        // nếu không có lỗi thì thêm dữ liệu
        // thêm vào csdl
        $this->modelDonHang->postData($ma_don_hang,$ngay_dat,$trang_thai_don_hang,$hinh_thuc_thanh_toan,$trang_thai_thanh_toan);
        unset($_SESSION['errors']);
        header('Location: index.php?act=don-hangs');
        exit();
      }
      else {
        $_SESSION['errors'] = $errors;
        header('Location: index.php?act=form-them-don-hang');
        exit();
      }
      }
    }
    // hàm hiển thị sửa
    public function edit(){
      //lấy id 
      $id = $_GET['DonHang_id'];

      // lấy thông tin chi tiết của danh mục
      $donhangs = $this->modelDonHang->getDetaildata($id);

      //đổ dữ liệu ra form
      require_once './views/donhang/editdonHang.php';
    }
    // hàm cập nhật dữ liệu vào csdl
    public function update(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // lấy ra dữ liệu
        $id = $_POST['id'];
        $ma_don_hang = $_POST['ma_don_hang'];
        $ngay_dat = $_POST['ngay_dat'];
        $trang_thai_don_hang = $_POST['trang_thai_don_hang'];
        $hinh_thuc_thanh_toan = $_POST['hinh_thuc_thanh_toan'];
        $trang_thai_thanh_toan = $_POST['trang_thai_thanh_toan'];

      //  validate

      $errors = [];
      if (empty ($ma_don_hang)) {
        $errors['ma_don_hang'] = 'Tên danh mục không được để trống';
      }

      if (empty($ngay_dat)) {
        $errors['ngay_dat'] = 'ngày đặt không được để trống';
      }
      if (empty($trang_thai_don_hang)) {
        $errors['trang_thai_don_hang'] = 'Trạng thái không được để trống';
      }
      if (empty($hinh_thuc_thanh_toan)) {
        $errors['hinh_thuc_thanh_toan'] = 'lựa chọn hình thức thanh toán';
      }
      if (empty($trang_thai_thanh_toan)) {
        $errors['trang_thai_thanh_toan'] = 'Trạng thái không được để trống';
      }
      //thêm dữ liệu

      if (empty($errors)) {
        // nếu không có lỗi thì thêm dữ liệu
        // thêm vào csdl
        $this->modelDonHang->updateData($id,$ma_don_hang,$ngay_dat,$trang_thai_don_hang,$hinh_thuc_thanh_toan,$trang_thai_thanh_toan);
        unset($_SESSION['errors']);
        header('Location: index.php?act=don-hangs');
        exit();
      }
      else {
        $_SESSION['errors'] = $errors;
        header('Location: index.php?act=form-sua-don-hang');
        exit();
      }
      }
    }
      // hàm xóa dữ liệu trong csdl
      public function destroy(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $id = $_POST['DonHang_id'];

          //xóa danh mục
          $this->modelDonHang->deleteData($id);
          header('Location: index.php?act=don-hangs');
          exit();
      }
    }
 }


?>