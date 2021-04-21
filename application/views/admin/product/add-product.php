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
							<?php if($action == 'add'){ ?>
							<form action="<?php echo base_url(); ?>admin/product/add-product" id="productForm"
								method="POST" enctype="multipart/form-data">
								<?php }else{ ?>
								<form
									action="<?php echo base_url(); ?>admin/product/edit-product/<?php echo $this->uri->segment(4);?>"
									method="POST" enctype="multipart/form-data">
									<?php } ?>
									<div class="form-group">
										<label for="productName">Product Name</label>
										<input type="text" name="productName" class="form-control" id="productName"
											aria-describedby="productName" placeholder="Enter Product Name">
									</div>
									<div class="form-group">
										<label for="image">Image</label>
										<input type="file" class="form-control-file" id="image" name="image">
										<img class="image-preview" id="blah" src="#" alt="images" style="display:none"
											style="width:250px;width:250px; margin:10px;" />
									</div>
									<div class="form-group">
										<label for="category">Category</label>
										<select id="category" name="category" class="form-control">
											<option values="0" selected>--Select Category--</option>
											<?php foreach ($category as $category) {
                                            echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
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
										<label for="product_desc">Product Desc</label>
										<textarea class="form-control" name="product_desc" id="product_desc"
											rows="5"></textarea>
									</div>
									<div class="form-group">
										<label for="price">Price</label>
										<input type="number" name="price" class="form-control" id="price"
											placeholder="Price">
									</div>
									<div class="form-group">
										<label for="discount">Discount</label>
										<input type="number" name="discount" class="form-control" id="discount"
											placeholder="Discount">
										<small> in percent *</small>
									</div>
									<div class="form-group">
										<label for="stock">Stock</label>
										<input type="number" name="stock" class="form-control" id="stock"
											placeholder="Stock">
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
	<script>
		jQuery(function ($) {
					var status = $('#status-error').val();
					var success = $('#status-success').val();
					var action = $('#action').val();
					console.log(success);
					if (status != "") {
						Swal.fire('Error', status, 'warning').then((result) => {
							window.location.href = window.location.href;
						});
					}
					if (success == 1) {
						if (action == 'add') {
							Swal.fire('Success', 'Category is Added', 'success').then((result) => {
								window.location.href = window.location.href;
							});
						} else {
							Swal.fire('Success', 'Category is Edited', 'success').then((result) => {
								window.history.go(-2);
							});
						}
					}

					$('#category').change(function () {
								var id = $(this).val();
								$.ajax({
											url: "<?php echo site_url('admin/product/get_sub_category');?>",
											method: "POST",
											data: {
												id: id
											},
											async: true,
											dataType: 'text',
											success: function (data) {

													var html = '';
													var i;
													var datatest = data.replace(
															"<script type='text/javascript'>if (!window.console) console = " +
															"{};console.log = console.log || function(){};console.warn = console.warn || function(){};console.error = console.error ||" +
															" function(){};console.info = console.info || function(){};console.debug = console.debug || function(){};" +
															"

	</script>", "")
	console.log(datatest);
	for (i = 0; i < data.length; i++) { html +='<option value=' + data[i].subcategory_id + '>' + data[i]
		.subcategory_name + '</option>' ; } $('#sub_category').html(html); } }); return false; }); function
		readURL(input) { if (input.files && input.files[0]) { var reader=new FileReader(); reader.onload=function (e) {
		$('#blah').css("display", "block" ); $('#blah').attr('src', e.target.result); }
		reader.readAsDataURL(input.files[0]); } } $("#image").change(function () { readURL(this); }); }); </script>
		<?php $this->load->view('_partial_admin/footer'); ?>
