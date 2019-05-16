<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">
<style>
/*! ========================================================================
 * Bootstrap Toggle: bootstrap-toggle.css v2.2.0
 * http://www.bootstraptoggle.com
 * ========================================================================
 * Copyright 2014 Min Hur, The New York Times Company
 * Licensed under MIT
 * ======================================================================== */


.checkbox label .toggle,
.checkbox-inline .toggle {
	margin-left: -20px;
	margin-right: 5px;
}

.toggle {
	position: relative;
	overflow: hidden;
}
.toggle input[type="checkbox"] {
	display: none;
}
.toggle-group {
	position: absolute;
	width: 200%;
	top: 0;
	bottom: 0;
	left: 0;
	transition: left 0.35s;
	-webkit-transition: left 0.35s;
	-moz-user-select: none;
	-webkit-user-select: none;
}
.toggle.off .toggle-group {
	left: -100%;
}
.toggle-on {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 50%;
	margin: 0;
	border: 0;
	border-radius: 0;
}
.toggle-off {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 50%;
	right: 0;
	margin: 0;
	border: 0;
	border-radius: 0;
}
.toggle-handle {
	position: relative;
	margin: 0 auto;
	padding-top: 0px;
	padding-bottom: 0px;
	height: 100%;
	width: 0px;
	border-width: 0 1px;
}

.toggle.btn { min-width: 59px; min-height: 34px; }
.toggle-on.btn { padding-right: 24px; }
.toggle-off.btn { padding-left: 24px; }

.toggle.btn-lg { min-width: 79px; min-height: 45px; }
.toggle-on.btn-lg { padding-right: 31px; }
.toggle-off.btn-lg { padding-left: 31px; }
.toggle-handle.btn-lg { width: 40px; }

.toggle.btn-sm { min-width: 50px; min-height: 30px;}
.toggle-on.btn-sm { padding-right: 20px; }
.toggle-off.btn-sm { padding-left: 20px; }

.toggle.btn-xs { min-width: 35px; min-height: 22px;}
.toggle-on.btn-xs { padding-right: 12px; }
.toggle-off.btn-xs { padding-left: 12px; }

/* radio button and other payment table */
 #bank_info_hide
    {
        display:none;
    }
    #payment_from_2
    {
        display:none;
    }
    .switch {
  font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
  
    overflow: hidden;
}

.switch-title {
  margin-bottom: 6px;
}

.switch input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 38px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch label {
  float: left;
    height: 34px !important;
}

.switch label {
  display: block;
  background-color: #e4e4e4;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
  font-weight: normal;
  text-align: center;
  text-shadow: none;
  padding: 6px 14px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition:    all 0.1s ease-in-out;
  -ms-transition:     all 0.1s ease-in-out;
  -o-transition:      all 0.1s ease-in-out;
  transition:         all 0.1s ease-in-out;
}

.switch label:hover {
    cursor: pointer;
}

.switch input:checked + label {
  background-color: #26a69a;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: white;
}

.switch label:first-of-type {
  border-radius: 4px 0 0 4px;
  background-color: #b9b9b9;
}

.switch label:last-of-type {
  border-radius: 0 4px 4px 0;
  background-color: #b9b9b9;
}
}    
</style>

            <div class="container-fluid p-t-10">

            <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <span><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span>
                            </div>
                            <div class="card-body">
                                <form action="Save" method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8" id="accountID">

                                    <div class="form-body">

                                        <span class="m-t-30 m-b-40"></span>

                                        <div class="row">
                                          <div class="col-md-12">
                                           <div class="row m-b-20">
                                           <div class="col-md-2">
                                               <span>Choose Transaction</span>
                                           </div>
							<div class="switch col-sm-9">
                                <input type="radio" name="transection_type" id="weekSW-0" value="Payment" checked="checked">
                                <label for="weekSW-0" id="yes"><i class="fa fa-credit-card" aria-hidden="true"></i>
                                <strong>Payment</strong></label>
                                <input type="radio" name="transection_type" id="weekSW-1" value="Receipt" >
                                <label for="weekSW-1" id="no"><i class="fa fa-credit-card" aria-hidden="true"></i>
                                <strong>Receipt</strong></label>
                            </div>                    
                                            <div class="col-md-2 text-left">

                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Transection Name</label>
                                                    
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="transaction" class="form-control" placeholder="Transaction Name" value="">
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Description</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="text" name="details" class="form-control" placeholder="Details" >

                                                    </div>

                                                </div>

                                            </div>                                            
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Transaction Mood</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <select name="mtype" id="mtype" class="form-control">
                                                            <option value="">Select Here</option>
                                                            <option value="Bank">Bank</option>
                                                            <option value="Cash">Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12" id="cheque">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Cheque/Pay Order No *</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="cheque" class="form-control" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-12" id="issuedate">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Date *</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="issuedate" class="form-control datepicker" placeholder="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12" id='bankid'>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Bank</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <select class="select2 form-control" name="bankid" style="width:100%">
                                                           <?php foreach($bankinfo as $value): ?>
                                                            <option value="<?php echo $value->bank_id; ?>"><?php echo $value->bank_name; ?></option>
                                                            <?php endforeach; ?>       
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-md-6 col-sm-12" id="PaymentContainer1">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Payment Amount</label>

                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="pamount" class="form-control mrp" placeholder="Amount..">
                                                    </div>

                                                </div>

                                            </div>
                                                <div class="col-md-6 col-sm-12" style="display:none" id="PaymentContainer2">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Receipt Amount</label>

                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="ramount" class="form-control mrp" placeholder="Amount..">
                                                    </div>

                                                </div>

                                            </div>
                                            <br>
                                            <div class="col-md-5 col-sm-12">

                                            </div>

                                            </div>
                                        </div>

                                        <!--/row-->

                                    

                                    <hr>

                                    <div class="form-actions text-center">

                                        <div class="row">

                                            <div class=" col-md-12 ">

                                                <button type="submit" class="btn btn-info">Submit</button>

                                                <button type="button" class="btn btn-inverse">Cancel</button>    

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>           

            <footer class="footer"> © 2017 GenIT Bangladesh </footer>

        </div>
       <script type="text/javascript">
            $(document).ready(function () {           
            $('#accountID #mtype').on('change', function(e) {

                e.preventDefault(e);

                // Get the record's ID via attribute  

                var type = $('#mtype').val();
                console.log(type);
                if(type =='Bank'){

                    console.log(type);

                    $('#cheque').show();

                    $('#issuedate').show();

                    $('#bankid').show();
                } 

                else if(type =='Cash'){

                    console.log(type);

                    $('#cheque').hide();

                    $('#issuedate').hide();

                    $('#bankid').hide();  
                }

            });

                    $('#cheque').hide();

                    $('#issuedate').hide();

                    $('#bankid').hide();                
            });
        </script>
<script type="text/javascript">
    $(document).ready(function () {
	$(".js-supplier-data-ajax").select2({

	    ajax: {
	        url: "<?php echo base_url(); ?>purchase/GetSupplierByid",
	        dataType: 'json',
	        type: "GET",
	        data: function (term) {
	            return {
	                param: term.term
	            };
	        },
	        processResults: function (data) {
	            
	            return {
		            results: $.map(data, function (item) {
		                return {
		                    text: item.s_name,
		                    id: item.s_id
		                };
		            })
		        };
	        },
	    }
	});
	});
</script>
<script type="text/javascript">
      $(document).change(function () {
    if ($('#weekSW-0').prop('checked')) {
        $('#PaymentContainer1').show();
     
        
    } else {
        $('#PaymentContainer1').hide();
    }

    if ($('#weekSW-1').prop('checked')) {
        $('#PaymentContainer2').show();
        

    } else {
        $('#PaymentContainer2').hide();
    }
});
$("#weekSW-0").click();
</script>
<?php 

    $this->load->view('backend/footer');

?>