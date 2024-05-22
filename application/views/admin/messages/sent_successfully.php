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
                                        <h4 class="alert-heading">Message Sent!</h4>
                                        <hr>
                                        <p>
                                            Dear <?= $message->name ?>, 
                                            <br>
                                            <?php $date = date('m/d/Y', strtotime($message->date)); ?>
                                            Date: <?= $date ?>
                                            <br>
                                            <?php if( $message->email != null ) { ?>
                                            E-Mail: <?= $message->email ?> <br>
                                            <?php } ?>
                                            <?php if( $message->tel != null ) { ?>
                                            Phone Number: <?= $message->tel ?> <br>
                                            <?php } ?>
                                            <br>
                                            We've taken your message. We will contact you by the information above.
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
