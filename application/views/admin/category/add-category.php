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
                            <?php echo validation_errors(); ?>
                            <form action="<?php echo base_url(); ?>admin/add-category" method="POST">
                                <div class="form-group">
                                    <label for="productName">Category Name</label>
                                    <input type="text" name="categoryname" class="form-control" id="categoryname"
                                        aria-describedby="categoryname" placeholder="Enter Category Name">
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('_partial_admin/footer'); ?>