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
                                <div class="alert alert-success">
                                    <h4 class="alert-heading">Appointment Booked!</h4>
                                    <hr>
                                    <p>
                                        Dear <?= $appointment->name_surname ?>, 
                                        <br>
                                        <?php $date = date('d/m/Y - H:i', strtotime($appointment->date)); ?>
                                        Appointment Date: <?= $date ?>
                                        <br>
                                        <?php if( $appointment->email != null ) { ?>
                                        E-Mail: <?= $appointment->email ?> <br>
                                        <?php } ?>
                                        <?php if( $appointment->tel != null ) { ?>
                                        Phone Number: <?= $appointment->tel ?> <br>
                                        <?php } ?>
                                        <br>
                                        Your appointment details are as follows. Please be present at our clinic on the appointment date. 
                                    </p>
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
    
  
<?php $this->load->view('admin/include/footer'); ?>
