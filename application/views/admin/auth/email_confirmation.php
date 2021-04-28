<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_main/header'); ?>

<body>
	<?php $this->load->view('_partial_main/navbar'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="card shadow-lg border-0 rounded-lg mt-5">
					<div class="card-header">
						<h3 class="text-center font-weight-light my-4">Email Confirmation</h3>
					</div>
					<div class="card-body text-center">
						<h3 class="text-center font-weight-light my-4">Email Confirmation</h3>
						<p>We have sent email to to confirm the validity of our email address. After receiving the email
							follow the link provided to complete your registration.</p>
					</div>
					<div class="card-footer text-center">
						<p style="font-size:.7em">if you not got any email <a
								href="<?php echo base_url();?>email-confirmation/send-email?email=<?php if(isset($email)) echo $email?>">Resend
								confirmation mail</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('_partial_main/footer'); ?>
