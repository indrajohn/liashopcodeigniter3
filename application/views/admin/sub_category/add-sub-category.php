<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
							<form action="<?php echo base_url(); ?>admin/sub-category/add-sub-category" method="POST">
								<?php }else{ ?>
								<form
									action="<?php echo base_url(); ?>admin/sub-category/edit-sub-category/<?php echo $this->uri->segment(4); ?>"
									method="POST">
									<?php } ?>
									<div class="form-group">
										<label for="subcategoryname">Sub Category Name</label>
										<input type="text" name="subcategoryname" class="form-control" id="categoryname"
											aria-describedby="subcategoryname" placeholder="Enter Sub Category Name"
											value="<?php if(isset($data)) echo $data->name ?>">
									</div>
									<div class="form-group">
										<label for="category">Select Category</label>
										<select class="form-control" id="category" name="category">
											<option value="">--Select Category--</option>
											<?php foreach ($category as $category1) { 
												echo json_encode($data);
                                            echo "<option value='".$category1['category_id']."' ". (($category1['category_id'] == $data->category_id) ? "selected" : ""). ">
                                                ".$category1['category_name']."
                                            </option>";
										}?>
										</select>
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

		});

	</script>
	<?php $this->load->view('_partial_admin/footer'); ?>
