<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_admin/header'); ?>

<body class="sb-nav-fixed">
	<?php $this->load->view('_partial_admin/navbar'); ?>
	<div id="layoutSidenav">
		<?php $this->load->view('_partial_admin/sidebar'); ?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Product</h1>
					<div class="card mb-4">
						<div class="card-body">
							<a href="<?php echo base_url(); ?>admin/product/add-product" type="button"
								class="btn btn-primary float-right" style="margin-bottom:20px;">Add Product</a>

							<div class="table-responsive">

								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>

										<tr>
											<th>No</th>
											<th>Product Name</th>
											<th>Category</th>
											<th>Sub Category</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Stock</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Product Name</th>
											<th>Category</th>
											<th>Sub Category</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Stock</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $number = 0; ?>
										<?php if (sizeof($data) > 0) { ?>
										<!--<a href='#' class='btn btn-success'><i class='fas fa-edit' style='font-size:14px></i></a> -->
										<?php foreach ($data as $product) {
												$number++;
												echo "<tr>
                                                <td>" . $number . "</td>
                                                <td>" . $product['product_name'] . "</td>
                                                <td>" . $product['category_name'] . "</td>
                                                <td>" . $product['name'] . "</td>
                                                <td>" . $product['product_price'] . "</td>
                                                <td>" . $product['product_discount'] . "</td>
                                                <td>" . $product['product_stock'] . "</td>
												<td>
												<a href='" . base_url() . "admin/product/edit-product/" . $product['product_id'] . "' class='btn btn-success'><i class='fas fa-edit'></i></a>
												<a href='" . base_url() . "admin/product/delete-product/" . $product['product_id'] . "' class='btn btn-danger delete'><i class='fas fa-trash-alt'></i></a>
                                                </td>
                                               
                                                </tr>";
											}
											?>

										<?php
										} else {
											echo " <tr><td colspan='7'>No Data </td></tr>";
										} ?>
									</tbody>
								</table>

							</div>

						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<?php $this->load->view('_partial_admin/footer'); ?>
