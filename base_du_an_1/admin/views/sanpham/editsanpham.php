\
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Sửa danh mục sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php"; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý danh sách sản phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa danh sách sản phẩm</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Sửa sản phẩm</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=sua-san-pham" method="POST"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">

                                                <div class="row">
                                                    <!-- Tên sản phẩm -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="ten_san_pham" class="form-label">Tên sản
                                                            phẩm</label>
                                                        <input type="text" class="form-control" name="ten_san_pham"
                                                            value="<?= $sanpham['ten_san_pham'] ?>" required>
                                                    </div>

                                                    <!-- Giá sản phẩm -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="gia_san_pham" class="form-label">Giá tiền</label>
                                                        <input type="number" class="form-control" name="gia_san_pham"
                                                            value="<?= $sanpham['gia_san_pham'] ?>" required>
                                                    </div>

                                                    <!-- Giá khuyến mãi -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="gia_khuyen_mai" class="form-label">Giá khuyến
                                                            mãi</label>
                                                        <input type="number" class="form-control" name="gia_khuyen_mai"
                                                            value="<?= $sanpham['gia_khuyen_mai'] ?>">
                                                    </div>

                                                    <!-- Hình ảnh -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                                        <input type="file" class="form-control" name="hinh_anh">
                                                        <?php if (!empty($sanpham['hinh_anh'])): ?>
                                                            <img src="uploads/<?= $sanpham['hinh_anh'] ?>"
                                                                alt="Hình ảnh sản phẩm" width="100">
                                                        <?php endif; ?>
                                                    </div>

                                                    <!-- Số lượng -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="so_luong" class="form-label">Số lượng</label>
                                                        <input type="number" class="form-control" name="so_luong"
                                                            value="<?= $sanpham['so_luong'] ?>" required>
                                                    </div>

                                                    <!-- Ngày nhập -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                                        <input type="date" class="form-control" name="ngay_nhap"
                                                            value="<?= $sanpham['ngay_nhap'] ?>" required>
                                                    </div>

                                                    <!-- Danh mục -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="danh_muc_id" class="form-label">Danh mục</label>
                                                        <select class="form-control" name="danh_muc_id" required>
                                                            <option selected disabled>Chọn danh mục</option>
                                                            <?php foreach ($listDanhMuc as $danhMuc): ?>
                                                                <option value="<?= $danhMuc['id'] ?>"
                                                                    <?= $sanpham['danh_muc_id'] == $danhMuc['id'] ? 'selected' : '' ?>>
                                                                    <?= $danhMuc['ten_danh_muc'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <!-- Trạng thái -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="trang_thai" class="form-label">Tình trạng</label>
                                                        <select class="form-control" name="trang_thai" required>
                                                            <option value="1"
                                                                <?= $sanpham['trang_thai'] == 1 ? 'selected' : '' ?>>Còn
                                                                hàng</option>
                                                            <option value="2"
                                                                <?= $sanpham['trang_thai'] == 2 ? 'selected' : '' ?>>Hết
                                                                hàng</option>
                                                        </select>
                                                    </div>

                                                    <!-- Mô tả -->
                                                    <div class="col-md-6 mb-3">
                                                        <label for="mo_ta" class="form-label">Mô tả</label>
                                                        <textarea name="mo_ta" class="form-control"
                                                            required><?= $sanpham['mo_ta'] ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Cập nhật sản
                                                        phẩm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>