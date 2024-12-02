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
                        <div class="col-10">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý đơn hàng - Đơn hàng: <?= $donHang['ma_don_hang'] ?></h4>
                            </div>
                            <div class="col-sm-2">
                                <form action="" method="post">
                                    <select name="" id="" class="form-group">
                                        <?php foreach ($listTrangThaiDonHang as $key => $trangThai): ?>

                                            <option
                                            <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' :'' ?>
                                            <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' :'' ?>
                                                value="<?= $trangThai['id'] ?>">
                                                <?= $trangThai['trang_thai'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    if ($donHang['trang_thai_id'] == 1) {
                                        $colorAlert = 'info';
                                    } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                                        $colorAlert = 'warning';
                                    } elseif ($donHang['trang_thai_id'] == 10) {
                                        $colorAlert = 'success';
                                    } else {
                                        $colorAlert = 'danger';
                                    }
                                    ?>
                                    <div class="alert alert-<?= $colorAlert ?>" role="alert">
                                        <?= $donHang['trang_thai'] ?>
                                    </div>

                                    <!-- Main content -->
                                    <div class="invoice p-3 mb-3">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fa-solid fa-shoe-prints"></i> SHOES MASTER <br>
                                                    <small class="float-right">Ngày đặt: <?= $donHang['ngay_dat'] ?></small>
                                                </h4>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                Người đặt
                                                <address>
                                                    <strong><?= $donHang['ten_nguoi_dung'] ?></strong><br>
                                                    Email: <?= $donHang['email'] ?><br>
                                                    Phone: <?= $donHang['sdt'] ?><br>

                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                Người nhận
                                                <address>
                                                    <strong> <?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                                    Email: <?= $donHang['email_nguoi_nhan'] ?><br>
                                                    Phone: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?>
                                                </address>
                                            </div>
                                            <div class="col-sm-4 invoice-col">
                                                Đơn hàng
                                                <address>
                                                    <strong>Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></strong><br>
                                                    Tổng tiền: <?= $donHang['tong_tien'] ?><br>
                                                    Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                                                    Thanh toán: <?= $donHang['ten_phuong_thuc'] ?>
                                                </address>
                                            </div>

                                        </div>
                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Thứ tự</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Đơn giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $tong_tien = 0; ?>
                                                        <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
                                                            <tr>
                                                                <td><?= $key + 1 ?></td>
                                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                                <td><?= $sanPham['don_gia'] ?></td>
                                                                <td><?= $sanPham['so_luong'] ?></td>
                                                                <td><?= $sanPham['thanh_tien'] ?></td>

                                                            </tr>
                                                            <?php $tong_tien += $sanPham['thanh_tien'] ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">

                                            <div class="col-6">
                                                <p class="lead">Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></p>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="width:50%">Thành tiền:</th>
                                                            <td><?= $tong_tien ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Shipping:</th>
                                                            <td>200000</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tổng tiền:</th>
                                                            <td><?= $tong_tien + 200000 ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->

                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>

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


        <?php
        require_once "views/layouts/libs_js.php";
        ?>

</body>

</html>