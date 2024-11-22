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

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <form action="search.php" method="GET">
                                            <label for="search">Tìm kiếm</label>
                                            <input type="text" id="search" name="search" placeholder="search">
                                            <button type="submit" style="background-color: red;">Tìm kiếm</button>
                                        </form>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Quản lý đơn hàng<main></main>
                                        </h4>
                                        <a href="?act=form-them-don-hang" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> thêm</a>
                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">stt</th>
                                                            <th scope="col">Mã đơn hàng</th>
                                                            <th scope="col">Ngày đặt</th>
                                                            <th scope="col">trạng thái đơn hàng</th>
                                                            <th scope="col">hình thức thanh toán </th>
                                                            <th scope="col">trạng thái thanh toán</th>
                                                            <th scope="col">hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($donhangs as $index => $donHang) : ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>
                                                                <td><?= $donHang['ma_don_hang'] ?></td>
                                                                <td><?= $donHang['ngay_dat'] ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($donHang['trang_thai_don_hang'] == 1) { ?>
                                                                        <span>hoàn thành</span>
                                                                </td>
                                                            <?php
                                                                    } else { ?>
                                                                <span>thất bại</span></td>
                                                            <?php
                                                                    }
                                                            ?>
                                                            <td>
                                                                <?php
                                                                if ($donHang['hinh_thuc_thanh_toan'] == 1) { ?>
                                                                    <span class="badge bg-success">momo</span>
                                                            </td>
                                                        <?php
                                                                } else { ?>
                                                            <span class="badge bg-danger">tiền mặt</span></td>
                                                        <?php
                                                                }
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($donHang['trang_thai_thanh_toan'] == 1) { ?>
                                                                <span class="badge bg-success">đã thanh toán</span>
                                                        </td>
                                                    <?php
                                                            } else { ?>
                                                        <span class="badge bg-danger">chưa thanh toán</span></td>
                                                    <?php
                                                            }
                                                    ?>
                                                    </td>

                                                    <td>

                                                        <div class="hstack gap-3 flex-wrap">
                                                            <a href="?act=form-sua-don-hang&DonHang_id=<?= $donHang['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                            <form action="?act=xoa-don-hang" method="POST"
                                                                onsubmit="return confirm('bạn có đy xóa không')">
                                                                <input type="hidden" name="DonHang_id" value="<?= $donHang['id'] ?>">
                                                                <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                                                                    <i class="ri-delete-bin-line"></i></button>
                                                            </form>
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