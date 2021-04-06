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
					</div>

					<div class="card-body">
						<form method="post" action="<?php echo base_url(); ?>login">
							<div class="form-floating mb-3">
								<input class="form-control" id="username" name="username" type="text"
									placeholder="username" required />
								<label class="small mb-1" for="username">Username</label>
							</div>
							<div class="form-floating mb-3">

								<input class="form-control" id="email" name="email" type="email" placeholder="email"
									required />
								<label class="small mb-1" for="email">Email</label>
							</div>
							<div class="form-floating mb-3">

								<input class="form-control" id="password" name="password" type="password"
									placeholder="password" autocomplete="on" required />
								<label class="small mb-1" for="password">Password</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="confirm-password" name="confirm-password"
									type="password" placeholder="confirm-password" autocomplete="on" required />
								<label class="small mb-1" for="confirm-password">Confirm Password</label>
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

		<?php $this->load->view('_partial_main/footer'); ?>
