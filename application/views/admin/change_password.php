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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <h4 class="alert-heading">Reset Password</h4>
                                    <hr>
                                    <?php flashread(); ?>
                                    <div class = "col-lg-6 mx-auto">
                                        <form action="<?php echo base_url('changepassword/reset'); ?>" method ="POST" enctype="multipart/form-data" id="change-password-form">
                                            <div class="form-group">
                                                <label for="old_password">Old Password</label>
                                                <input type="password" class="form-control" id="old_password" name="old_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password_match">New Password (Again)</label>
                                                <input type="password" class="form-control" id="new_password_match" name="new_password_match" required>
                                            </div>
                                            <div id="password-match-message" class="text-danger" style="display: none;">Your new passwords should match!</div>
                                            <button type="submit" class="btn btn-primary float-right">Reset Password</button>
                                        </form>
                                    </div>
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
        
<script>
    $(document).ready(function () {
        $('#new_password, #new_password_match').on('keyup', function () {
            var newPassword = $('#new_password').val();
            var newPasswordMatch = $('#new_password_match').val();

            if (newPassword !== '' && newPasswordMatch !== '') {
                if (newPassword !== newPasswordMatch) {
                    $('#password-match-message').show();
                } else {
                    $('#password-match-message').hide();
                }
            } else {
                $('#password-match-message').hide();
            }
        });

        $('#change-password-form').on('submit', function (e) {
            var newPassword = $('#new_password').val();
            var newPasswordMatch = $('#new_password_match').val();

            if (newPassword !== newPasswordMatch) {
                e.preventDefault();
                alert('Your new passwords should match!');
            }
        });
    });
</script>


    <?php $this->load->view('admin/include/footer'); ?>
