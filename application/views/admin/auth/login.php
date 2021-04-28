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
						<h3 class="text-center font-weight-light my-4">Login</h3>
					</div>
					<div class="card-body">
						<?php if(isset($has_error)) if($has_error == 'user'){
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							Wrong Username or Password
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";
                        }?>
						<?php if(isset($has_error)) if($has_error == 'email' && isset($email)) echo "
						<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							Your Email address has not been confirmed.<br>Please click the link in the email we
							sent.<br><a href='".base_url()."login?email=".$email."'>Click here to resend it</a>
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";?>
						<form method="post" action="login" class="needs-validation">
							<div class="form-floating  mb-3">
								<input class="form-control" id="username" name="username" type="text"
									placeholder="username" required />
								<label class="small mb-1" for="username">Username</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="password" name="password" type="password" .
									placeholder="password" autocomplete="on" required />
								<label class="small mb-1" for="password">Password</label>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
									<label class="custom-control-label" for="rememberPasswordCheck">Remember
										password</label>
								</div>
							</div>
							<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
								<a class="small" href="forgot-password">Forgot Password?</a>
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="mt-5 fw-bold">
								<p>Don't have an account? <a href="register" class="text-primary">Register</a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('_partial_main/footer'); ?>
