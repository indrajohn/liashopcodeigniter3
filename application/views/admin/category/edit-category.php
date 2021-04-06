<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('_partial_admin/header'); ?>

<body class="sb-nav-fixed">
    <?php $this->load->view('_partial_admin/navbar'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('_partial_admin/sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid">
                    <div class="card mb-4" style="margin-top:30px;">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>admin/edit-category" method="POST">
                                <input type="hidden" id="category_id" name="category_id"
                                    value=" <?php echo $data->category_id ?>">
                                <div class="form-group">
                                    <label for="productName">Category Name<?php echo $data->category_id ?></label>

                                    <input type="text" name="categoryname" class="form-control" id="categoryname"
                                        aria-describedby="categoryname" value=" <?php echo $data->category_name ?>"
                                        placeholder="Enter Category Name">
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <?php $this->load->view('_partial_admin/footer'); ?>