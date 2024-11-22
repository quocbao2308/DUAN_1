<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý sản phẩm" name="description" />
    <meta content="Admin" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <?php

    ?>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php"; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page Title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý danh sách sản phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Thêm Sản Phẩm -->
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=them-san-pham" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">

                                                    <!-- Tên sản phẩm -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten_san_pham" class="form-label">Tên sản
                                                                phẩm</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nhập tên sản phẩm" name="ten_san_pham"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Giá sản phẩm -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_san_pham" class="form-label">Giá sản
                                                                phẩm</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nhập giá sản phẩm" name="gia_san_pham"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Giá khuyến mãi -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_khuyen_mai" class="form-label">Giá khuyến
                                                                mãi</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nhập giá khuyến mãi" name="gia_khuyen_mai">
                                                        </div>
                                                    </div>

                                                    <!-- Giá nhập -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_nhap" class="form-label">Giá nhập</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nhập giá nhập" name="gia_nhap" required>
                                                        </div>
                                                    </div>

                                                    <!-- Giá bán -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_ban" class="form-label">Giá bán</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nhập giá bán" name="gia_ban" required>
                                                        </div>
                                                    </div>

                                                    <!-- Hình ảnh -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" name="hinh_anh"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Album ảnh -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="img_array" class="form-label">Album ảnh</label>
                                                            <input type="file" class="form-control" name="img_array[]"
                                                                multiple>
                                                        </div>
                                                    </div>

                                                    <!-- Số lượng -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="so_luong" class="form-label">Số lượng</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nhập số lượng" name="so_luong" required>
                                                        </div>
                                                    </div>

                                                    <!-- Ngày nhập -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                                            <input type="date" class="form-control" name="ngay_nhap"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!-- Danh mục -->
                                                    <div class="col-md-6">
                                                        <label for="danh_muc_id" class="form-label">Danh mục sản phẩm</label>
                                                        <select class="form-control" name="danh_muc_id" id="danh_muc_id" required>
                                                            <option selected disabled>Chọn danh mục</option>
                                                            <?php foreach ($listDanhMuc as $danhMuc): ?>
                                                                <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <!-- <pre><?php print_r($listDanhMuc); ?></pre> -->


                                                    <!-- Trạng thái -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="trang_thai" class="form-label">Trạng
                                                                thái</label>
                                                            <select class="form-select" id="trang_thai"
                                                                name="trang_thai" required>
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1">Còn hàng</option>
                                                                <option value="0">Hết hàng</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Mô tả -->
                                                    <div class="col-md-6">
                                                        <label for="mo_ta" class="form-label">Mô tả</label>
                                                        <textarea name="mo_ta" class="form-control"
                                                            placeholder="Nhập mô tả" required></textarea>
                                                    </div>

                                                    <!-- Nút Submit -->
                                                    <div class="card-footer text-end">
                                                        <button type="submit" class="btn btn-primary">Thêm sản
                                                            phẩm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <?php require_once "views/layouts/libs_js.php"; ?>

</body>

</html>