<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_main/header'); ?>

<body>
    <?php $this->load->view('_partial_main/navbar'); ?>
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories-item categories-large-item set-bg me-4"
                        data-setbg="assets/images/category-1.jpg"
                        style="background: url('assets/images/category-1.jpg');">
                        <div class="categories-text">
                            <h1>Women’s fashion</h1>
                            <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                                edolore magna aliquapendisse ultrices gravida.<?php echo $head ?></p>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories-item set-bg" data-setbg="assets/images/category-1.jpg"
                                style="background: url('assets/images/category-2.jpg');">
                                <div class="categories-text">
                                    <h4>Men's fashion</h4>
                                    <p>373 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories-item set-bg" data-setbg="assets/images/category-2.jpg"
                                style="background: url('assets/images/category-3.jpg');">
                                <div class="categories-text">
                                    <h4>Kid's fashion</h4>
                                    <p>200 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories-item set-bg" data-setbg="assets/images/category-3.jpg"
                                style="background: url('assets/images/category-4.jpg');">
                                <div class="categories-text">
                                    <h4>Cosmetics</h4>
                                    <p>100 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories-item set-bg" data-setbg="assets/images/category-4.jpg"
                                style="background: url('assets/images/category-5.jpg');">
                                <div class="categories-text">
                                    <h4>Accessories</h4>
                                    <p>100 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product spad">
        <div class="container property-gallery-container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New Product</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter-controls">
                        <li class="active mixitup-control-active" data-filter="*">
                            All
                        </li>
                        <li data-filter=".women">
                            Women's
                        </li>
                        <li data-filter=".men">
                            Men's
                        </li>
                        <li data-filter=".kid">
                            Kid's
                        </li>
                        <li data-filter=".accessories">
                            Accessories's
                        </li>
                        <li data-filter=".cosmetic">
                            Cosmetic's
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row property-gallery">
                <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                    <div class="product-item">
                        <div class="product-item-pic set-bg" data-setbg="assets/images/product/product-1.jpg"
                            style="background-image: url('assets/images/product/product-1.jpg')">
                            <div class="label new">New</div>
                            <ul class="product-hover">
                                <li><a href="assets/images/product/product-1.jpg" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product-item-text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
                    <div class="product-item">
                        <div class="product-item-pic set-bg" data-setbg="assets/images/product/product-1.jpg"
                            style="background-image: url('assets/images/product/product-1.jpg')">
                            <div class="label stockout">out of stock</div>
                            <ul class="product-hover">
                                <li><a href="assets/images/product/product-1.jpg" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product-item-text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
                    <div class="product-item sale">
                        <div class="product-item-pic set-bg" data-setbg="assets/images/product/product-1.jpg"
                            style="background-image: url('assets/images/product/product-1.jpg')">
                            <div class="label sale">sale</div>
                            <ul class="product-hover">
                                <li><a href="assets/images/product/product-1.jpg" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product-item-text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-price">$ 40.0
                                <span>$ 59.0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('_partial_main/footer'); ?>