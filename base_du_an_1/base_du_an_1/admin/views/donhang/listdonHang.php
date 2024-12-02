<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Quản lý đơn hàng </title>
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
                                <h4 class="mb-sm-0">Quản lý đơn hàng </h4>

                                <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <form action="search.php" method="GET">
                                            <label for="search">Tìm kiếm</label>
                                            <input type="text" id="search" name="search" placeholder="search">
                                            <button type="submit" style="background-color: red;">Tìm kiếm</button>
                                        </form>
                                    </ol>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Quản lý đơn hàng<main></main>
                                        </h4>
                                        <!-- <a href="?act=form-them-don-hang" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> thêm</a> -->
                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">stt</th>
                                                            <th scope="col">Mã đơn hàng</th>
                                                            <th scope="col">Tên người nhận</th>
                                                            <th scope="col">Số điện thoại</th>
                                                            <th scope="col">Ngày đặt</th>
                                                            <th scope="col">Tổng tiền</th>
                                                            <!-- <th scope="col">Trạng thái id</th> -->
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         
                                                        <?php foreach ($donhangs as $index => $donHang) : ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>
                                                                <td><?= $donHang['ma_don_hang'] ?></td>
                                                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                                                <td><?= $donHang['ngay_dat'] ?></td>
                                                                <td><?= $donHang['tong_tien'] ?></td>
                                                                <td><?= $donHang['trang_thai'] ?></td>
                                                                
                                                                
                                                                <td>
                                                                    
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href= "<?= BASE_URL_ADMIN ?>?act=chi-tiet-don-hang&id_don_hang=<?= $donHang['id'] ?>" class="link-success fs-15"><i class="ri-eye-line"></i></i></a>
                                                                        <a href= "<?= BASE_URL_ADMIN ?>?act=form-sua-don-hang&id_don_hang=<?= $donHang['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div><!-- end card-body -->
                                </div><!-- end card -->

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
                                    Design & Develop by Themesbrand
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