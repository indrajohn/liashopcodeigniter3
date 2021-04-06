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
						<h3 class="text-center font-weight-light my-4">Forgot Password</h3>
					</div>
					<div class="card-body">
						<?php if($has_error == 'false'){
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							Wrong Username or Password
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";
                        }?>

						<form method="post" action="login" class="needs-validation">
							<div class="form-floating  mb-3">
								<input class="form-control" id="email" name="email" type="email" placeholder="email"
									required />
								<label class="small mb-1" for="email">Email</label>
							</div>

							<div class="form-group mt-4 mb-0 d-grid">
								<button type="submit" class="btn btn-primary">Reset Password</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('_partial_main/footer'); ?>
