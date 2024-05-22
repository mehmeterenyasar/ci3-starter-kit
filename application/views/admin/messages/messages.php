    <?php $this->load->view('admin/include/header'); ?>

    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <a class="btn btn-primary text-white" href = "<?php echo base_url('messages/send_message'); ?>">
                      Send Message
                    </a>
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
                                    Messages
                                </h4>

                                <div class="table-responsive">

                                    <table class="table header-border" id = "randevuTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>E-Mail</th>
                                                <th>Phone Number</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($messages as $index => $key) {?>
                                            <tr>
                                                <td><?= $key->name ?></td>
                                                <td>
                                                    <b class = "text-muted">
                                                        <?php echo date('m/d/Y', strtotime($key->date)); ?>
                                                            
                                                    </b>
                                                </td>
                                                <td><?php if (isset($key->email)) { echo $key->email; } else { echo '-'; }?></td>
                                                <td><?php if (isset($key->tel)) { echo '+'.$key->tel; }  else { echo '-'; }?></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-info text-white btn-sm my-1" data-toggle="modal" data-target="#basicModal<?= $key->id ?>"> Read Message <i class = "fa fa-envelope"></i></button>
<!-- Modal -->
<div class="modal fade" id="basicModal<?= $key->id ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $key->name. ' | Message'?></h5>
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

    
                                                    <a onclick="return confirm('Are you sure to delete the message')" href="<?= base_url('messages/delete_message/'.$key->id) ?>" class = "btn btn-danger btn-sm my-1">
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
        
      
    <?php $this->load->view('admin/include/footer'); ?>
