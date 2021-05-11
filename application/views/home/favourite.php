<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_main/header'); ?>
<style>
	td:nth-child(2) {
		padding-right: 40px;
	}

</style>

<body>
	<?php $this->load->view('_partial_main/navbar'); ?>
	<div class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__links">
						<a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a>
						<span>Favourite</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="shop-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shop__cart__table">
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Action</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($dataFavourite)){
									if(sizeof($dataFavourite) == 0){
										echo "<tr><td>No Data</td></tr>";
									}
									else{
									foreach($dataFavourite as $data){?>
								<tr>
									<td class="cart__product__item">
										<img src="<?php echo base_url(); ?>upload/product/<?php echo $data['product_url'] ?>"
											alt="" height=100 width=100>
										<div class="cart__product__item__title">
											<h6><?php echo $data['product_name'] ?></h6>
											<div class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
										</div>
									</td>
									<td class="cart__price"><?php echo $data['product_price'] ?></td>
									<td><button class="site-btn">Add to Cart</button></td>
									<td><a href="<?php echo $data['product_id'];?>" class="cart__close"><span
												class="icon_close"></span></a></td>
								</tr>
								<?php }}}else{?>
								<tr>
									<td>No Data</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		$('.cart__close').click(function (e) {
			e.preventDefault();
			var product_id = $(this).attr('href');
			$.ajax({
				url: "<?php echo site_url('favourite/addWishlist'); ?>",
				method: "POST",
				data: {
					product_id: product_id
				},
				context: this,
				async: true,
				dataType: 'text',
				success: function (data) {
					var html = '';
					var i;
					var datates = data.replace(/(<([^>]+)>)/ig, "").replace(/\r\n|\r|\n/g,
						"<br />");
					var datates2 = datates.replace(
						"<br />if (!window.console) console = {};console.log = console.log || function(){};console.warn = console.warn || function(){};console.error = console.error || function(){};console.info = console.info || function(){};console.debug = console.debug || function(){};",
						"");
					$someArray = jQuery.parseJSON(datates2);
					if ($someArray == true) {
						window.location.reload();
					}
				}
			});
		});
		var price = $(".cart__price").html();
		if (price != undefined) {
			$(".cart__price").html(convertRupiah(price, "Rp. "));
		}

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

	</script>


	<?php $this->load->view('_partial_main/footer'); ?>
