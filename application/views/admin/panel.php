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
                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('map'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-map text-dark "></i>
                                        <h5 class="card-title mt-3">Map Module</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('reporting'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-line-chart text-dark "></i>
                                        <h5 class="card-title mt-3">Reporting Module</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('appointments/appointment_management'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-calendar text-dark "></i>
                                        <h5 class="card-title mt-3">Appointment Module (Back)</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('messages'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-envelope text-dark "></i>
                                        <h5 class="card-title mt-3">Messages Module</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('user'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-users text-dark "></i>
                                        <h5 class="card-title mt-3">Admins</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('appointments/front_end'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-calendar text-dark "></i>
                                        <h5 class="card-title mt-3">Appointment Module (Front)</h5> 
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('changepassword'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-lock text-dark "></i>
                                        <h5 class="card-title mt-3">Change Password</h5> 
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('accounting/cash_registers'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-money text-dark "></i>
                                        <h5 class="card-title mt-3">Accounting Module (Cash Registers)</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class = "col-lg-4" id = "hoverable">
                        <a href = "<?php echo base_url('accounting/customers'); ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i style = "font-size:3rem;" class = "fa fa-user text-dark "></i>
                                        <h5 class="card-title mt-3">Accounting Module (Customers)</h5> 
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
      
    <?php $this->load->view('admin/include/footer'); ?>
