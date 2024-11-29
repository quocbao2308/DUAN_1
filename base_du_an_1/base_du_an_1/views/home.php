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



    <!-- service policy area start -->
    <div class="service-policy section-padding">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Giao hàng</h6>
                            <p>Miễn phí giao hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hỗ trợ</h6>
                            <p>Hỗ trợ 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hoàn tiền</h6>
                            <p>Hoàn tiền trong 30 ngày </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Thanh toán</h6>
                            <p>Bảo mật thanh toán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->

   

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>
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
                                   
                                    
                                    <?php foreach ($listSanPham as $key=> $sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' .$sanPham['id'];?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']  ?>"
                                                        alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']  ?>"
                                                        alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
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
                                                    if ($sanPham['gia_khuyen_mai']) {
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
                                                   <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' .$sanPham['id'];?>"> <button class="btn btn-cart">Chi Tiết Sản Phẩm</button></a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">

                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$sanPham['id']?>"><?= $sanPham['ten_san_pham']; ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php
                                                    if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>

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

    <!-- product banner statistics area start -->
    <section class="product-banner-statistics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="product-banner-carousel slick-row-10">
                        <!-- banner single slide start -->
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img style="width: 500px; height: 500px;" src="assets/img/banner/giaythethao2.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">GIÀY THỂ THAO</a></h5>
                                </div>
                            </figure>
                        </div>
                        <!-- banner single slide start -->
                        <!-- banner single slide start -->
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img style="width: 500px;height: 500px;" src="assets/img/banner/giayda.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">GIÀY DA</a></h5>
                                </div>
                            </figure>
                        </div>
                        <!-- banner single slide start -->
                        <!-- banner single slide start -->
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img style="width: 500px;height: 500px;" src="assets/img/banner/giaycaogot.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">GIÀY CAO GÓT</a></h5>
                                </div>
                            </figure>
                        </div>
                        <!-- banner single slide start -->
                        <!-- banner single slide start -->
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img style="width: 500px;height: 500px;" src="assets/img/banner/giay-nike-hot-2024.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">GIÀY HOT</a></h5>
                                </div>
                            </figure>
                        </div>
                        <!-- banner single slide start -->
                        <!-- banner single slide start -->
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img style="width: 500px;height: 500px;" src="assets/img/banner/giayluoi_1.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">GIÀY LƯỜI</a></h5>
                                </div>
                            </figure>
                        </div>
                        <!-- banner single slide start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product banner statistics area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">SẢN PHẨM </h2>
                        <!-- <p class="sub-title">Add featured products to weekly lineup</p> -->
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <div class="product-item">
                            
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-6.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-13.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                </div>
                                
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-7.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-9.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>sale</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>new</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Handmade Golden Necklace</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$50.00</span>
                                    <span class="price-old"><del>$80.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-8.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-11.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$99.00</span>
                                    <span class="price-old"><del></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-16.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-10.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>sale</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>15%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Diamond Exclusive Ornament</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$55.00</span>
                                    <span class="price-old"><del>$75.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-10.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-9.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>20%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Citygold Exclusive Ring</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-1.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-18.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-2.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-17.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>sale</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>new</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Handmade Golden Necklace</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$50.00</span>
                                    <span class="price-old"><del>$80.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-3.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-16.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$99.00</span>
                                    <span class="price-old"><del></del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-4.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-15.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>sale</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>15%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Diamond Exclusive Ornament</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$55.00</span>
                                    <span class="price-old"><del>$75.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->

                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-5.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-14.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>20%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Citygold Exclusive Ring</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

    <!-- testimonial area start -->
    <section class="testimonial-area section-padding bg-img" data-bg="assets/img/testimonial/testimonials-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">THANH VIÊN NHÓM 1</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-thumb-wrapper">
                        <div class="testimonial-thumb-carousel">
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/testimonial-1.png" alt="testimonial-thumb">
                            </div>
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/testimonial-2.png" alt="testimonial-thumb">
                            </div>
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/testimonial-3.png" alt="testimonial-thumb">
                            </div>
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/testimonial-2.png" alt="testimonial-thumb">
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content-wrapper">
                        <div class="testimonial-content-carousel">
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis
                                    orci augue nec sapien. Cum sociis natoque</p>
                            
                                <h5 class="testimonial-author">Thành Đạt</h5>
                            </div>
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis
                                    orci augue nec sapien. Cum sociis natoque</p>
                            
                                <h5 class="testimonial-author">Quốc Bảo</h5>
                            </div>
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis
                                    orci augue nec sapien. Cum sociis natoque</p>
                            
                                <h5 class="testimonial-author">Thùy Linh</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->

    

    <!-- latest blog area start -->
    <section class="latest-blog-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">latest blogs</h2>
                        <p class="sub-title">There are latest blog posts</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/img/blog/blog-img1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/03/2019 | <a href="#">Corano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Celebrity Daughter Opens Up About Having Her Eye
                                        Color Changed</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/img/blog/blog-img2.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/03/2019 | <a href="#">Corano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Children Left Home Alone For 4 Days In TV series
                                        Experiment</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/img/blog/blog-img3.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/03/2019 | <a href="#">Corano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">Lotto Winner Offering Up Money To Any Man That Will
                                        Date Her</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/img/blog/blog-img4.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/03/2019 | <a href="#">Corano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">People are Willing Lie When Comes Money, According
                                        to Research</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="blog-details.html">
                                    <img src="assets/img/blog/blog-img5.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/03/2019 | <a href="#">Corano</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="blog-details.html">romantic Love Stories Of Hollywoodâ€™s Biggest
                                        Celebrities</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog area end -->

    <!-- brand logo area start -->
    <div class="brand-logo section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/1.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/2.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/3.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/4.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/5.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/6.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->
</main>





<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-1.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$100.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-2.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$80.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>$300.00</strong></span>
                        </li>
                        <li>
                            <span>Eco Tax (-2.00)</span>
                            <span><strong>$10.00</strong></span>
                        </li>
                        <li>
                            <span>VAT (20%)</span>
                            <span><strong>$60.00</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>$370.00</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->

<?php include_once 'layout/footer.php' ?>