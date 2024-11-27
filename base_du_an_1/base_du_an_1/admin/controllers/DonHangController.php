<?php
class DonHangController
{

   public $modelDonHang;


   public function __construct()
   {
      $this->modelDonHang = new DonHang();
   }
   // hàm hiển thị danh sách
   public function index()
   {
      $donhangs = $this->modelDonHang->getAll();
      // đưa dữ liệu ra view
      // echo"<pre>";
      // print_r($donhangs);die;
      require_once './views/donhang/listdonHang.php';
   }

   public function detailDonhang()
   {
      $don_hang_id = $_GET['id_don_hang'];
      $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
      $sanPhamDonHang = $this->modelDonHang->getlistSpDonHang($don_hang_id);
      // var_dump($sanPhamDonHang);die;
      $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
      
      require_once './views/donhang/detailDonHang.php';
   }


   public function editDonHang()
   {
      $id = $_GET['id_don_hang'];
      $donHang = $this->modelDonHang->getDetailDonHang($id);
      $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
      if ($donHang) {
         require_once './views/donhang/editdonHang.php';
      } else {
         header("Location:" . BASE_URL_ADMIN . '?act=don-hangs');
      }
   }

   public function postEditDonHang()
   
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // var_dump($_POST['trang_thai_id']);die();
         $don_hang_id = $_POST['don_hang_id'] ?? '';

         $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
         $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
         $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
         $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
         $ghi_chu = $_POST['ghi_chu'] ?? '';
         $trang_thai_id = $_POST['trang_thai_id'] ?? '';

         $erros = [];
         if (empty($ten_nguoi_nhan)) {
            $erros['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
         }
         if (empty($sdt_nguoi_nhan)) {
            $erros['sdt_nguoi_nhan'] = 'Số điện thoại người nhận không được để trống';
         }
         if (empty($email_nguoi_nhan)) {
            $erros['email_nguoi_nhan'] = 'Email người nhận không được để trống';
         }
         if (empty($dia_chi_nguoi_nhan)) {
            $erros['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
         }

         // var_dump($erros);die;
         $_SESSION['error'] = $erros;
        
         if (empty($erros)) {
            // require_once './admin/controllers/DonHangController.php';
            $this->modelDonHang->updateDonHang(
               $don_hang_id,
               $ten_nguoi_nhan,
               $sdt_nguoi_nhan,
               $email_nguoi_nhan,
               $dia_chi_nguoi_nhan,
               $ghi_chu,
               $trang_thai_id
            );

            header("location:" . BASE_URL_ADMIN . '?act=don-hangs');
            exit();
         } else {
            $_SESSION['flash'] = true;
            header("location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
         }
      }
   }












   
}
