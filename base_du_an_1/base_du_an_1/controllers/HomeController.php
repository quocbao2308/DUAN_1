<?php 

class HomeController
{


    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct()
    {
        require_once 'models/SanPham.php';
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }

    public function index() {
        echo "ok";
    }

    public function home (){
        $listSanPham = $this->modelSanPham->getAllSanPham();
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

    public function formLogin(){
        require_once '../base_du_an_1/views/auth/formLogin.php';
        // deleteSessionError();
        exit();
    }

    public function postLogin(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email,$password);
            if($user == $email){
                $_SESSION['user_client']=$user;
                header("location:".BASE_URL);
                exit();
            }else{
                $_SESSION['error'] = $user;
                $_SESSION['flash'] =true;
                header("location:".BASE_URL .'?act=login');
            }
        }
    }


}