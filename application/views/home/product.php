<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_main/header'); ?>

<body>
	<?php $this->load->view('_partial_main/navbar'); ?>
	<div class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__links">
						<a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a>
						<span>Shop</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="product">
		<section class="shop spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3">
						<div class="shop__sidebar">
							<div class="sidebar__categories">
								<div class="section-title">
									<h4>Categories</h4>
								</div>
								<div class="categories__accordion">
									<div class="accordion" id="accordionExample">
										<?php for ($i = 0; $i < sizeof($dataCategory); $i++) {
                                            echo " <div class='card'>
                                            <div class='card-heading ". (($i+1 == $dataCategoryNow) ? 'active' : '') . "'>
                                                <a data-bs-toggle='collapse' href='#collapse" . $i . "'
                                                    aria-controls='collapseOne'>
                                                   " . $dataCategory[$i]['category_name'] . "
                                                </a>
                                            </div>
                                            <div id='collapse" . $i . "' class='collapse " . (($i+1 == $dataCategoryNow) ? 'show' : '') . " data-parent='#accordionExample'>
                                                <div class='card-body'>
                                                    <ul>";
                                                    
                                            for ($z = 0; $z < sizeof($dataSubCategory); $z++) {
                                                if ($dataCategory[$i]['category_id'] == $dataSubCategory[$z]['category_id']) {
                                                    echo " <li><a href='".base_url()."product?category_id=".$dataCategory[$i]['category_id']."&sub_category_id=".$dataSubCategory[$z]['sub_category_id']."'>" . $dataSubCategory[$z]['name'] . "</a></li>";
                                                }
                                            }
                                            echo "</ul>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                        ?>
									</div>
								</div>
							</div>
							<div class="sidebar__filter">
								<div class="section-title">
									<h4>Shop by price</h4>
								</div>
								<div class="filter-range-wrap">
									<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
										data-min="33" data-max="99"></div>
									<div class="range-slider">
										<div class="price-input">
											<p>Price:</p>
											<input type="text" id="minamount">
											<input type="text" id="maxamount">
										</div>
									</div>
								</div>
								<a href="#">Filter</a>
							</div>
							<div class="sidebar__sizes">
								<div class="section-title">
									<h4>Shop by size</h4>
								</div>
								<div class="size__list">
									<label for="xxs">
										xxs
										<input type="checkbox" id="xxs">
										<span class="checkmark"></span>
									</label>
									<label for="xs">
										xs
										<input type="checkbox" id="xs">
										<span class="checkmark"></span>
									</label>
									<label for="xss">
										xs-s
										<input type="checkbox" id="xss">
										<span class="checkmark"></span>
									</label>
									<label for="s">
										s
										<input type="checkbox" id="s">
										<span class="checkmark"></span>
									</label>
									<label for="m">
										m
										<input type="checkbox" id="m">
										<span class="checkmark"></span>
									</label>
									<label for="ml">
										m-l
										<input type="checkbox" id="ml">
										<span class="checkmark"></span>
									</label>
									<label for="l">
										l
										<input type="checkbox" id="l">
										<span class="checkmark"></span>
									</label>
									<label for="xl">
										xl
										<input type="checkbox" id="xl">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="sidebar__color">
								<div class="section-title">
									<h4>Shop by size</h4>
								</div>
								<div class="size__list color__list">
									<label for="black">
										Blacks
										<input type="checkbox" id="black">
										<span class="checkmark"></span>
									</label>
									<label for="whites">
										Whites
										<input type="checkbox" id="whites">
										<span class="checkmark"></span>
									</label>
									<label for="reds">
										Reds
										<input type="checkbox" id="reds">
										<span class="checkmark"></span>
									</label>
									<label for="greys">
										Greys
										<input type="checkbox" id="greys">
										<span class="checkmark"></span>
									</label>
									<label for="blues">
										Blues
										<input type="checkbox" id="blues">
										<span class="checkmark"></span>
									</label>
									<label for="beige">
										Beige Tones
										<input type="checkbox" id="beige">
										<span class="checkmark"></span>
									</label>
									<label for="greens">
										Greens
										<input type="checkbox" id="greens">
										<span class="checkmark"></span>
									</label>
									<label for="yellows">
										Yellows
										<input type="checkbox" id="yellows">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<div class="row">
							<?php if(isset($dataProduct)){
								if(sizeof($dataProduct)!=0){
                                 foreach($dataProduct as $dataProduct){?>
							<div class="col-lg-4 col-md-6">
								<?php if($dataProduct['product_discount'] > 0){?>
								<div class="product__item sale">
									<?php }else{ ?>
									<div class="product__item">
										<?php } ?>
										<div class="product__item__pic set-bg"
											style="background-image:url('<?php echo base_url(); ?>upload/product/<?php echo $dataProduct['product_url'] ?>')">
											<?php if($dataProduct['product_stock'] == 0){?>
											<div class="label stockout stockblue">Out Of Stock</div>
											<?php }else{
											 if($dataProduct['product_discount']==0){?>
											<div class="label new">New</div>
											<?php }else if($dataProduct['product_discount']>0){?>
											<div class="label">Sale</div>
											<?php }
										}?>


											<ul class="product__hover">
												<li><a href="<?php echo base_url(); ?>upload/product/<?php echo $dataProduct['product_url']?>"
														class="image-popup"><span class="arrow_expand"></span></a></li>
												<?php
                                if ($this->session->userdata('username') != null) {
                                ?>
												<!-- is login -->
												<li><a href="favourite"><span class="icon_heart_alt"></span></a></li>
												<li><a href="cart"><span class="icon_bag_alt"></span></a></li>
												<?php
                                } else {
                                ?>
												<!-- is not login -->
												<li><a href="login"><span class="icon_heart_alt"></span></a></li>
												<li><a href="login"><span class="icon_bag_alt"></span></a></li>
												<?php
                                }
                                ?>

											</ul>
										</div>
										<div class="product__item__text">
											<h6><a href="#"><?php echo $dataProduct['product_name']?></a></h6>
											<div class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<?php if($dataProduct['product_discount']>0){
													$productPrice = $dataProduct['product_price'];
													$productDiscount = $dataProduct['product_discount'];
													$discount = ($productDiscount/100) * $productPrice;
													$priceAfterDiscount = $productPrice - $discount;
													echo "<div class='product__price'>".$priceAfterDiscount."
											<span>".$dataProduct['product_price']."
											</span></div>";
											?>
											<?php }else{
												echo "<div class='product__price'>".$dataProduct['product_price']."</div>";
												}?>
										</div>
									</div>
								</div>
								<?php 
                            }
                            ?>
								<div class="col-lg-12 text-center">
									<div class="pagination__option">
										<a href="#">1</a>
										<a href="#">2</a>
										<a href="#">3</a>
										<a href="#"><i class="fa fa-angle-right"></i></a>
									</div>
								</div>
							</div>
							<?php }else{
								echo "<p style='text-align:center'><b>No Data</b></p>";
							} }?>
						</div>
					</div>
				</div>
		</section>


		<div class="instagram">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-4 p-0">
						<div class="instagram__item set-bg"
							style="background-image:url('<?php echo base_url(); ?>assets/images/instagram/insta-1.jpg')">
							<div class="instagram__text">
								<i class="fa fa-instagram"></i>
								<a href="#">@ ashion_shop</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 p-0">
						<div class="instagram__item set-bg"
							style="background-image:url('<?php echo base_url(); ?>assets/images/instagram/insta-2.jpg')">
							<div class="instagram__text">
								<i class="fa fa-instagram"></i>
								<a href="#">@ ashion_shop</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 p-0">
						<div class="instagram__item set-bg"
							style="background-image:url('<?php echo base_url(); ?>assets/images/instagram/insta-3.jpg')">
							<div class="instagram__text">
								<i class="fa fa-instagram"></i>
								<a href="#">@ ashion_shop</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 p-0">
						<div class="instagram__item set-bg"
							style="background-image:url('<?php echo base_url(); ?>assets/images/instagram/insta-4.jpg')">
							<div class="instagram__text">
								<i class="fa fa-instagram"></i>
								<a href="#">@ ashion_shop</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 p-0">
						<div class="instagram__item set-bg"
							style="background-image:url('<?php echo base_url(); ?>assets/images/instagram/insta-5.jpg')">
							<div class="instagram__text">
								<i class="fa fa-instagram"></i>
								<a href="#">@ ashion_shop</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 p-0">
						<div class="instagram__item set-bg"
							style="background-image:url('<?php echo base_url(); ?>assets/images/instagram/insta-6.jpg')">
							<div class="instagram__text">
								<i class="fa fa-instagram"></i>
								<a href="#">@ ashion_shop</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		function convertRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, "").toString(),
				split = number_string.split(","),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				var separator = sisa ? "." : "";
				rupiah += separator + ribuan.join(".");
			}

			rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
			return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
		}
		var price = $(".product__price").html();
		if (price != undefined) {
			var priceArray = price.split("<span>");
			var price1 = priceArray[0].trim();
			var price2Array = priceArray[1].split("</span>");
			var price2 = price2Array[0].trim();

			price1 = convertRupiah(price1, "Rp. ");
			price2 = convertRupiah(price2, "Rp. ");
			$(".product__price").html(price1 + "<span>" + price2 + "</span>");
		}

	</script>


	<?php $this->load->view('_partial_main/footer'); ?>
