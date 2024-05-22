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
								<div class="h4">TRY:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?= $tl ?> ₺</span></div>
							</div>
						</div>
					</div>
                	
                	<div class = "col-lg-3 my-2">
						<div class="card alert alert-success">
							<div class="card-body">
								<div class="h4">USD:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?= $usd ?> $</span></div>
							</div>
						</div>
					</div>

					<div class = "col-lg-3 my-2">
						<div class="card alert alert-primary">
							<div class="card-body">
								<div class="h4">EUR:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?= $eur ?> €</span></div>
							</div>
						</div>
					</div>

					<div class = "col-lg-3 my-2">
						<div class="card alert alert-warning">
							<div class="card-body">
								<div class="h4">GBP:<span style="float:right;" class="font-size-h1  text-dark fw-bold mr-2"> <?= $gbp ?> £</span></div>
							</div>
						</div>
					</div>


                </div>

                <div class = "d-flex justify-content-between ">
					<div class = "d-flex" style = "width: 70%">
						<input class = "form-control" type="text" id="searchInput" onkeyup="filterFunc()" placeholder="Search...">

						<select class = "w-25 mx-3 form-control " id="operationDropdown" onchange="filterTable()">
						  <option value="">Type:</option>
						  <option value="Outgoing">Outgoing</option>
						  <option value="Incoming">Incoming</option>
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
						<a href="" class=" btn btn-primary" data-toggle="modal" data-target="#transfer">Transfer</a>
						<a href="" class="btn btn-success text-white  mx-1 " data-toggle="modal" data-target="#cashDeposit">Deposit</a>
						<a href="" class=" btn btn-warning text-white" data-toggle="modal" data-target="#cashWithdrawal">Withdraw</a>
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
											<span class="badge badge-success text-white">Incoming</span>
										<?php } elseif ( $key->operation == 2 || $key->operation == 3) { ?>
											<span class="badge badge-danger text-white">Outgoing</span>
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





<!--begin::Modal Cash Withdraw-->
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="cashWithdrawal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cash Withdrawal</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
            </div>

            <div class="modal-body">
                <div class="mb-10">
                    


                    <form  action="<?php echo base_url('accounting/cash_withdrawal/'.$this->uri->segment(3)); ?>" method ="POST" enctype="multipart/form-data">
							<!--begin::Input group-->
							<div class="row g-9 ">

								
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
                <button type="submit" class="btn btn-warning text-white">Withdraw</button>
            </div>

							
						</form>
						<!--end:Form-->



        </div>
    </div>
</div>
<!--end::Modal-->








<!--begin::Modal Transfer-->
<div class="modal fade" tabindex="-1"  role="dialog" aria-hidden="true" id="transfer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transfer between Registers</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
            </div>

            <div class="modal-body">
                <div class="mb-10">
                    


                    <form onsubmit="return validateForm()"  action="<?php echo base_url('accounting/cash_withdrawal/'.$this->uri->segment(3)); ?>" method ="POST" enctype="multipart/form-data">
							<!--begin::Input group-->
							<div class="row g-9 ">

								
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

								<div class = "col-md-12 mb-3">
									<!--begin::Label-->
									<label class=" fs-6 fw-semibold mb-2">
										<span class="required">Target Register</span>
									</label>
									<!--end::Label-->
  									<div id="warningMessage" style="color: red; display: none; ">You should choose a register.</div>

									<select id = "target_register"  name="target_register" class="form-select form-control form-control-solid text-uppercase " required = "">
												<option value = "Please choose a register." disabled selected>Please choose a register.</option>
			                        	<?php $registers = cash_registers::select(); foreach ($registers as $r) { if ( $r->id != $this->uri->segment(3) ) {?>
								                          <option  value = "<?= $r->id ?>"><?= $r->name ?></option>
										<?php }  } ?>		

			                        </select>
								</div>
									

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
                <button type="submit" class="btn btn-primary text-white">Submit Transfer</button>
            </div>

							
						</form>
						<!--end:Form-->



        </div>
    </div>
</div>
<!--end::Modal-->



<!--begin::Modal Cash Deposit -->
<div class="modal fade" tabindex="-1"  role="dialog" aria-hidden="true" id="cashDeposit" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cash Deposit</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
            </div>

            <div class="modal-body">
                <div class="mb-10">
                    


                    <form  action="<?php echo base_url('accounting/cash_deposit/'.$this->uri->segment(3)); ?>" method ="POST" enctype="multipart/form-data">
							<!--begin::Input group-->
							<div class="row g-9 ">

								
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
                <button type="submit" class="btn btn-success text-white">Deposit</button>
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
      var kurCell = rows[i].getElementsByTagName('td')[5]; // Kur hücresi (6. sütun)
      var hareketCell = rows[i].getElementsByTagName('td')[4]; // Hareket hücresi (5. sütun)

      if ((selectedCurrency === '' || kurCell.innerText.trim() === selectedCurrency) &&
          (selectedOperation === '' || hareketCell.innerText.trim() === selectedOperation)) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }

  document.getElementById('currencyDropdown').addEventListener('change', filterTable);
  document.getElementById('operationDropdown').addEventListener('change', filterTable);
</script>


<script>
  function validateForm() {
    var selectElement = document.getElementById('target_register');
    var selectedValue = selectElement.value;
    var warningMessage = document.getElementById('warningMessage');

    if (selectedValue === 'Please choose a register.') {
        warningMessage.style.display = 'block';
        return false;
    } else {
        warningMessage.style.display = 'none';
        return true;
    }
}

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
