<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Danh mục sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php"; ?>

        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý danh sách sản phẩm</h4>
                                <form class="pri-add-circle-line align-middle me-1">
                                    <input type="text" id="search-options" placeholder="Tìm kiếm sản phẩm..." onkeyup="searchProducts()" autocomplete="off" class="">
                                    <span class="mdi mdi-magnify search-widget-icon btn btn-light"></span>
                                    <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm</h4>
                                        <a href="?act=form-them-san-pham" class="btn btn-soft-success"><i
                                                class="ri-add-circle-line align-middle me-1"></i> Thêm</a>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Ảnh sản phẩm</th>
                                                            <th scope="col">Giá tiền</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Danh mục</th>
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($sanphams as $index => $sanpham) : ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>
                                                                <td><?= htmlspecialchars($sanpham['ten_san_pham']) ?></td>
                                                                <td>
                                                                   <?php  $newPath = str_replace("admin", ".", $sanpham['hinh_anh']);   ?>
                                                                 
                                                                    <img src="<?= htmlspecialchars($newPath) ?>"
                                                                        style="width: 100px;" alt="Hình ảnh sản phẩm">
                                                                       
                                                                </td>
                                                                <td><?= number_format($sanpham['gia_san_pham']) ?> VNĐ</td>
                                                                <td><?= $sanpham['so_luong'] ?></td>
                                                                <td><?= htmlspecialchars($sanpham['ten_danh_muc']) ?></td>
                                                                <td>
                                                                    <span
                                                                        class="badge <?= $sanpham['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                        <?= $sanpham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="?act=form-sua-san-pham&sanpham_id=<?= $sanpham['id'] ?>"
                                                                            class="link-success fs-15"><i
                                                                                class="ri-edit-2-line"></i></a>
                                                                        <form action="?act=xoa-san-pham" method="POST"
                                                                            onsubmit="return confirm('Bạn có chắc muốn xóa không?')">
                                                                            <input type="hidden" name="sanpham_id"
                                                                                value="<?= $sanpham['id'] ?>">
                                                                            <button type="submit" class="link-danger fs-15"
                                                                                style="border: none; background: none;"><i
                                                                                    class="ri-delete-bin-line"></i></button>
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
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">Design & Develop by Themesbrand</div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top"><i
            class="ri-arrow-up-line"></i></button>

    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <?php require_once "views/layouts/libs_js.php"; ?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-options");
        const searchIcon = document.querySelector(".mdi-magnify.search-widget-icon");
        const closeIcon = document.getElementById("search-close-options");
        const rows = document.querySelectorAll("tbody tr");
        // Khi nhấn vào biểu tượng kính lúp để thực hiện tìm kiếm
        searchIcon.addEventListener("click", function() {
            const query = searchInput.value.toLowerCase().trim(); // Lấy giá trị nhập vào trong ô tìm kiếm
            if (query === "") {
                return; // Nếu ô tìm kiếm trống, không làm gì cả
            }
            rows.forEach(row => {
                const name = row.querySelector("td:nth-child(2)").innerText.toLowerCase(); // Lấy tên người dùng từ cột thứ 2
                const email = row.querySelector("td:nth-child(3)").innerText.toLowerCase(); // Lấy email người dùng từ cột thứ 3

                // Kiểm tra nếu tìm kiếm có chứa từ khóa trong tên hoặc email
                if (name.includes(query) || email.includes(query)) {
                    row.style.display = ""; // Hiển thị người dùng nếu tên hoặc email chứa từ khóa
                } else {
                    row.style.display = "none"; // Ẩn người dùng nếu không khớp với từ khóa
                }
            });
            // Hiển thị biểu tượng đóng khi có kết quả tìm kiếm
            closeIcon.classList.remove("d-none");
        });

        // Khi nhấn vào biểu tượng đóng
        closeIcon.addEventListener("click", function() {
            rows.forEach(row => {
                row.style.display = ""; // Hiển thị tất cả người dùng
            });

            // Ẩn biểu tượng đóng
            closeIcon.classList.add("d-none");

            // Xóa giá trị trong ô tìm kiếm
            searchInput.value = "";
        });
    });
</script>

</html>