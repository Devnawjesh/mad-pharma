<?php
$this->load->view('backend/header');
$this->load->view('backend/sidebar'); 
?>
<div class="page-wrapper">
  <div class="flashmessage">
  </div>
  <div class="container-fluid" style="padding-top: 9px;">
    <!--<div class="row m-b-10"> 
<div class="col-7">
<button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url()?>invoice/create" class="text-white"><i class="" aria-hidden="true"></i> New Invoice</a></button>
    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="invoice-pos.php" class="text-white"><i class="" aria-hidden="true"></i> POS Invoice</a></button>
    <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="invoice-manage.php" class="text-white"><i class="" aria-hidden="true"></i> Manage Invoice </a></button>
    </div>
<div class="col-5" id="sales" style="color:red">
</div>
</div>-->
   <style>
   
.b-r-0{border-right:0px!important;}
.p-l-r-5{padding-left:5px!important;padding-right:5px!important;}
.p-l-5{padding-left:5px!important;}
.p-r-5{padding-right:5px!important;}
.custom-text-button{font-size:13px;font-weight:600;padding:5px 0px;}
.m-b-5{margin-bottom:10px!important;}
.custom-text-button {font-size: 13px;font-weight: 600;padding: 5px 2px;}
#SalesForm :focus {outline: 1px solid rgba(0, 0, 0, 0.3)}
.select2-container--open .select2-dropdown {left: -37px;width: 250px !important;}
.select2-container .select2-selection--single{height:37px;}
.select2-container {;width: 100%!important;}
.select2-container--default .select2-selection--single .select2-selection__rendered{display:none;}
.select2-container--default .select2-selection--single .select2-selection__arrow{width:100%;}
.table th, .table thead th{padding-left:10px;}
span.previous-dues {font-size: 12px;font-weight: 500;color: #eb0a8d;}
h4.previous-due-header {font-size: 14px; font-weight: 600;color: #eb0a8d;margin-top: 10px;}
/*Controll Customer section line number 380*/
.discount-info{color:#000;font-size:14px;margin:0px;}
.ui-menu .ui-menu-item-wrapper {font-size: 13px;font-weight: 600;}
.ui-menu .ui-menu-item-wrapper:hover {font-size: 13px;font-weight: 700;}
.form-group.genric-left-sug {
    width: 85%;
    float: left;
}
.input-group.genric-right-sug {
    width: 15%;
    float:  right;
}
    .custom-text-button {font-size: 16px; font-weight: 600; padding: 5px 2px; }
    li.super-sale-list{    padding: 0px!important;padding-left: 5px!important;border-bottom: .5px solid #e3e3e3!important;padding-top: 0!important;margin-top: 1px;font-size: 13px;font-weight: 600;}
@media (max-width: 1400px){
    span.input-group-addon.suggestion-icon.b-r-0 {display: none;}
    .select2-container {width: 100%!important;}
    .select2-container--default .select2-selection--single .select2-selection__arrow{width:100%!important;}
    .select2-container--open .select2-dropdown {left: 0px;width: 250px !important;}
    label.col-form-label.pos-label {font-size: 13px;}
    .custom-text-button {font-size: 13px; font-weight: 600; padding: 5px 2px; }
    
}
@media (max-width: 780px){}

      </style>
          
    <div class="row">
      <div class="col-12">
        <div class="card card-outline-info" style="border-radius: none;">
          <div class="card-body" style="padding-top: 15px;">
              <div class="row">
                <div class="col-md-10">
                  <div class="pos_inputs">
                     <form action="" method="post"  class="SalesForm" id="SalesForm" enctype="multipart/form-data">
                      <div class="row m-b-5">
                        <div class="col-md-3">
                          <input name="customer_type" value="WalkIn" type="radio" id="WalkIn_customer" tabindex="-1" checked="checked">
                          <label for="WalkIn_customer">Walk In Customer</label>
                        </div>                       
                        <div class="col-md-3">
                          <input name="customer_type" value="Regular" type="radio" id="regular_customer"  tabindex="-1">
                          <label for="regular_customer">Regular Customer</label>
                        </div>
                        <div class="col-md-3">
                          <input name="customer_type" value="Wholesale" type="radio" id="wholesale_customer" tabindex="-1">
                          <label for="wholesale_customer">Wholesale Customer</label>
                        </div>

                        <div class="col-md-2" style="margin-left: -42px;">
                            <a href="<?php echo base_url();?>Customer/Create" target="_blank" class="btn btn-sm btn-info waves-effect waves-light" tabindex="-1"><b>Create New Customer</b></a>
                        </div>

                        <div class="col-md-1">
                            <a href="<?php echo base_url();?>Invoice/manage_Invoice" target="_blank" class="btn btn-sm btn-info waves-effect waves-light" tabindex="-1"><b>Manage Invoice</b></a>
                        </div>
                      </div>
                      <div class="row m-b-5">
                        <div class="col-md-3 p-r-5">
                            <div class="input-group">
                                <span class="input-group-addon b-r-0"><i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control" name="cusid" id="cusid" placeholder="Barcode , Phone No..." tabindex="1" autocomplete="off" >
                                <!--<select class="js-customer-data-ajax form-control customer" id="cusid" name="cusid" required  tabindex="1" autocomplete="off">
                                </select>-->
                            </div>
                        </div>
                        <div class="col-md-3 p-l-r-5">
                           <div class="input-group" >
                            <span class="input-group-addon b-r-0">
                            <i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="customer name">
                          </div>
                        </div>
                        <div class="col-md-3 p-l-5">
                           <div class="input-group" >
                            <span class="input-group-addon b-r-0">
                            <i class="fa fa-user-o"></i></span>                           
                            <input type="text" class="form-control customer_id" name="customer_id" id="customer_id" placeholder="customer ID">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-6">
                                <span class="custom-text-button">
                                  Date:
                                  <?php date_default_timezone_set("Asia/Dhaka"); echo date("j  M y") ?>                                    
                                </span>
                            </div>
                            <div class="col-md-6">
                                <span class="custom-text-button">
                                  Time:
                                  <?php date_default_timezone_set("Asia/Dhaka"); echo date("h:i A") ?>                                  
                                </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-5">
                        <div class="col-md-9">
                          <div class="row pos-remove-spacing">
                            <div class="col-md-4" style="">
                              <div class="input-group">
                                <span class="input-group-addon b-r-0"><i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                <input type="hidden" id="proid" name="proid" value="">
                                <!--<select class="js-product-data-ajax form-control product" name="proval" style="width:100%" required id="product_name" tabindex="2" autocomplete="off">
                                </select>-->
                                <input type="text" class="form-control proval" name="proval" placeholder="Barcode , Product ID..."  id="product_name" tabindex="2" autocomplete="off">                                
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" class="form-control proname" name="proname" id="proname" placeholder="Product Name"  autocomplete="off"><sup><h6 id="expiry" style="color:red;margin-top: 5px;position:absolute;"></h6></sup>
                              </div>
                            </div> 
                            <div class="col-md-3">
                              <div class="form-group genric-left-sug">
                                <input type="text" class="form-control genname" name="genname" id="genname" placeholder="Generic Name" required  autocomplete="off">
                              </div>
                              <div class="input-group genric-right-sug"  >
                                <!--span class="input-group-addon suggestion-icon b-r-0"><i class="fa fa-gg"></i>
                                </span-->
                                <select id="lunch" class="form-control select2 generic gensuggestion" name="generic" title="" style="" placeholder=""  autocomplete="off">
                                </select>
                              </div>
                            </div> 
                            <div class="col-md-2" style="">
                              <div class="form-group">
                                <input type="text" class="form-control qty" name="qty" max="" id="qty" placeholder="Qty " required tabindex="4" autocomplete="off">
                                <!-- TABINDEX RESET INPUT  -->
                                <input type="text" tabindex="5" onfocus="document.getElementById('product_name').focus()" style="position: fixed; top: 9999px; left: 9999px">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i>
                                </span>
                                <input type="text" class="form-control mrp" name="mrp" id="mrp" placeholder="MRP" readonly tabindex="-1" value="">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cart-arrow-down"></i>
                                </span>
                                <input type="text" class="form-control stock" name="stock" id="stock" placeholder="Stock " readonly tabindex="-1" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <form action="" method="post" name="SalesFormConfirm" class="SalesFormConfirm" id="SalesFormConfirm" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-9">
                          <div class="table-responsive mb-15" style="height: 300px; overflow-y: auto; ">
                            <table class="table table-bordered pos_table scroll">
                              <thead>
                                <tr>
                                  <th>Product Name
                                  </th>
                                  <th>Quantity
                                  </th>
                                  <th>Total
                                  </th>
                                  <th>Action
                                  </th>
                                </tr>
                              </thead>
                              <tbody id="posinfo">

                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="row form-group">
                            <div class="col-md-5">
                              <label for="example-text-input" class=" col-form-label pos-label">Total Tk.
                              </label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control grandtotal" name="grandtotal" type="text" value="" style="" tabindex="-1" readonly>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col-md-5">
                              <label for="example-text-input" class=" col-form-label pos-label">Discount
                              </label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control gdiscount" name="gdiscount" type="text" value="0" style="" tabindex="-1" readonly>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col-md-5">
                              <label for="example-text-input" class=" col-form-label pos-label">Payable Tk.
                              </label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control payable" name="payable" type="text" value="" style="" tabindex="-1" readonly>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col-md-5">
                              <label for="example-text-input" class=" col-form-label pos-label">Paid Tk.
                              </label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control pay" type="text" name="pay" value="" style="" tabindex="-1" required="1">
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col-md-5">
                              <label for="example-text-input" class=" col-form-label pos-label">Return Tk.
                              </label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control return" name="return" type="text" value="" style="" tabindex="-1">
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col-md-5">
                              <label for="example-text-input" class=" col-form-label pos-label">Due Tk.
                              </label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control due" name="due" type="text" value="" style="" tabindex="-1">
                            </div>
                          </div>
                          <!--Regular customer sales target view-->
                          <div class="row form-group">
                            <div class="col-md-12">
<!--                              <label for="example-text-input" id="sales" class="col-form-label" style="color:#007bff">
                              </label>-->
                              <!--Dues-->
                              <div id="sales">
                                
                               </div>                              
                            </div>
                          </div>
                        </div>
                      </div><input type="hidden" id="cid" name="cid" value='' tabindex="-1">
                      <div class="row">
                        <div class="col-md-3">
                         
                          <button type="button" id="saleSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 70%;">Sale & Invoice
                          </button>
                        </div>
                        <div class="col-md-3">
                          <button type="button" id="FinalSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 50%;">Save
                          </button>
                        </div>
                        <!--<div class="col-md-3">
                          <button type="submit" id="Billhold" class="btn waves-effect waves-light btn-secondary" style="width: 50%;">Hold Bill
                          </button>
                        </div>-->
                        <div class="col-md-3">
                          <button type="submit" id="salesposSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 70%;">Invoice & Print 
                          </button>
                        </div>
                      </div>
                      </form>
                  </div>
                </div>
                <div class="col-md-2">
                  <!--Super sale-->
                  <div class="card">
                    <div class="card-heading">
                      <span style="display: block; padding: 7px 10px; background-color: #a5a5a5; color: #fff;font-weight:600">
                        Super Sale
                      </span>
                    </div>
                    <div class="card-body" style="padding: 0; ">
                      <ul class="list-group custom_list" style="height: 420px; overflow-y: auto;">
                         <?php foreach($medicineList as $value): ?>
                          <li class="super-sale-list" style="padding:1px;padding-left:5px;border-bottom:.5px solid #e3e3e3"> <a href="" id="superpro" data-id="<?php echo $value->product_id;?>"><?php echo $value->product_name?>(<?php echo $value->strength ?>) </a></li>
                          <?php endforeach; ?>
                      </ul>
                    </div>                                         
                  </div>
                </div>
              </div>                              
          </div>
        </div>
      </div>
    </div>
<div id="invoicemodal" class="modal fade" role="dialog" >
  <div class="modal-dialog" style="width: 350px;">
    <!-- Modal content-->
    <div class="modal-content" id="invoicedom">

    </div><!-- ./model-content  -->
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
  </div>
</div>    
    <!--Invoice and print view Modal-->
<!--<div class="modal fade" id="invoicemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="invoicedom">

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div> -->
    <footer class="footer"> © 2017 GenIT Bangladesh 
    </footer>
  </div>
  <script>
$( ".close" ).click(function() {
  location.reload();
});  
 </script>
  <script>
     // var cid = $('#cusid').val(ui.item.label);
      //console.log(cid);
            $('#salesposSubmit').hide();
            $('#saleSubmit').hide();
            $('#FinalSubmit').hide();
            $('#Billhold').hide();
      $('#cusid').attr('tabindex',1).focus();
    </script>
  <!--Save data-->
         <script type="text/javascript">
        $(document).ready(function () {
        $("#FinalSubmit").on('click',function (event) {
            event.preventDefault();
            var formval = $('#SalesFormConfirm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Pos",
                dataType: 'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
              } else if(response.status == 'success'){
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
                    window.setTimeout(function() {
                    window.location = response.curl;
                }, 3000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });
            });

    });
    </script>
  <!--Hold data-->
         <script type="text/javascript">
        $(document).ready(function () {
        $("#Billhold").on('click',function (event) {
            event.preventDefault();
            var formval = $('#SalesFormConfirm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Hold_Pos",
                dataType: 'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
              } else if(response.status == 'success'){
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  //console.log(response);
                    window.setTimeout(function() {
                    window.location = response.curl;
                }, 3000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });
            });

    });
    </script> 
  <!--sale & invoice data-->
         <script type="text/javascript">
        $(document).ready(function () {
        $("#saleSubmit").on('click',function (event) {
            event.preventDefault();
    var x = document.forms['SalesFormConfirm']["pay"].value;
    if (x == "") {
        alert("Name must be filled out");
        //console.log('fgf');
    } else {              
            var formval = $('#SalesFormConfirm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Pos_invoice",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response){
                $("#invoicedom").html(response);
              $('#invoicemodal').modal({backdrop: 'static', keyboard: false})  
                $("#invoicemodal").modal("show");              
          },
          error: function(response) {
            console.error();
          }
            });
        }
            });

    });
    </script>
  <!--sale & invoice & print data-->
<script type="text/javascript">
        $(document).ready(function () {
        $("#salesposSubmit").on('click',function (event) {
            event.preventDefault();
    var x = document.forms['SalesFormConfirm']["pay"].value;
    if (x == "") {
        alert("Name must be filled out");
        //console.log('fgf');
    } else { 
            var formval = $('#SalesFormConfirm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Pos_invoice",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response){
                //console.log(response);
              $('#SalesFormConfirm')[0].reset();
              $('#SalesForm')[0].reset();
              //document.getElementById("posinfo")[0].reset();
                $("#invoicedom").html(response);
                window.setTimeout(function() {
                    location.reload();
                }, 1000);              
                //$("#invoicemodal").modal("show"); 
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div#invoicedom").printArea(options); 
              //$("#invoicemodal").modal("close");
              
          },
          error: function(response) {
            console.error();
          }
            });
    }
            });

    });
    </script>      
<script>
    $(document).ready(function () {
    $(document).on('click','#tremove',function(e) {
        e.preventDefault();
            var rows = this.closest('#SalesFormConfirm tr');
            var discount = parseFloat($(".gdiscount").val()); 
            var total = parseFloat($(".grandtotal").val());
            var payt = parseFloat($(".payable").val());
            var t = parseFloat($(this).attr('data-total'));
            var tl = parseFloat($(this).attr('data-totall'));
            var d = parseFloat($(this).attr('data-discount'));
            var atotal = parseFloat(total - tl);
            var ptotal = parseFloat(payt - t);
            var adiscount = parseFloat(discount - d);
            $('.grandtotal').val(atotal);
            $('.payable').val(ptotal.toFixed(2));
            $('.gdiscount').val(adiscount.toFixed(2));
            $(this).closest('tr').remove();
        });
        });
</script>
<!--Super sale information-->
    <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', "#superpro", function (e) {
        e.preventDefault(e);
        var iid = $(this).attr('data-id');
        console.log(iid);
                $.ajax({
                    url: '<?php echo base_url();?>Invoice/GetProductValueForPOSField?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server                   
                    $('#SalesForm').find('[name="mrp"]').val(response.mvalue.mrp).end();                    
                    $('#SalesForm').find('[name="stock"]').val(response.mvalue.instock).end();                    
                    $('#SalesForm').find('[name="proid"]').val(response.mvalue.product_id).end();
                    /*$('#SalesForm').find('[name="proval"]').val(response.mvalue.product_name).end();*/
                    $('#SalesForm').find('[name="exp"]').val(response.mvalue.expire_date).end();
                    $('#SalesForm').find('[name="proname"]').val(response.mvalue.product_name+'('+response.mvalue.strength+')').end();
                     $('#SalesForm').find('[name="genname"]').val(response.mvalue.generic_name).end(); 
                    $('#SalesForm').find('[name="qty"]').attr("max",response.mvalue.instock).end();
                    $(this).addClass("disabled");
                    $('#expiry').show();
                    $('#qty').attr('tabindex', 4).focus(); 
                });
      });
    });
  </script>    
   <!--Input value calculation-->
    <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.gdiscount,.grandtotal,.pay,.return,.payable',function() {
            var discountamount = 0;  
            //var total;  
            var gtotal = 0; 
            var rows = this.closest('#SalesFormConfirm div');
            var discount = $(rows).find(".gdiscount"); 
            var total = $(rows).find(".grandtotal"); 
            var payable = $(rows).find(".payable"); 
            var pay = $(rows).find(".pay"); 
            var payableval = $('.payable').val(); 
            var payval =$('.pay').val();
              console.log(payval);
            var returnval;
              returnval = payval - payableval;
            if(returnval<=0){
                  $(".due").val(Math.abs(returnval).toFixed(2));
              }else if(returnval > 0){
                 $(".due").val(''); 
              }
              $(".return").val(returnval.toFixed(2));

          });
        });
   </script> 
    <!--Customer information for c_type & c_name-->
<!--    <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', ".customer", function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var data = $(this).select2('data');
        //so i access it by index
        var iid = data[0].id;
        //console.log(iid); 
                $.ajax({
                    url: '<?php echo base_url();?>Customer/GetCustomerValueforPOS?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    //console.log(response);
                    // Populate the form fields with the data returned from server
                    $('#SalesFormConfirm').find('[name="cid"]').val(response.mvalue.c_id).end();
                    $('#SalesForm').find('[name="customer_name"]').val(response.mvalue.c_name).end();
                    $('#SalesForm').find('[name="customer_id"]').val(response.mvalue.c_id).end();
                        if(response.mvalue.c_type == 'Regular') {
                        $('#SalesForm').find(':radio[id=regular_customer][value="Regular"]').prop('checked', true).end();
                        } else if(response.mvalue.c_type == 'Wholesale') {
                        $('#SalesForm').find(':radio[id=wholesale_customer][value="Wholesale"]').prop('checked', true).end();
                        }else if(response.mvalue.c_type == 'WalkIn') {
                        $('#SalesForm').find(':radio[id=WalkIn_customer][value="WalkIn"]').prop('checked', true).end();
                        }                    
                });
            });          
        });   
     </script>-->
     <!--After keypress Event-->
        
    <!--Customer information for c_type & c_name-->
    <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', '.product', function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var data = $(this).select2('data');
        //so i access it by index
        var iid = data[0].id;
        console.log(iid); 
                $.ajax({
                    url: '<?php echo base_url();?>Invoice/GetProductValueForPOSField?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server                   
                    $('#SalesForm').find('[name="mrp"]').val(response.mvalue.mrp).end();                    
                    $('#SalesForm').find('[name="stock"]').val(response.mvalue.instock).end();                    
                    $('#SalesForm').find('[name="exp"]').val(response.mvalue.expire_date).end();                    
                    $('#SalesForm').find('[name="proname"]').val(response.mvalue.product_name+'('+response.mvalue.strength+')').end();                    
                    $('#SalesForm').find('[name="genname"]').val(response.mvalue.generic_name).end();                    
                    $('#SalesForm').find('[name="qty"]').attr("max",response.mvalue.instock).end();
                    $('#expiry').show();
                });
            });          
        });   
     </script>           
    <!--Customer information for c_type & c_name-->
    <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', '.generic', function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var iid = $(this).val();
        console.log(iid); 
                $.ajax({
                    url: '<?php echo base_url();?>Invoice/GetProductValueForPOSField?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server                   
                    $('#SalesForm').find('[name="mrp"]').val(response.mvalue.mrp).end();                    
                    $('#SalesForm').find('[name="stock"]').val(response.mvalue.instock).end(); 
                    $('#SalesForm').find('[name="exp"]').val(response.mvalue.expire_date).end();                     $('#SalesForm').find('[name="proname"]').val(response.mvalue.product_name+'('+response.mvalue.strength+')').end();                    
                    $('#SalesForm').find('[name="genname"]').val(response.mvalue.generic_name).end();                     
                    $('#SalesForm').find('[name="qty"]').attr("max",response.mvalue.instock).end();                     
                });
            });          
        });   
     </script>   
  <!--Select ajax remote data search for customer-->
<!--  <script type="text/javascript">
    $(document).ready(function () {
      $(".js-customer-data-ajax").select2({
        placeholder: "Barcode, Phone number",
        allowClear: true,
        multiple: true,
        maximumSelectionSize: 1,          
        ajax: {
          url: "<?php echo base_url() ?>Invoice/GetCustomerId",
          dataType: 'json',
          type: "GET",
          data: function (term) {
            return {
              parm: term.term
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function (item) {
                return {
                  text: item.c_name,
                  id: item.c_id
                };
              })
            };
          },
        }
      });
    });
  </script> -->
    <script>
$( function() {
$(this.target).find('input').autocomplete();
 $( "#cusid" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "<?php echo base_url() ?>Invoice/GetCustomerId",
    type: 'post',
    dataType: "json",
    cache: false,
    data: {
     search: request.term
    },
    success: function(data) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
   // Set selection
   $('#cusid').val(''); // display the selected text
   $('#customer_name').val(ui.item.label); // display the selected text
   $('#cid').val(ui.item.value); // display the selected text
   $('#customer_id').val(ui.item.value); // save selected id to input
    if(ui.item.ctype == 'Regular') {
    $('#SalesForm').find(':radio[id=regular_customer][value="Regular"]').prop('checked', true).end();
    } else if(ui.item.ctype == 'Wholesale') {
    $('#SalesForm').find(':radio[id=wholesale_customer][value="Wholesale"]').prop('checked', true).end();
    } 
      if(ui.item.ctype == 'Regular') {
      var id = ui.item.value;
              $.ajax({
          url: '<?php echo base_url() ?>Customer/GetCustomerMonthlyIncome?id=' + id,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          //console.log(response);
          $('#sales').show();          
          $('#sales').html(response);
        });
      } else if(ui.item.ctype == 'Wholesale'){
          $('#sales').hide();
      }
      $("#cusid").autocomplete('close');
      //$("#cusid").autocomplete('destroy');
      $('#product_name').attr('tabindex',2).focus();
   return false;
  },
    
open: function(e, ui){
    //console.log(e);
    var len = $('.ui-autocomplete > li').length;
if (len == 1)
      { 
      $(".ui-menu-item:eq(0)").trigger("click");
           $("#cusid").autocomplete('close');
            //$("#cusid").autocomplete('destroy');
          // $( "#cusid" ).autocomplete({});
        return false;
      }
    else if(len == 2){
      $(".ui-menu-item:eq(1)").trigger("click");
           $("#cusid").autocomplete('close');
            //$("#cusid").autocomplete('destroy');
          // $( "#cusid" ).autocomplete({});
        return false;  
    }
    }
 });
 });
</script>    
  <!--Select ajax remote data search for product-->
<!--  <script type="text/javascript">
    $(document).ready(function () {
      $(".js-product-data-ajax").select2({
        placeholder: "Barcode, Product name",
        allowClear: false,
        ajax: {
          url: "<?php echo base_url() ?>Invoice/GetProductparam",
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
                  text: item.product_name +'('+item.strength+')',
                  id: item.product_id
                };
              })
            };
          },
        }
      }).enable(false);
    });
  </script> --> 
    <script>
$( function() {
$(this.target).find('input').autocomplete();
 $( "#product_name" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "<?php echo base_url() ?>Invoice/GetProductparam",
    type: 'post',
    dataType: "json",
       cache: false,
    data: {
     search: request.term
    },
    success: function(data) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
   // Set selection
      //console.log('dsdsfsd');
   $('#proid').val(ui.item.value); // display the selected text
   $('#proname').val(ui.item.label); // display the selected text
   $('#product_name').val(''); // display the selected text
   $('#genname').val(ui.item.genval); // save selected id to input
   $('#mrp').val(ui.item.mrp); // save selected id to input
   $('#stock').val(ui.item.stock); // save selected id to input
      $("#expiry").html(ui.item.expiry);
      if(ui.item.expiry=='0'){
          $("#expiry").hide();
      } else {
          $("#expiry").show();
          console.log(ui.item.expiry);
      }
       
        var pid = ui.item.value;
        //console.log(pid);
        $.ajax({
          url: '<?php echo base_url() ?>Invoice/GetSimilarGenericdata?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          //console.log(response);
          $('.generic').html(response);
        });
      $("#product_name").autocomplete('close');
      $('#qty').attr('tabindex', 4).focus();
      return false;
       
  },
open: function(e, ui){
    
    var val = $('.ui-autocomplete > li').length;
    console.log(val);
if (val == 1)
      {     
      $(".ui-menu-item:eq(0)").trigger("click");
    $("#product_name").autocomplete('close');
    //$("#product_name").autocomplete('destroy');
          console.log(val);
      return false;
      } else if(val == 2) {
          $(".ui-menu-item:eq(1)").trigger("click");
    $("#product_name").autocomplete('close');
    //$("#product_name").autocomplete('destroy');
          console.log(val);
      return false;
      }
    }  
 });
 }); 
        //console.log(id);
    </script>
    <!--Product add to card-->
   <script>
$("#qty").keypress(function(e) {
    if(e.which == 13 || e.keycode == '13') {
            var iid = $('#customer_id').val();
            console.log(iid);
            if(isNaN(iid) == false){
                //console.log(qty);
                //var iid = cid[0].id;
                var iid = $('#customer_id').val();
              }
            var formval = $('#SalesForm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Pos_Info",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
              
             $("#posinfo").append(response);
              calc_total();
              calc_discount();
              function calc_total(){
                  var sum = 0;
                  $(".totall").each(function(){
                      sum += parseFloat($(this).val());
                  });
                  $('.grandtotal').val(sum.toFixed(2));
                  var pay = 0;
                  $(".total").each(function(){
                      pay += parseFloat($(this).val());
                  });
                  
                  $('.payable').val(pay.toFixed(2));
              }
              function calc_discount(){
                  var discount = 0;
                  $(".discount").each(function(){
                      discount += parseFloat($(this).val());
                  });
                  $('.gdiscount').val(discount);
              }
              $('#salesposSubmit').show();
              $('#saleSubmit').show();
              $('#FinalSubmit').show();
              $('#Billhold').show();
              $('#qty').val("");
              $('.mrp').val("");
              $('.stock').val("");
              $('.proname').val("");
              $('.genname').val("");
              $('.proval').val("");
              $('#expiry').hide();
              $('#product_name').attr('tabindex', 2).focus();
              
          },
          error: function(response) {
            console.error();
          }
            });
    }
});    
    </script>     
<!-- //Customer information monthly income
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('select', ".customer_id", function (e) {
        e.preventDefault(e);
            //var rows = this.closest('#SalesForm div');
                var id = ui.item.expiry;
                console.log(id);
            //var id = (".customer_id").val();           
        //select to data return an array 
        //so i access it by index
        //var id = data[0].id;
        console.log(id);
        $.ajax({
          url: '<?php echo base_url() ?>Customer/GetCustomerMonthlyIncome?id=' + id,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          //console.log(response);
          $('#sales').html(response);
        });
      });
    });
  </script>-->                
<!--  Similar generic name After product select
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', ".product", function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var data = $(this).select2('data');
        //so i access it by index
        var pid = data[0].id;
        console.log(pid);
        $.ajax({
          url: '<?php echo base_url() ?>Invoice/GetSimilarGenericdata?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          console.log(response);
          $('.generic').html(response);
        });
      });
    });
  </script>-->                  
  <!--Expiry date After product select-->
<!--  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', ".product", function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var data = $(this).select2('data');
        //so i access it by index
        var pid = data[0].id;
        console.log(pid);
        $.ajax({
          url: '<?php echo base_url() ?>Invoice/GetExpiryDtaeAselect?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          console.log(response);
          $('#expiry').html(response);
        });
      });
    });
  </script> -->            
  <!--Expiry date After super product click-->
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', "#superpro", function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var pid = $(this).attr('data-id');
        //so i access it by index
        $.ajax({
          url: '<?php echo base_url() ?>Invoice/GetExpiryDtaeAselect?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          console.log(response);
          $('#expiry').html(response);
        });
      });
    });
  </script>                  
  <!--Similar generic name after super product click-->
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', "#superpro", function (e) {
        e.preventDefault(e);
        var pid = $(this).attr('data-id');

        $.ajax({
          url: '<?php echo base_url() ?>Invoice/GetSimilarGenericdata?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          console.log(response);
          $('.generic').html(response);
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', ".generic", function (e) {
        e.preventDefault(e);
        var pid = $(this).val();
        console.log(pid);
        $.ajax({
          url: '<?php echo base_url() ?>Invoice/GetSimilarGenericdata?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          console.log(response);
          $('.generic').html(response);
        });
      });
    });
  </script>
  <?php 
    $this->load->view('backend/footer');
  ?>
