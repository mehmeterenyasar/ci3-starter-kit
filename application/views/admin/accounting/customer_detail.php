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

                	<div class = "col-lg-3 my-2">
						<div class="card alert alert-info">
							<div class="card-body">
								<div class="h4">TRY Incoming:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($try_input)) { echo $try_input; } else { echo 0; } ?> ₺</span></div>
								<div class="h4">TRY Outgoing:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($try_output)) { echo $try_output; } else { echo 0; } ?> ₺</span></div>
								<hr> 
								<div class="h4">TRY Total:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($try)) { echo abs($try); } else { echo 0; } ?> ₺</span>
									<br>
									<span class = "text-muted ">
										<?php if ($try < 0) { ?>
										<span class = "" style = "float:right;">Debtor</span>
										<?php } elseif ($try > 0) {?>
											<span class = "" style = "float:right;">Creditor</span>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div>
                	
                	<div class = "col-lg-3 my-2">
						<div class="card alert alert-success">
							<div class="card-body">
								<div class="h4">USD Incoming:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($usd_input)) { echo $usd_input; } else { echo 0; } ?> $</span></div>
								<div class="h4">USD Outgoing:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($usd_output)) { echo $usd_output; } else { echo 0; } ?> $</span></div>

								<hr>

								<div class="h4">USD Total:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($usd)) { echo  abs($usd); } else { echo 0; } ?> $</span>
									<br>
									<span class = "text-muted ">
										<?php if ($usd < 0) { ?>
										<span class = "" style = "float:right;">Debtor</span>
										<?php } elseif ($usd > 0) {?>
											<span class = "" style = "float:right;">Creditor</span>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class = "col-lg-3 my-2">
						<div class="card alert alert-primary">
							<div class="card-body">
								<div class="h4">EUR Incoming:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($eur_input)) { echo $eur_input; } else { echo 0; } ?> €</span></div>
								<div class="h4">EUR Outgoing:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($eur_output)) { echo $eur_output; } else { echo 0; } ?> €</span></div>
								<hr>
								<div class="h4">EUR Total:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($eur)) { echo  abs($eur); } else { echo 0; } ?> €</span>
									<br>
									<span class = "text-muted ">
										<?php if ($eur < 0) { ?>
										<span class = "" style = "float:right;">Debtor</span>
										<?php } elseif ($eur > 0) {?>
											<span class = "" style = "float:right;">Creditor</span>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class = "col-lg-3 my-2">
						<div class="card alert alert-warning">
							<div class="card-body">
								<div class="h4">GBP Incoming:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($gbp_input)) { echo $gbp_input; } else { echo 0; } ?> £</span></div>
								<div class="h4">GBP Outgoing:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($gbp_output)) { echo $gbp_output; } else { echo 0; } ?> £</span></div>
								<hr>
								<div class="h4">GBP:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?php if (isset($gbp)) { echo abs($gbp); } else { echo 0; } ?> £</span>
									<br>
									<span class = "text-muted ">
										<?php if ($gbp < 0) { ?>
										<span class = "" style = "float:right;">Debtor</span>
										<?php } elseif ($gbp > 0) {?>
											<span class = "" style = "float:right;">Creditor</span>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div>


                </div>

                <div class = "d-flex justify-content-between ">
					<div class = "d-flex" style = "width: 70%">
						<input class = "form-control" type="text" id="searchInput" onkeyup="filterFunc()" placeholder="Search...">

						<select class = "w-25 mx-3 form-control " id="operationDropdown" onchange="filterTable()">
						  <option value="">Type:</option>
						  <option value="Making Payment">Making Payment</option>
						  <option value="Receiving Payment">Receiving Payment</option>
						</select>

						<select class = "w-25 form-control " id="currencyDropdown" onchange="filterTable()">
						  <option value="">Currency:</option>
						  <option value="TRY">TRY</option>
						  <option value="USD">USD</option>
						  <option value="EUR">EUR</option>
						  <option value="GBP">GBP</option>
						</select>
					</div>
					

					<div class = "d-flex justify-content-end">
						<a href="" class=" btn btn-danger text-white" data-toggle="modal" data-target="#cashWithdrawal">Make Payment</a>
						<a href="" class="btn btn-success text-white  mx-1 " data-toggle="modal" data-target="#cashDeposit">Receive Payment</a>
					</div>
				</div>

				<div class="card my-4">
					<div class="card-header pt-3 border-bottom">
						<h3 class="card-title flex-column">Transaction History</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">

							<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="historyTable">
								<thead>
									<?php flashread(); ?>
									<tr class="border-0">
										<th >Date</th>
										<th>Description</th>
										<th >Incoming Amount</th>
										<th>Outgoing Amount</th>
										<th >Transaction Type</th>
										<th >Currency</th>
									</tr>
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<tbody id = "transactionHistoryBody">

								<?php foreach($transaction_history as $index => $key) { ?>
								
								<tr>
									
									<td>
										<span class="font-weight-bold "><?= $key->date ?></span>
									</td>
									<td>

										<?php if ( $key->description != NULL ) {?>
										<span  class="text-capitalize"><?= $key->description ?></span>
										<?php } else { echo ' - '; } ?>
									</td>
									<td>
										<?php if ( $key->input != 0 ) {?>
										<span  class="text-uppercase"><?= $key->input. ' ' . $key->currency ?></span>
										<?php } else { echo ' - '; } ?>
									</td>
									<td>
										<?php if ( $key->output != 0 ) {?>
										<span  class="text-dark text-uppercase"><?= $key->output. ' ' . $key->currency ?></span>
										<?php } else { echo ' - '; } ?>
									</td>
									<td>
										<?php if( $key->operation == 1 || $key->operation == 4) {?>
											<span class="badge badge-success text-white">Receiving Payment</span>
										<?php } elseif ( $key->operation == 2 || $key->operation == 3) { ?>
											<span class="badge badge-danger text-white">Making Payment</span>
										<?php } ?>
									</td>
									<td>
										<span class="text-uppercase text-dark fw-bold  d-block mb-1 fs-6"><?= $key->currency ?></span>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



 

<!--begin::Modal Make Payment-->
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="cashWithdrawal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Make Payment</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
            </div>

            <div class="modal-body">
                <div class="mb-10">
                    


                    <form  action="<?php echo base_url('accounting/customer_make_payment/'.$this->uri->segment(3)); ?>" method ="POST" enctype="multipart/form-data">
							<!--begin::Input group-->
							<div class="row g-9 ">

								<div class = "col-md-12 mb-3">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Cash Register for Making Payment</span>
									</label>
									<!--end::Label-->

									<select name="register_id" class="form-select form-control form-control-solid text-uppercase " required = "">
									  <?php 
									    $registers = cash_registers::select();
									    foreach( $registers as $r) {?>
			                          	<option  value = "<?= $r->id ?>"><?= $r->name ?></option>
			                          <?php } ?>
			                        </select>
								</div>
								
								<!--begin::Col-->
								<div class="col-md-12 fv-row mb-3">
									<label class="required fs-6 fw-semibold mb-2">Date</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
										<!--end::Icon-->
										<!--begin::Datepicker-->
										<input value = "<?php echo date('Y-m-d');?>" type = "date" class="form-control form-control-solid ps-12" placeholder="Select a date" name="date" />
										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-md-12 fv-row mb-3">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Description</span>
									</label>
									<!--end::Label-->
									<textarea placeholder = " Description... " class="form-control form-control-solid" name="description" rows = "3"></textarea>
								</div>
								<!--end::Col-->
									

								<!--begin::Col-->
								<div class="col-md-8 fv-row">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Amount</span>
									</label>
									<!--end::Label-->
									<input type = "text" class="form-control form-control-solid" placeholder="Amount" name="amount" />
								</div>
								<!--end::Col-->

								<div class = "col-md-4">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Currency</span>
									</label>
									<!--end::Label-->

									<select id = "currency"  name="currency" class="form-select form-control form-control-solid text-uppercase " required = "">
			                          <option  value = "TRY">TRY</option>
			                          <option  value = "USD">USD</option>
			                          <option  value = "EUR">EUR</option>
			                          <option  value = "GBP">GBP</option>
			                        </select>
								</div>


							</div>
							<!--end::Input group-->

						
							

                </div>
            </div>

            <div class="modal-footer">
    			<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger text-white">Make Payment</button>
            </div>

							
						</form>
						<!--end:Form-->



        </div>
    </div>
</div>
<!--end::Modal-->










<!--begin::Modal Receive Payment -->
<div class="modal fade" tabindex="-1"  role="dialog" aria-hidden="true" id="cashDeposit" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Receive Payment</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
            </div>

            <div class="modal-body">
                <div class="mb-10">
                    


                    <form  action="<?php echo base_url('accounting/customer_receive_payment/'.$this->uri->segment(3)); ?>" method ="POST" enctype="multipart/form-data">
							<!--begin::Input group-->
							<div class="row g-9 ">

								<div class = "col-md-12">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Cash Register for Receiving Payment</span>
									</label>
									<!--end::Label-->

									<select name="register_id" class="form-select form-control form-control-solid text-uppercase " required = "">
									  <?php 
									    $registers = cash_registers::select();
									    foreach( $registers as $r) {?>
			                          	<option  value = "<?= $r->id ?>"><?= $r->name ?></option>
			                          <?php } ?>
			                        </select>
								</div>

								
								<!--begin::Col-->
								<div class="col-md-12 fv-row mb-3 mt-3">
									<label class="required fs-6 fw-semibold mb-2">Date</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
										<!--end::Icon-->
										<!--begin::Datepicker-->
										<input value = "<?php echo date('Y-m-d');?>" type = "date" class="form-control form-control-solid ps-12" placeholder="Select a date" name="date" />
										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-md-12 fv-row mb-3">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Description</span>
									</label>
									<!--end::Label-->
									<textarea placeholder = " Description... " class="form-control form-control-solid" name="description" rows = "3"></textarea>
								</div>
								<!--end::Col-->
									

								<!--begin::Col-->
								<div class="col-md-8 fv-row">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Amount</span>
									</label>
									<!--end::Label-->
									<input type = "text" class="form-control form-control-solid" placeholder="Amount" name="amount" />
								</div>
								<!--end::Col-->

								<div class = "col-md-4">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Currency</span>
									</label>
									<!--end::Label-->

									<select id = "currency"  name="currency" class="form-select form-control form-control-solid text-uppercase " required = "">
			                          <option  value = "TRY">TRY</option>
			                          <option  value = "USD">USD</option>
			                          <option  value = "EUR">EUR</option>
			                          <option  value = "GBP">GBP</option>
			                        </select>
								</div>


							</div>
							<!--end::Input group-->

						
							
						
							

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success text-white">Receive Payment</button>
            </div>

							
						</form>
						<!--end:Form-->



        </div>
    </div>
</div>
<!--end::Modal-->


<!-- Filter by Dropdowns Function -->			
<script>
  function filterTable() {
    var selectedCurrency = document.getElementById('currencyDropdown').value;
    var selectedOperation = document.getElementById('operationDropdown').value;
    var tableBody = document.getElementById('transactionHistoryBody');
    var rows = tableBody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
      rows[i].style.display = '';
    }

    for (var i = 0; i < rows.length; i++) {
      var currencyCell = rows[i].getElementsByTagName('td')[5]; 
      var operationCell = rows[i].getElementsByTagName('td')[4]; 

      if ((selectedCurrency === '' || currencyCell.innerText.trim() === selectedCurrency) &&
          (selectedOperation === '' || operationCell.innerText.trim() === selectedOperation)) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }

  document.getElementById('currencyDropdown').addEventListener('change', filterTable);
  document.getElementById('operationDropdown').addEventListener('change', filterTable);
</script>



<!-- Filter by Input Function -->			
 <script>
 	function filterFunc() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("searchInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("historyTable");
	  tr = table.getElementsByTagName("tr");
	  for (i = 0; i < tr.length; i++) {

     	var td1 = tr[i].getElementsByTagName("td")[0];
		var td2 = tr[i].getElementsByTagName("td")[1];
		var td3 = tr[i].getElementsByTagName("td")[2];
		var td4 = tr[i].getElementsByTagName("td")[3];


	    if (td1 || td2 || td3 || td4) {
	      var txtValue1 = td1.textContent || td1.innerText;
		  var txtValue2 = td2.textContent || td2.innerText;
		  var txtValue3 = td3.textContent || td3.innerText; 
		  var txtValue4 = td4.textContent || td4.innerText;

	      if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
		      tr[i].style.display = "";
		    } else {
		      tr[i].style.display = "none";
		    }
	    }       
	  }
	}
</script>

        
      
<?php $this->load->view('admin/include/footer'); ?>
