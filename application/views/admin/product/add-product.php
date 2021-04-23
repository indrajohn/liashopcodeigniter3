<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partial_admin/header'); ?>

<body class="sb-nav-fixed">
	<?php $this->load->view('_partial_admin/navbar'); ?>
	<div id="layoutSidenav">
		<?php $this->load->view('_partial_admin/sidebar'); ?>
		<div id="layoutSidenav_content">
			<section>
				<div class="container-fluid">
					<div class="card mb-4" style="margin-top:30px;">
						<div class="card-body">
							<input id="status-error" type="hidden" value="<?php echo validation_errors(); ?>">
							<input id="status-success" type="hidden" value="<?php echo $success ?>">
							<input id="action" type="hidden" value="<?php echo $action ?>">
							<input id="baseUrl" type="hidden" value="<?php echo base_url(); ?>">
							<input id="product" type="hidden"
								value="<?php if(isset($product)) echo htmlspecialchars(json_encode($product)) ?>">

							<?php if ($action == 'add') { ?>
							<form action="<?php echo base_url(); ?>admin/product/add-product" id="productForm"
								name="productForm" method="POST" enctype="multipart/form-data">
								<?php } else { ?>
								<form
									action="<?php echo base_url(); ?>admin/product/edit-product/<?php echo $this->uri->segment(4); ?>"
									method="POST" name="productForm" enctype="multipart/form-data">
									<?php } ?>
									<div class="form-group">
										<label for="productName">Product Name</label>
										<input type="text" name="productName" class="form-control" id="productName"
											aria-describedby="productName"
											value="<?php if(isset($product)) echo $product->product_name ?>"
											placeholder="Enter Product Name">
									</div>
									<div class="form-group">
										<label for="image">Image</label>
										<input type="file" class="form-control-file" id="image" name="image">
										<img class="image-preview" id="blah" src="#" alt="images" />
										<input type="hidden" id="url_photo" name="url_photo"
											value="<?php if(isset($product)) echo $product->product_url ?>">
									</div>
									<div class="form-group">
										<label for="category">Category</label>
										<select id="category" name="category" class="form-control">
											<option values="0" selected>--Select Category--</option>
											<?php foreach ($category as $category) {
                                                echo "<option value='" . $category['category_id'] . "' ". (($category['category_id'] == $product->category_id) ? "selected" : "").">" . $category['category_name'] . "</option>";
                                            } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="sub_category">Sub Category</label>
										<select id="sub_category" name="sub_category" class="form-control">
											<option values="0" selected>--Select Sub Category--</option>
										</select>
									</div>
									<div class="form-group">
										<label for="pod_desc">Product Desc</label>
										<textarea class="form-control" name="pod_desc" id="prod"
											rows="5"><?php if(isset($product)) echo $product->product_desc ?></textarea>
									</div>
									<div class="form-group">
										<label for="price">Price</label>
										<input type="text" class="form-control rupiah" id="price" name="price"
											placeholder="Price"
											value="<?php if(isset($product)) echo $product->product_price ?>">
									</div>
									<div class=" form-group">
										<label for="discount">Discount</label>
										<input type="number" name="discount" class="form-control number" id="discount"
											placeholder="Discount"
											oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="2"
											value="<?php if(isset($product)) echo $product->product_discount ?>">
										<small> in percent *</small>
									</div>
									<div class=" form-group">
										<label for="stock">Stock</label>
										<input type="number" name="stock" class="form-control number" id="stock"
											placeholder="Stock"
											value="<?php if(isset($product)) echo $product->product_stock ?>">
									</div>
									<button type="submit" name="submit" id="submit"
										class="btn btn-primary">Submit</button>
								</form>
						</div>
					</div>
				</div>
			</section>

		</div>
	</div>
	<script type="text/javascript">
		jQuery(function ($) {
			var baseUrl = $('#baseUrl').val();
			var status = $('#status-error').val();
			var success = $('#status-success').val();
			var action = $('#action').val();
			var product = $('#product').val();
			if (status != "") {
				Swal.fire('Error', status, 'warning').then((result) => {
					window.location.href = window.location.href;
				});
			}
			if (success == 1) {
				if (action == 'add') {
					Swal.fire('Success', 'Product is Added', 'success').then((result) => {
						window.location.href = window.location.href;
					});
				} else {
					Swal.fire('Success', 'Product is Edited', 'success').then((result) => {
						window.history.go(-2);
					});
				}
			} else if (success != 0 && success != 1) {
				Swal.fire('Error', success, 'warning').then((result) => {
					window.location.href = window.location.href;
				});
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
			if (product != "") {
				var productListArr = JSON.parse(product);
				console.log(productListArr);
				getDataSubCategory(productListArr['category_id']);
				$('#blah').css("display", "block");
				$('#blah').attr('src', baseUrl + "/upload/product/" + productListArr['product_url']);

				var rupiah = convertRupiah(productListArr['product_price'], "Rp. ");
				$('.rupiah').val(rupiah);
			}

			function getDataSubCategory(id) {
				$.ajax({
					url: "<?php echo site_url('admin/product/get_sub_category'); ?>",
					method: "POST",
					data: {
						id: id
					},
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
						console.log($someArray);
						html = "<option value=''>--Select Sub Category--</option>";
						if (product != "") {
							for (i = 0; i < $someArray.length; i++) {
								html += "<option value='" + $someArray[i].sub_category_id + "' " + ((
										$someArray[i].sub_category_id == productListArr[
											'sub_category_id']
									) ? "selected" : "") + ">" +
									$someArray[i]
									.name + "</option>";
							}
						} else {
							for (i = 0; i < $someArray.length; i++) {
								html += "<option value='" + $someArray[i].sub_category_id + "'>" +
									$someArray[i]
									.name + "</option>";
							}
						}
						$('#sub_category').html(html);
					}
				});
			}

			$('#category').change(function () {
				var id = $(this).val();
				getDataSubCategory(id);
				return false;
			});
		});

	</script>
	<?php $this->load->view('_partial_admin/footer'); ?>
