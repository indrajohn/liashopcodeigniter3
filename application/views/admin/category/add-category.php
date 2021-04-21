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
							<form action="<?php echo base_url(); ?>admin/category/add-category" method="POST">
								<?php }else{ ?>
								<form
									action="<?php echo base_url(); ?>admin/category/edit-category/<?php echo $this->uri->segment(4); ?>"
									method="POST">
									<?php } ?>
									<div class="form-group">
										<label for="productName">Category Name</label>
										<input type="text" name="categoryname" class="form-control" id="categoryname"
											aria-describedby="categoryname" placeholder="Enter Category Name"
											value="<?php if(isset($data)) echo $data->category_name ?>">
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
