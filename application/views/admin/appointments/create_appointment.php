    <?php $this->load->view('admin/include/header'); ?>



    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <a href="<?= base_url('appointments/appointment_management') ?>" class = "btn btn-primary ">
                        Appointments List
                        <i class = "fa fa-calendar-check-o  mx-1"></i>

                    </a>
                </div>
            </div>
            <!-- row -->


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php flashread(); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div >
                                            <div class="card-body">
                                                <div class="basic-form ">
                                                    <form method = "POST" enctype="multipart/form-data" action = "<?= base_url('appointments/shift') ?>"> 

                                                        <div class="form-group">
                                                            <h4 class = "card-title">Dates to Schedule Appointments</h4>
                                                            <div class="form-row">
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label><b>Starting</b></label>
                                                                    <div class="input-group">
                                                                        <input type="date" class="form-control" name = "starting_date"> 
                                                                    </div>
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label><b>Ending</b></label>
                                                                    <div class="input-group">
                                                                        <input  type="date" class="form-control" name = "ending_date"> 
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <h5>Pick Holidays</h5>
                                                                    <label for = "saturday" class = "mx-2 my-2"><b>Saturday</b></label>
                                                                    <input type="checkbox" name="saturday" value="1">

                                                                    <label for = "sunday" class = "mx-2 my-2"><b>Sunday</b></label>
                                                                    <input type="checkbox"  name="sunday" value="1"><br>
                                                                </div>

                                                                <div class = "form-group col-md-6">
                                                                    <div class="form-row">
                                                                        <label class = "mx-2 my-2"><b>Working  Hours: </b></label>
                                                                        <div class = "p-1 d-flex flex-column">
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_08" value="1"> 08:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_09" value="1"> 09:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_10" value="1"> 10:00
                                                                        </div>
                                                                        <div class = "p-1 d-flex flex-column mx-4">
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_11" value="1"> 11:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_12" value="1"> 12:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_13" value="1"> 13:00
                                                                        </div>
                                                                        <div class = "p-1 d-flex flex-column">
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_14" value="1"> 14:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_15" value="1"> 15:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_16" value="1"> 16:00
                                                                            <input class = "mx-2 my-2" type="checkbox" name="hour_17" value="1"> 17:00
                                                                        </div>


                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        <button type="submit" class="btn btn-primary float-right">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>
     
    
      
<?php $this->load->view('admin/include/footer'); ?>

