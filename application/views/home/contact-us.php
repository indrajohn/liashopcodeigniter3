<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_main/header'); ?>

<body>
	<?php $this->load->view('_partial_main/navbar'); ?>
	<section class="contact spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="contact__content">
						<div class="contact__form">
							<h5>SEND MESSAGE</h5>
							<form action="#">
								<input type="text" placeholder="Name">
								<input type="text" placeholder="Email">
								<input type="text" placeholder="Website">
								<textarea placeholder="Message"></textarea>
								<button type="submit" class="site-btn">Send Message</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<?php $this->load->view('_partial_main/footer'); ?>
