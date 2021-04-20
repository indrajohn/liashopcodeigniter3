<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Dashboard
				</a>
				<div class="sb-sidenav-menu-heading">Product</div>

				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
					aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Product
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse <?php if (isset($head) == 'category' || isset($head) == 'product') echo 'show' ?> "
					id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="category">Category</a>
						<a class="nav-link" href="sub-category">Sub Category</a>
						<a class="nav-link" href="product">Product</a>
					</nav>
				</div>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as:</div>
			Start Bootstrap
		</div>
	</nav>
</div>
