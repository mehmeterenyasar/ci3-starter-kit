    <?php $this->load->view('admin/include/header'); ?>

    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <a class = "btn btn-primary text-white" href = ""  data-toggle="modal" data-target="#addCustomer">Add Customer</a>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <div class ="row">
                    <div class = "col-lg-12">
                        <div class="card my-4">
                            <div class="card-header pt-3 border-bottom">
                                <h3 class="card-title flex-column">Customers List</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="myTable">
                                        <thead>
                                            <tr class="border-0">
                                                <th>Customer's Name</th>
                                                <th>USD ($) Balance</th>
                                                <th>EUR (€) Balance</th>
                                                <th>GBP (£) Balance</th>
                                                <th>TRY (₺) Balance</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach($customers as $index => $key) {
$try_input = transaction_history::sum('input' , ['currency' => 'try', 'customer_id' => $key->id]);
$try_output = transaction_history::sum('output' , ['currency' => 'try', 'customer_id' => $key->id]);
$try = $try_input - $try_output;

$usd_input = transaction_history::sum('input' , ['currency' => 'usd', 'customer_id' => $key->id]);
$usd_output = transaction_history::sum('output' , ['currency' => 'usd', 'customer_id' => $key->id]);
$usd = $usd_input - $usd_output;

$eur_input = transaction_history::sum('input' , ['currency' => 'eur', 'customer_id' => $key->id]);
$eur_output = transaction_history::sum('output' , ['currency' => 'eur', 'customer_id' => $key->id]);
$eur = $eur_input - $eur_output;

$gbp_input = transaction_history::sum('input' , ['currency' => 'gbp', 'customer_id' => $key->id]);
$gbp_output = transaction_history::sum('output' , ['currency' => 'gbp', 'customer_id' => $key->id]);
$gbp = $gbp_input - $gbp_output;
?>
                                        
                                <tr class = "text-uppercase">
                                    <td>
                                        <a href="<?php echo base_url('accounting/customer_detail/'.$key->id); ?>"  style = "font-size:.9rem;"><?= $key->customer ?></a>
                                    </td>

                                    <td >
                                        <?php if ( $usd < 0) {  ?>
                                            <span class="badge badge-success text-white" ><?php echo abs( $usd); ?> $ Creditor</span>
                                        <?php } elseif ($usd > 0) { ?>
                                            <span class="badge badge-danger"><?= $usd ?> $ Debtor</span>
                                        <?php } else { echo '-'; } ?>

                                    </td>

                                    <td>
                                        <?php if ( $eur < 0) {  ?>
                                            <span class="badge badge-success text-white"><?php echo abs( $eur); ?> € Creditor</span>
                                        <?php } elseif ($eur > 0) { ?>
                                            <span class="badge badge-danger"><?= $eur ?> € Debtor</span>
                                        <?php } else { echo '-'; } ?>
                                    </td>

                                    <td>
                                        <?php if ( $gbp < 0) {  ?>
                                            <span class="badge badge-success text-white"><?php echo abs( $gbp); ?> £ Creditor</span>
                                        <?php } elseif ($gbp > 0) { ?>
                                            <span class="badge badge-danger"><?= $gbp ?> £ Debtor</span>
                                        <?php } else { echo '-'; } ?>
                                    </td>

                                    <td>
                                        <?php if ( $try < 0) {  ?>
                                            <span class="badge badge-success text-white"><?php echo abs( $try); ?> ₺ Creditor</span>
                                        <?php } elseif ($try > 0) { ?>
                                            <span class="badge badge-danger"><?= $try ?> ₺ Debtor</span>
                                        <?php } else { echo '-'; } ?>
                                    </td>
                                    

                                    <td class="text-end">                                                           
                                        <a class="btn btn-danger" href="<?= base_url('accounting/delete_customer/'.$key->id) ?>" onclick="return confirm('Are you sure to delete this customer?')">
                                            <i class="fa fa-trash text-white"> </i>
                                        </a>

                                        <a  data-toggle="modal" data-target="#editCustomer<?=$key->id?>" class="btn btn-primary">
                                            <i class="fa fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr> 



            <!--begin::Modal Edit Customer-->
            <div class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" id="editCustomer<?=$key->id?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-10">
                                <form  action="<?php echo base_url('accounting/edit_customer/'.$key->id); ?>" method ="POST" enctype="multipart/form-data">
                                        <div class="row g-9 ">
                                            <div class="col-md-12 fv-row">
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                        <span class="required">Customer's Name</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input value = "<?= $key->customer ?>" class="form-control form-control-solid" placeholder="Customer's Name" name="customer" />
                                                </div>
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
            <!--end::Modal-->


                                                <?php  } ?>

                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
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
        







<!--begin::Modal Add Customer--> 
<div class="modal fade" tabindex="-1"  role="dialog" aria-hidden="true"  id="addCustomer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="mb-10">
                    <form  action="<?php echo base_url('accounting/add_customer'); ?>" method ="POST" enctype="multipart/form-data">
                        <div class="row g-9 ">
                            <div class="col-md-12 fv-row">
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Customer's Name</span>
                                    </label>
                                    <input class="form-control form-control-solid" placeholder="Customer's Name" name="customer" />
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Add Customer</button>
            </div>
                </form>
        </div>
    </div>
</div>
<!--end::Modal-->

      
    <?php $this->load->view('admin/include/footer'); ?>
