<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sửa đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý sửa đơn hàng </h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a></li>
                                        <li class="breadcrumb-item active">đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Sửa đơn hàng: <?= $donHang['ma_don_hang'] ?></h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">

                                            <form action="<?= BASE_URL_ADMIN .'?act=sua-don-hang' ?>" method="POST">
                                                <input type="text" name="don_hang_id" value="<?= $donHang['id'] ?>" hidden>
                                                <div class="row">

                                                    <div class="form-group">
                                                        <label>Tên người nhận</label>
                                                        <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>" placeholder="nhập tên đơn hàng">
                                                        <?php if (isset($erros['ten_nguoi_nhan'])) { ?>
                                                            <p class="text-danger"> <?= $erros['ten_nguoi_nhan'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>" placeholder="nhập tên đơn hàng">
                                                        <?php if (isset($erros['sdt_nguoi_nhan'])) { ?>
                                                            <p class="text-danger"> <?= $erros['sdt_nguoi_nhan'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>" placeholder="nhập tên đơn hàng">
                                                        <?php if (isset($erros['email_nguoi_nhan'])) { ?>
                                                            <p class="text-danger"> <?= $erros['email_nguoi_nhan'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" placeholder="nhập tên đơn hàng">
                                                        <?php if (isset($erros['dia_chi_nguoi_nhan'])) { ?>
                                                            <p class="text-danger"> <?= $erros['dia_chi_nguoi_nhan'] ?></p>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Ghi chú</label>
                                                        <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"><?= $donHang['ghi_chu'] ?></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputstatus">Trạng thái đơn hàng</label>
                                                        <select name="trang_thai_id" id="inputstatus" class="form-control custom-select">
                                                            <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                                                <option
                                                                    <?php 
                                                                        if($donHang['trang_thai_id'] > $trangThai['id']
                                                                        || $donHang['trang_thai_id'] ==9
                                                                        || $donHang['trang_thai_id'] ==10
                                                                        || $donHang['trang_thai_id'] ==11
                                                                        ){
                                                                            echo "disabled";
                                                                        }
                                                                    ?>
                                                                    <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected':'' ?>
                                                                    value="<?= $trangThai['id'] ?>">
                                                                    <?= $trangThai['trang_thai'] ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>



                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div>

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by datntph55708
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?php
        require_once "views/layouts/libs_js.php";
        ?>

</body>

</html>