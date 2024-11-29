<?php require_once 'layout/header.php';  ?>
<?php require_once 'layout/menu.php';  ?>




<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner-2.webp">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner-3.webp">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner_ADIDAS.webp">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->


        </div>
    </section>
    <!-- hero slider area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm theo danh mục</h2>
                        <!-- <p class="sub-title">Add our products to weekly lineup</p> --> 
                         
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">


                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                   
                                    
                                    <?php foreach ($sanPhamDanhMuc as $key=> $spdm): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' .$spdm['id'];?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $spdm['hinh_anh']  ?>"
                                                        alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $spdm['hinh_anh']  ?>"
                                                        alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($spdm['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                                    if ($tinhNgay->days <= 7) {
                                                    ?>
                                                        <div class="product_lable new">
                                                            <span>Mới</span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($spdm['gia_khuyen_mai']) {
                                                    ?>
                                                        <div class="product_lable discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php

                                                    }

                                                    ?>
                                                    <div class="product-label new">
                                                        <span>Mới</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>Giảm giá</span>
                                                    </div>
                                                </div>

                                                <div class="cart-hover">
                                                   <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' .$spdm['id'];?>"> <button class="btn btn-cart">Chi Tiết Sản Phẩm</button></a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">

                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$spdm['id']?>"><?= $spdm['ten_san_pham']; ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php
                                                    if ($spdm['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($spdm['gia_khuyen_mai']) . 'đ' ?></span>
                                                        <span class="price-old"><del><?= formatPrice($spdm['gia_san_pham']) . 'đ' ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($spdm['gia_san_pham']) . 'đ' ?></span>

                                                    <?php }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach ?>

                                </div>
                            </div>

                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->
</main>







<?php include_once 'layout/footer.php' ?>