<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="#"> <img src="assets/images/logo.png" /></a>
		<button class="navbar-toggler navbar-toggler-icon" type="button" data-bs-toggle="offcanvas"
			data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
			aria-label="Toggle navigation">

		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mx-auto toolbar-link">
				<li class="nav-item" style="cursor:default">
					<a class="nav-link <?php if ($head == 'home') echo 'active' ?>" href="<?php echo base_url() ?>">
						Home
					</a>
				</li>
				<li class="nav-item ms-5" style="cursor:default">
					<a class="nav-link <?php if ($head == 'aboutus') echo 'active' ?>" href="about-us">
						About Us
					</a>
				</li>
				<li class="nav-item ms-5" style="cursor:default">
					<a class="nav-link <?php if ($head == 'product') echo 'active' ?>" href="product">
						Product
					</a>
				</li>
				<li class="nav-item ms-5" style="cursor:default">
					<a class="nav-link <?php if ($head == 'contactus') echo 'active' ?>" href="contact-us">
						Contact us
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->

				<li class="nav-item">
					<a class="nav-link" href="#"> <i class="fas fa-search"></i> </a>
				</li>
				<li class="nav-item" style="cursor:default">
					<div class="nav-link" href=""> | </div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fas fa-user"></i>
					</a>


				</li>
				<?php
                if ($this->session->userdata('username') != null) {
                    echo "<li class='nav-item' style='cursor:default'>
                      		  <div class='nav-link' href=''> | </div>
                    	  </li>
							<li class='nav-item'>
								<a class='nav-link' href='cart'> <i class='fas fa-shopping-cart'></i> </a>
							</li>
                      ";
                }
                ?>

			</ul>
		</div>
		<div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNavAltMarkup"
			aria-labelledby="navbarNavAltMarkup">
			<div class="navbar-nav mr-auto toolbar-link">
				<div class="offcanvas-close" data-bs-toggle="offcanvas" data-bs-target="#navbarNavAltMarkup"
					aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">+</div>
				<div class="offcanvas-content ms-2">
					<li class="nav-item mb-4" style="cursor:default">
						<a class="navbar-brand" href="#"> <img src="assets/images/logo.png" /></a>
					</li>
					<li class="nav-item" style="cursor:default">
						<a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li class="nav-item" style="cursor:default">
						<a class="nav-link" href="about-us">About Us</a>
					</li>
					<li class="nav-item" style="cursor:default">
						<a class="nav-link" href="product">Product</a>
					</li>
					<li class="nav-item" style="cursor:default">
						<a class="nav-link" href="contact-us">Contact Us</a>
					</li>
				</div>
			</div>
		</div>
	</div>
</nav>
