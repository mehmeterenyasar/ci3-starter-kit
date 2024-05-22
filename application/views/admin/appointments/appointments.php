    <?php $this->load->view('admin/include/header'); ?>

    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <a class = "btn btn-primary text-white" href = "<?= base_url('appointments/create_appointment') ?>">Create Appointment</a>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <?php flashread();?>

                <div class = "row table-responsive">
                    <div class = "col-lg-12">
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">
                                    Appointments List
                                </h4>
                                <div class="table-responsive">

                                    <table class="table header-border" id = "randevuTable">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Name Surname</th>
                                                <th>Date</th>
                                                <th>E-mail</th>
                                                <th>Phone Number</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id = "randevular">
                                            <?php foreach($appointments as $index => $key) {?>
                                            <tr>
                                                <td>
                                                    <?php if ($key->status == 1) {?>
                                                    <a href="javascript:void(0)" class = "d-block btn btn-sm text-white btn-success">Completed</a>
                                                    <?php } elseif ($key->status == 2) { ?>
                                                    <a href="javascript:void(0)" class = "d-block btn btn-sm text-white btn-primary">Active</a>
                                                    <?php } elseif ($key->status == 0) {?>
                                                    <a href="javascript:void(0)" class = "d-block btn btn-sm text-white btn-warning">Past Due</a>
                                                    <?php } ?>
                                                </td>
                                                <td><?= $key->name_surname ?></td>
                                                <td>
                                                    <b class = "text-muted">
                                                        <?php echo date('m/d/Y - H:i', strtotime($key->date)); ?>
                                                            
                                                    </b>
                                                </td>
                                                <td><?php if (isset($key->email)) { echo $key->email; } else { echo '-'; }?></td>
                                                <td><?php if (isset($key->tel)) { echo '+'.$key->tel; }  else { echo '-'; }?></td>
                                                
                                                <td>
                        <?php if ( $key->message != null ) {?>
                                                    <button type="button" class="btn btn-info text-white btn-sm my-1" data-toggle="modal" data-target="#basicModal<?= $key->id ?>">Read Message <i class = "fa fa-envelope"></i></button>
        <!-- Modal -->
        <div class="modal fade" id="basicModal<?= $key->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?= $key->name_surname. ' | Message'?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><?= $key->message ?></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
                        <?php } ?>
                                                   <?php if($key->status == 0 || $key->status == 2) {?>
                                                    <a href="<?= base_url('appointments/appointment_complete/'.$key->id) ?>" class = "btn btn-success text-white btn-sm my-1">
                                                         Complete
                                                        <i class = "fa fa-check"></i>
                                                    </a>
                                                    <?php } ?>

                                                    <button type="button" class="btn btn-primary text-white btn-sm my-1" data-toggle="modal" data-target="#editModal<?= $key->id ?>">Edit
                                                     <i class = "fa fa-edit"></i>
                                                    </button>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $key->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?= $key->name_surname. ' | Edit'?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form">
                                    <form method = "POST" enctype="multipart/form-data" action = "<?= base_url('appointments/edit_appointment/'.$key->id) ?>">
                                        <br>

                                        <div class="form-group">
                                            <label><b>Name - Surname</b></label>
                                            <input value = "<?= $key->name_surname ?>" type = "text" name = "name_surname" class="form-control" placeholder="Name - Surname...">
                                        </div>

                                        <div class = "form-row">
                                            <div class="form-group col-lg-6">
                                                <label><b>E - Mail</b></label>
                                                <input value = "<?= $key->email ?>" type = "email" name = "email" class="form-control" placeholder="E - Mail...">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label><b>Phone Number</b></label>
                                                <input value = "<?= $key->tel ?>" type = "text" name = "tel" class="form-control" placeholder="Phone Number...">
                                            </div>

                                        </div>


                                        <div class = "form-row">
                                            <?php $date = $key->date;
                                                $dateTime = new DateTime($date);

                                                $date = $dateTime->format('Y-m-d');
                                                $time= $dateTime->format('H:i:s');

                                            ?>
                                            <div class="form-group col-lg-6">
                                                <label><b>Date</b></label>
                                                <input value = "<?= $date ?>" type = "date" name = "date" class="form-control" >
                                            </div>
                                            
                                            <div class="form-group col-lg-6">
                                                <label><b>Time</b></label>
                                                <input type = "time" value = "<?= $time ?>" class="form-control" name = "time" id="timepicker">   
                                            </div>
                                        </div>


                                        <div class = "form-group">
                                            <textarea rows = "4" name="message" class="form-control mt-2 text-muted" placeholder=""> <?= $key->message ?> 
                                            </textarea>
                                        </div>


                                </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>

                                    </form>
                    </div>
                </div>
            </div>
        </div>
                                                    

    
                                                    <a onclick="return confirm('Are you sure you want to delete the appointment?')" href="<?= base_url('appointments/delete_appointment/'.$key->id) ?>" class = "btn btn-danger btn-sm my-1">
                                                         Sil
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
        
      
    <?php $this->load->view('admin/include/footer'); ?>

