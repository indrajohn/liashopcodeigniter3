<!DOCTYPE html>
<html lang="en">
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
                            <input id="status-error" type="hidden" value="<?php echo validation_errors(); ?>">
                            <input id="status-success" type="hidden" value="<?php echo $success ?>">
                            <input id="action" type="hidden" value="<?php echo $action ?>">
                            <?php if ($action == 'add') { ?>
                            <form action="<?php echo base_url(); ?>admin/product/add-product" id="productForm"
                                name="productForm" method="POST" enctype="multipart/form-data">
                                <?php } else { ?>
                                <form
                                    action="<?php echo base_url(); ?>admin/product/edit-product/<?php echo $this->uri->segment(4); ?>"
                                    method="POST" name="productForm" enctype="multipart/form-data">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for="productName">Product Name</label>
                                        <input type="text" name="productName" class="form-control" id="productName"
                                            aria-describedby="productName" placeholder="Enter Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        <img class="image-preview" id="blah" src="#" alt="images" />
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option values="0" selected>--Select Category--</option>
                                            <?php foreach ($category as $category) {
                                                echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_category">Sub Category</label>
                                        <select id="sub_category" name="sub_category" class="form-control">
                                            <option values="0" selected>--Select Sub Category--</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pod_desc">Product Desc</label>
                                        <textarea class="form-control" name="pod_desc" id="prod"
                                            rows="5">44444</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control rupiah" id="price" name="price"
                                            placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" class="form-control number" id="discount"
                                            placeholder="Discount">
                                        <small> in percent *</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" class="form-control number" id="stock"
                                            placeholder="Stock">
                                    </div>
                                    <button type="submit" name="submit" id="submit"
                                        class="btn btn-primary">Submit</button>
                                </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <script>
    jQuery(function($) {
        var status = $('#status-error').val();
        var success = $('#status-success').val();
        var action = $('#action').val();
        if (status != "") {
            Swal.fire('Error', status, 'warning').then((result) => {
                window.location.href = window.location.href;
            });
        }
        if (success == 1) {
            if (action == 'add') {
                Swal.fire('Success', 'Category is Added', 'success').then((result) => {
                    window.location.href = window.location.href;
                });
            } else {
                Swal.fire('Success', 'Category is Edited', 'success').then((result) => {
                    window.history.go(-2);
                });
            }
        } else if (success != 0 && success != 1) {
            Swal.fire('Error', success, 'warning').then((result) => {
                window.location.href = window.location.href;
            });
        }

        $('#category').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/product/get_sub_category'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'text',
                success: function(data) {

                    var html = '';
                    var i;
                    var datates = data.replace(/(<([^>]+)>)/ig, "").replace(/\r\n|\r|\n/g,
                        "<br />");
                    var datates2 = datates.replace(
                        "<br />if (!window.console) console = {};console.log = console.log || function(){};console.warn = console.warn || function(){};console.error = console.error || function(){};console.info = console.info || function(){};console.debug = console.debug || function(){};",
                        "");
                    $someArray = jQuery.parseJSON(datates2);
                    console.log($someArray);
                    html = "<option value=''>--Select Sub Category--</option>";
                    for (i = 0; i < $someArray.length; i++) {
                        html += '<option value=' + $someArray[i].sub_category_id + '>' +
                            $someArray[i]
                            .name + '</option>';
                    }
                    $('#sub_category').html(html);
                }
            });
            return false;
        });
    });
    </script>
    <?php $this->load->view('_partial_admin/footer'); ?>