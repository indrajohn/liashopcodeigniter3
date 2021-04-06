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
                    <h1 class="mt-4">Product</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>admin/add-product" type="button"
                                class="btn btn-primary float-right" style="margin-bottom:20px;">Add Product</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!--<a href='#' class='btn btn-success'><i class='fas fa-edit' style='font-size:14px></i></a> -->
                                        <?php foreach ($data as $product) {
                                            echo "<tr>
                                                <td>" . $product['product_name'] . "</td>
                                                <td>" . $product['category_name'] . "</td>
                                                <td>" . $product['product_price'] . "</td>
                                                <td>" . $product['product_discount'] . "</td>
                                                <td>" . $product['product_stock'] . "</td>
                                                <td>
                                                    <form action='" . base_url() . "admin/edit-product' method='POST' style='float:left;margin-right:5px;'>
                                                        <input type='hidden' value='" . $product['product_id'] . "' name='id' />
                                                        <input type='submit' class='btn btn-success' value='&#xf044;' style='font-family: Font Awesome\ 5 Free;'/>
                                                    </form>
                                                    <form action='" . base_url() . "admin/delete-product' method='POST'>
                                                        <input type='hidden' value='" . $product['product_id'] . "' name='id' />
                                                        <input type='submit' class='btn btn-danger' value='&#xf2ed;' style='font-family: Font Awesome\ 5 Free;'/>
                                                    </form>
                                                </td>
                                                </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('_partial_admin/footer'); ?>