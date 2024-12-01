    <!doctype html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <head>
        <meta charset="utf-8" />
        <title>Danh sách người dùng | Quản lý Tài Khoản</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <?php require_once "views/layouts/libs_css.php"; ?> <!-- Bao gồm CSS -->

        <style>
            /* CSS cho banner */
            .banner {
                background-color: #f8d7da;
                color: #721c24;
                padding: 10px 0;
                text-align: center;
                font-size: 18px;
                margin-bottom: 20px;
                border: 1px solid #f5c6cb;
            }

            /* Modal CSS */
            .modal-dialog {
                max-width: 800px;
            }
        </style>

        <script>
            // JavaScript để xử lý việc hiển thị chi tiết người dùng trong modal
            function showUserDetails(userId) {
                var userDetails = <?= json_encode($users); ?>;
                var user = userDetails.find(function(user) {
                    return user.id == userId;
                });

                if (user) {
                    var userDetailsHtml = `
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Thông tin chi tiết người dùng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tr><th>ID</th><td>${user.id}</td></tr>
                                <tr><th>Avatar</th><td><img src="${user.avatar}" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;"></td></tr>
                                <tr><th>Tên</th><td>${user.ten_nguoi_dung}</td></tr>
                                <tr><th>Email</th><td>${user.email}</td></tr>
                                <tr><th>Số điện thoại</th><td>${user.sdt}</td></tr>
                                <tr><th>Địa chỉ</th><td>${user.dia_chi}</td></tr>
                                <tr><th>Ngày sinh</th><td>${user.ngay_sinh ? new Date(user.ngay_sinh).toLocaleDateString() : 'Chưa có dữ liệu'}</td></tr>
                                <tr><th>Giới tính</th><td>${user.gioi_tinh}</td></tr>
                                <tr><th>Vai trò</th><td>${user.vai_tro}</td></tr>
                                <tr><th>Trạng thái</th><td>${user.trang_thai}</td></tr>
                            </table>
                        </div>
                    `;
                    // Hiển thị thông tin người dùng trong modal
                    document.getElementById('userModalContent').innerHTML = userDetailsHtml;
                    // Mở modal
                    $('#userDetailsModal').modal('show');
                }
            }
        </script>
    </head>

    <body>
        <div id="layout-wrapper">

            <?php require_once "views/layouts/header.php"; ?>
            <?php require_once "views/layouts/siderbar.php"; ?>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- Banner Section -->
                        <div class="banner">
                            Chào mừng bạn đến với trang Quản lý Tài Khoản!
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Quản Lý Tài Khoản</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Danh sách người dùng</li>
                                        </ol>
                                        <a href="?act=add-user" class="btn btn-primary">Thêm người dùng</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Danh sách người dùng -->
                        <div class="row">
                            <div class="col">
                                <div class="h-100">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Danh sách người dùng</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Avatar</th>
                                                            <th scope="col">Tên</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Vai trò</th>
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($users as $user): ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $user['id'] ?></td>
                                                                <td><img src="<?= $user['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                                                                <td><?= $user['ten_nguoi_dung'] ?></td>
                                                                <td><?= $user['email'] ?></td>
                                                                <td>
                                                                    <span
                                                                        class="badge <?= $user['vai_tro'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                        <?= $user['vai_tro'] == 1 ? 'User' : 'Admin' ?>
                                                                    </span>
                                                                </td>
                                                                <td>

                                                                    <span
                                                                        class="badge <?= $user['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                        <?= $user['trang_thai'] == 1 ? 'Hoạt động' : 'Khóa' ?>
                                                                    </span>

                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="link-info fs-15" onclick="showUserDetails(<?= $user['id'] ?>)">
                                                                        <i class="ri-eye-line"></i> Xem
                                                                    </a>
                                                                    <a href="?act=update-user&id=<?= $user['id'] ?>" class="link-success fs-15">
                                                                        <i class="ri-edit-2-line"></i> Cập nhật
                                                                    </a>
                                                                    <a href="?act=delete-user&id=<?= $user['id'] ?>" class="link-danger fs-15">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                                        </svg>
                                                                        Xóa
                                                                    </a>


                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal hiển thị thông tin chi tiết người dùng -->
                <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="userModalContent">
                            <!-- Nội dung sẽ được cập nhật khi người dùng click "Xem chi tiết" -->
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
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

        <?php require_once "views/layouts/libs_js.php"; ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </html>