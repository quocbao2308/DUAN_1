<?php 

class HomeController
{


    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDanhMuc;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        require_once 'models/SanPham.php';
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang= new GioHang();
        $this->modelDonHang = new DonHang();
        
    }
    public function home (){
        
        $listSanPham = $this->modelSanPham->getAllSanPham();
        
        $listDanhMuc =(new DanhMuc)->getAllDM(); 
        // var_dump($listSanPham);die; 
        require_once './views/home.php';
    }

    public function chiTietSanPham(){
        
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this ->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDangMuc($sanPham['danh_muc_id']);
        if($sanPham){
            require_once "./views/chiTietSanPham.php";
        }
        else{
            header("location: ".BASE_URL);
        }
    }
    public function danhmuc(){
        $id=$_GET['id']??"";
        $sanPhamDanhMuc = $this->modelSanPham->getAllSanPhamByDanhMuc($id);
        require_once './views/sanPhamDanhMuc.php';
        // var_dump($sanPhamDanhMuc);
        // die;
    }

    public function formLogin(){
        require_once '../base_du_an_1/views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function postLogin(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // var_dump('hada'); die();
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email); 
            $user = $this->modelTaiKhoan->checkLogin($email,$password);
    
            if($user == $email){
                $_SESSION['user_client'] = $user;
                
                header("location:".BASE_URL);
                exit();
            }else{
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("location:".BASE_URL .'?act=form-login');
            }
        }
    }
    public function daDatHang()
    {
        $thongTinDonHang = $this->modelDonHang->getAllDonHang($_SESSION['thong_tin_don_hang']['id']);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        
        if (isset($_SESSION['user_client'])) {

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            //    var_dump($mail['id']);die();

            // lẤy dl giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
        require_once './views/daDatHang.php';
        deleteSessionErrors();
    }
}