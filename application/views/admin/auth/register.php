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
						<h3 class="text-center font-weight-light my-4">Register</h3>
						<?php echo validation_errors(); ?>
					</div>
					<div class="card-body">
						<form method="POST" class="needs-validation" novalidate>
							<div class="form-floating mb-3">
								<input
									class="form-control <?php if (count($_POST) != 0) echo (form_error('username')!="") ? 'is-invalid' : 'is-valid'?>"
									id="username" name="username" type="text" placeholder="username" required
									value="<?php echo set_value('username'); ?>" />
								<label class="small mb-1" for="username">Username</label>
								<?php echo form_error('username', '<div class="invalid-feedback">', '</div>'); ?>
							</div>
							<div class="form-floating mb-3">

								<input
									class="form-control <?php if (count($_POST) != 0) echo (form_error('email')!="") ? 'is-invalid' : 'is-valid'?>"
									id="email" name="email" type="email" placeholder="name@example.com" required
									value="<?php echo set_value('email'); ?>" />
								<label class="small mb-1" for="email">Email</label>
								<?php echo form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
							</div>
							<div class="form-floating mb-3">

								<input
									class="form-control <?php if (count($_POST) != 0) echo (form_error('password')!="") ? 'is-invalid' : 'is-valid'?>"
									id="password" name="password" type="password" placeholder="password"
									autocomplete="on" required value="<?php echo set_value('password'); ?>" />
								<label class="small mb-1" for="password">Password</label>
								<?php echo form_error('password', '<div class="invalid-feedback">', '</div>'); ?>
							</div>
							<div class="form-floating mb-3">
								<input
									class="form-control <?php if (count($_POST) != 0) echo (form_error('confirm-password')!="") ? 'is-invalid' : 'is-valid'?>"
									id="confirm-password" name="confirm-password" type="password"
									placeholder="confirm-password" autocomplete="on" required
									value="<?php echo set_value('confirm-password'); ?>" />
								<label class="small mb-1" for="confirm-password">Confirm Password </label>
								<?php echo form_error('confirm-password', '<div class="invalid-feedback">', '</div>'); ?>
							</div>

							<div class="form-group mt-4 mb-0 d-grid">
								<button type="submit" class="btn btn-primary">Register Now</button>
							</div>

						</form>
					</div>
					<div class="text-center">
						<p>Already Have an account? <a href="login">Sign in</a></p>

					</div>
				</div>
			</div>
		</div>
		</main>
		<script>
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
						}

						form.classList.add('was-validated')
					}, false)
				})

		</script>
		<?php $this->load->view('_partial_main/footer'); ?>
