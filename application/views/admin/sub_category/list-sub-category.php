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
                    <h1 class="mt-4">Category</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>admin/sub-category/add-sub-category" type="button"
                                class="btn btn-primary float-right" style="margin-bottom:20px;">Add Sub Category</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Category Name</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Category Name</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $number = 0; ?>
                                        <?php if (sizeof($data) > 0) { ?>
                                        <!--<a href='#' class='btn btn-success'><i class='fas fa-edit' style='font-size:14px></i></a> -->
                                        <?php foreach ($data as $category) {
												$number++;
												echo "<tr>
                                                <td>" . $number . "</td>
                                                <td>" . $category['name'] . "</td>
												<td>" . $category['category_name'] . "</td>
												
                                                <td>
													<a href='" . base_url() . "admin/sub-category/edit-sub-category/" . $category['sub_category_id'] . "' class='btn btn-success'><i class='fas fa-edit'></i></a>
													<a href='" . base_url() . "admin/sub-category/delete-sub-category/" . $category['sub_category_id'] . "' class='btn btn-danger delete'><i class='fas fa-trash-alt'></i></a>
                                                </td>
                                                </tr>";
											}
											?>
                                        <?php } else {
											echo " <tr><td colspan='4'>No Data </td></tr>";
										} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
    jQuery(function($) {
        $('.delete').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = $(this).attr('href');
                    window.location.href = url;
                }
            })
        });
    });
    </script>
    <?php $this->load->view('_partial_admin/footer'); ?>