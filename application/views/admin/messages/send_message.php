    <?php $this->load->view('admin/include/header'); ?>

    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <a class="btn btn-primary text-white" href = "<?php echo base_url('messages'); ?>">
                      View Messages
                    </a>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <div class ="row">
                    <div class = "col-lg-12">
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">
                                    Send Message
                                </h4>
                            <form action="<?php echo base_url('messages/send_message'); ?>" method ="POST" enctype="multipart/form-data">
                                <div class = "d-flex">
                                    <div class = "col-lg-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class = "form-control" placeholder="Name" required>
                                    </div>

                                    <div class = "col-lg-6">
                                        <label>Date</label>
                                        <input type="date" name="date" class = "form-control" placeholder="date" required>
                                    </div>
                                </div>

                                <div class = "d-flex my-4">
                                    <div class = "col-lg-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class = "form-control" placeholder="Email" required>
                                    </div>

                                    <div class = "col-lg-6">
                                        <label>Phone Number</label>
                                        <input type="text" name="tel" class = "form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>


                                <div class = "d-flex my-4">
                                    <div class = "col-lg-12">
                                        <label>Your Message</label>
                                        <textarea required placeholder = "Your Message.." rows = "5" name = "message" class = "form-control"></textarea>
                                    </div>
                                </div>

                                <button type = "submit" class = "btn btn-primary float-right mx-3"> Submit </button>
                            </form>
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
