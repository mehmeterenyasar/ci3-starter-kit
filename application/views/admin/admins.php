    <?php $this->load->view('admin/include/header'); ?>

    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <div class ="row">
                    <div class = "col-lg-12">
                    <?php flashread(); ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Admins
                                    <button  type="button" data-toggle="modal" data-target="#add_user" class = "btn btn-primary text-white float-right">Add New User</button>
                                </h4>
                                <div class="table-responsive">

                                    <table class="table header-border" id = "randevuTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id = "randevular">
                                            
                                            <?php foreach($admins as $a) {?>    
                                                <tr>
                                                    <td><b><?= $a->id ?></b></td>
                                                    <td><b><?= $a->username ?></b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info text-white btn-sm my-1" data-toggle="modal" data-target="#editAdmin<?= $a->id ?>"> Edit <i class = "fa fa-edit"></i></button>
<!-- Modal -->
<div class="modal fade" id="editAdmin<?= $a->id ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method = "POST" action = "<?= base_url('user/edit_admin/'.$a->id) ?>">
                        <div class="form-group">
                            <label><b>Username</b></label>
                            <input name = "username" type="text" class="form-control" placeholder = "Username" value = "<?= $a->username ?>">
                        </div>

                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input name = "password" type="password" class="form-control" placeholder = "Password" value = "<?= $a->password ?>">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

                                                        <a onclick="return confirm('Are you sure you want to delete the user?')" href="<?= base_url('user/delete_admin/'.$a->id) ?>" class = "btn btn-danger btn-sm my-1">
                                                             Delete
                                                            <i class = "fa fa-remove"></i>
                                                        </a>
                                                    </td>

                                                </tr>


                                            <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        <!-- Modal -->
<div class="modal fade" id="add_user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" method = "POST" action = "<?= base_url('user/add_admin') ?>">
                <div class="form-group">
                    <label><b>Username</b></label>
                    <input name = "username" type="text" class="form-control" placeholder = "Username">
                </div>

                <div class="form-group">
                    <label><b>Password</b></label>
                    <input name = "password" type="password" class="form-control" placeholder = "Password">
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add User</button>
        </div>
            </form>
        </div>
    </div>
</div>
      
    <?php $this->load->view('admin/include/footer'); ?>
