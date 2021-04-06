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
                            <form action="<?php echo base_url(); ?>admin/edit-product" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $data->product_id ?>" name="id" />
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" name="productName" class="form-control" id="productName"
                                        value="<?php echo $data->product_name ?>" aria-describedby="productName"
                                        placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="imageFile"></label>
                                    <?php if (isset($data->product_url) && $data->product_url != 'default.jpg') {
                                        echo  '<input type="hidden" value="' . $data->product_url . '" name="url_photo" />';
                                        echo '<img src="../upload/product/' . $data->product_url . '" alt="" id="imageFile" style="width:100px; height:100px;">';
                                    } else {
                                        echo ' <input type="file" class="form-control-file" name="image" id="imageFile">';
                                        echo '<img src="#" alt="" id="blah" style="visibility: hidden;width:100px; height:100px;">';
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="product_desc">Product Desc</label>
                                    <textarea class="form-control" name="product_desc" id="product_desc"
                                        rows="5"><?php echo $data->product_desc ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control">
                                        <option values="0" selected>Choose...</option>
                                        <?php foreach ($dataCategory as $category) {
                                            echo '<option value="' . $category['category_id'] . '" ' . (($category["category_id"] == $data->category_id) ? 'selected="selected"' : "") . '>' . $category['category_name'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" value="<?php echo $data->product_price ?>"
                                        class="form-control" id="price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" name="discount" class="form-control" id="discount"
                                        value="<?php echo $data->product_discount ?>" placeholder="Discount">
                                    <small> in percent *</small>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" class="form-control" id="stock"
                                        value="<?php echo $data->product_stock ?>" placeholder="Stock">
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <script type="text/javascript" defer>
    jQuery(function($) {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').style.visibility = "visible";
                    $('#blah').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imageFile").change(function() {
            readURL(this);
        });

    });
    </script>
    <?php $this->load->view('_partial_admin/footer'); ?>