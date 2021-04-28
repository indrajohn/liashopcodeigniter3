<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_main/header'); ?>

<body>
	<?php $this->load->view('_partial_main/navbar'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="card shadow-lg border-0 rounded-lg mt-5" style="height:600px;">
					<div class="card-body text-center">
						<img src="<?php echo base_url();?>/assets/images/logo.png">
						<p class="text-center font-weight-light my-4">Thanks for joining</p>
						<h2>Your Registration is Complete.</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('_partial_main/footer'); ?>
