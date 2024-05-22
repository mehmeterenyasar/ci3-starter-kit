<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#addRegister">
                  Add Cash Register
                </button>
                
            </div>
        </div>
        <!-- row --> 
 
        <div class="container-fluid">

            <div class ="row">
                <?php 
                  $registers = cash_registers::select(); 

                  foreach ( $registers as $register) { ?>

                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><a href = "<?php echo base_url('accounting/register_detail/'.$register->id); ?>"><?php echo $register->name; ?></a> </h5>
                        <hr>
                        
                        <a href = "<?php echo base_url('accounting/register_detail/'.$register->id); ?>">
                              <i class = "fa fa-money text-dark" style = "font-size: 5rem;"></i>
                            </a> 

                            <?php 



      $try_input = transaction_history::sum('input' , ['currency' => 'try',  'register_id' => $register->id]);
      $try_output = transaction_history::sum('output' , ['currency' => 'try',  'register_id' => $register->id]);
      $try = $try_input - $try_output;

      $usd_input = transaction_history::sum('input' , ['currency' => 'usd',  'register_id' => $register->id]);
      $usd_output = transaction_history::sum('output' , ['currency' => 'usd',  'register_id' => $register->id]);
      $usd = $usd_input - $usd_output;

      $eur_input = transaction_history::sum('input' , ['currency' => 'eur',  'register_id' => $register->id]);
      $eur_output = transaction_history::sum('output' , ['currency' => 'eur',  'register_id' => $register->id]);
      $eur = $eur_input - $eur_output;

      $gbp_input = transaction_history::sum('input' , ['currency' => 'gbp',  'register_id' => $register->id]);
      $gbp_output = transaction_history::sum('output' , ['currency' => 'gbp',  'register_id' => $register->id]);
      $gbp = $gbp_input - $gbp_output;


                            ?>

<br>
<br>
                            <span class ="">

                                Total: 
                                <?php 
                                if ( $try < 0) { echo '<span class = "text-danger">'. $try .' ₺ </span>'; } 
                                elseif($try > 0) { echo '<span class = "text-success">'. $try .' ₺ </span>'; } 
                                else { echo $try; } 
                                echo ' | '; 
                                if ( $usd < 0) { echo '<span class = "text-danger">'. $usd .' $ </span>'; } 
                                elseif($usd > 0) { echo '<span class = "text-success">'. $usd .' $ </span>'; } 
                                else { echo $usd; } 
                                echo ' | '; 
                                if ( $eur < 0) { echo '<span class = "text-danger">'. $eur .' € </span>'; } 
                                elseif($eur > 0) { echo '<span class = "text-success">'. $eur .' € </span>'; } 
                                else { echo $eur; } 
                                echo ' | '; 
                                if ( $gbp < 0) { echo '<span class = "text-danger">'. $gbp .' £ </span>'; } 
                                elseif($gbp > 0) { echo '<span class = "text-success">'. $gbp .' £ </span>'; } 
                                else { echo $gbp; } 

                                ?>
                            </span>

                            <hr>
                            <div class = "d-flex justify-content-center">
                              <a type="button" href = "<?php echo base_url('accounting/register_detail/'.$register->id); ?>" class="btn btn-success mx-2"><i class="fa fa-book text-white"></i> </a>



                              <button type="button"  data-toggle="modal" data-target="#editRegister<?=$register->id?>" class="btn btn-primary">
                                <i class="fa fa-edit text-white"></i>
                              </button>

                              <a class="btn btn-danger mx-2" href="<?= base_url('accounting/delete_register/'.$register->id) ?>" onclick="return confirm('Are you sure to delete this register?')">
                                <i class="fa fa-trash text-white"> </i>
                              </a>
                            </div>
                      </div>
                    </div>
                  </div>








<!-- Edit Register Modal -->
<div class="modal fade" id="editRegister<?= $register->id ?>" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit | <?= $register->name ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url('accounting/edit_register/'.$register->id); ?>" method ="POST" enctype="multipart/form-data">
          <div class="row g-9 ">
            <div class="col-md-12 fv-row">
              <div class="d-flex flex-column fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                  <span class="required">Name</span>
                </label>
                <!--end::Label-->
                <input class="form-control form-control-solid" placeholder="Name" name="name"  required value = "<?= $register->name ?>"/>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>


                  <?php } ?>
            </div>

        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


<!-- Modal -->
<div class="modal fade" id="addRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Cash Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url('accounting/add_register'); ?>" method ="POST" enctype="multipart/form-data">
          <div class="row g-9 ">
            <div class="col-md-12 fv-row">
              <div class="d-flex flex-column fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                  <span class="required">Name</span>
                </label>
                <!--end::Label-->
                <input class="form-control form-control-solid" placeholder="Name" name="name"  required />
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

    
  
<?php $this->load->view('admin/include/footer'); ?>
