<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">     
        <style>
           .table td, .table th {
    border-color: #f7f5f5;
}
            </style>
            <div class="container-fluid p-t-10">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="purchase" class="text-white"><i class="" aria-hidden="true"></i> Manage Purchase </a></button>
                            <button type="button" class="btn btn-primary">
                            <a href="<?php echo base_url();?>Supplier/Create" class="text-white">Add Supplier</a>
                            </button>
                    </div>
                </div>
<div class="flashmessage"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">                     
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-white">New Purchase <span class="pull-right date-display"><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">

                                <div class="pur_inputs">

                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8" id="purchaseForm"> 

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group" style="margin-bottom: 15px">
                                                <label class="control-label">Company Name</label>
                                                <!--<select class="form-control select2 supplier" name="supplier" id="supplier" requird style="width:100%" autocomplete="off">
                                                          <option value="">Select Here</option>
                                                           <?php foreach($supplierList as $value): ?>
                                                            <option value="<?php echo $value->s_id; ?>"><?php echo $value->s_name; ?></option>
                                                            <?php endforeach; ?> 
                                                </select>-->
                                                        <input type="text" class="form-control supplier_name" name="supplier_name" placeholder="Company Name..."  id="supplier_name" autocomplete="off"> 
                                                        <input type="hidden" class="form-control supplier" name="supplier"  id="supplier" autocomplete="off">                                                 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" style="margin-bottom: 15px">
                                                    <label class="control-label">Invoice No</label>
                                                    <input type="number" id="firstName" name="invoice" class="form-control" placeholder="Invoice No" value="" autocomplete="off" required>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-2">
                                                <div class="form-group" style="margin-bottom: 15px">
                                                    <label class="control-label">Invoice Date</label>
                                                    <input type="text" id="datepicker" class="form-control datepicker" placeholder="" name="entrydate" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group" style="margin-bottom: 15px">
                                                    <label class="control-label">Note</label>
                                                    <textarea type="text" name="details" class="form-control" placeholder="Details" required rows="1" cols="8"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <table class="table table-bordered m-t-5 pos_table  purchase">

                                        <thead>
                                            <tr>
                                                <th style="width:15%">Medicine  </th>
                                                <th>G.Name</th>
                                                <th>Form</th>
                                                <th>Exp. Date</th>
                                                <th>Stock</th>
                                                <th>Qty</th>
                                                <th>TP</th>
                                                <th>MRP</th>
                                                <th>Disc.(W)</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addPurchaseItem">
                                        </tbody>
                                        <tfood>
<!--                                            <tr>
                                                <td class="text-right" > <button class="btn btn-info btn-block additem">Add New Item </button></td>
                                                    <td></td>
                                                    <td></td>
                                                <td class="text-right font-weight-bold"  colspan=6>Total Discount:</td>

                                                <td><input type="text" class="form-control gdiscount" name="tdiscount" placeholder="0.00" readonly=""></td>
                                                <td></td>
                                            </tr>-->
                                            <tr>
                                                

                                                <td class="text-right font-weight-bold" colspan=8>Grand Total:</td>

                                                <td><input type="text" class="form-control gtotal" name="grandamount" placeholder="0.00" readonly="" value=""></td>
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-right font-weight-bold" colspan=8>Total Paid:</td>

                                                <td><input type="text" class="form-control paid" name="paid" placeholder="0.00" value=""></td>
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-right font-weight-bold" colspan=8>Total Due:</td>

                                                <td><input type="text" class="form-control due" name="due" placeholder="0.00" readonly="" value=""></td>
                                                
                                            </tr>
                                            <tr id="payform">
                                                <td><select name="mtype" id="mtype" class="form-control" required>
                                                            <option value="Credit">Credit</option>
                                                            <option value="Cash">Cash</option>
                                                            <option value="Cheque">Cheque</option>
                                                        </select></td>

                                                <td id="bankid"><select class="select2 form-control" name="bankid" style="width:100%" >
                                                          <option value="">Select Bank..</option>
                                                           <?php foreach($bankinfo as $value): ?>
                                                            <option value="<?php echo $value->bank_id; ?>"><?php echo $value->bank_name; ?></option>
                                                            <?php endforeach; ?>       
                                                        </select></td>
                                                <td id="cheque"><input type="text" name="cheque"  class="form-control" placeholder="Cheque No..." required></td>
                                                <td id="issuedate"><input type="text" name="issuedate"  class="form-control datepicker" placeholder="Issue Date" value=""></td> 
                                                <td><input type="text" name="rname" id="rname" class="form-control" placeholder="Receiver Name" value=""></td> 
                                                <td><input type="number" name="rcontact" id="rcontact" class="form-control" placeholder="Receiver Contact" value=""></td>
                                                <td><input type="text" name="paydate" class="form-control datepicker" placeholder="Pay Date" value=""></td> 
                                                <td class="text-right" > <input type="submit" id="purchasesubmit" class="btn btn-primary btn-block" value="Review Order" style="color:white"> </td>        
                                                
                                            </tr>
                                        </tfood>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
<!--Modal-->
<div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width:1010px;margin-left: -100px">
      <div class="modal-header">
        <img src="<?php echo base_url(); ?>assets/images/home_logo.png" height="80" width="110" style="margin-left:330px" alt="homepage" class="dark-logo" />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='' method='post' class='form-horizontal' enctype='multipart/form-data' accept-charset='utf-8' id='ReviewForm'>
      <div class="modal-body" id="reviewDom">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-info" id="FinalSubmitBar" value="Barcode">
        <input type="submit" name="submit" class="btn btn-info" id="FinalSubmit" value="Submit">
        <input type="submit" name="submit" class="btn btn-info" id="FinalPrint" value="Print & Submit">
      </div>
        </form>
    </div>
  </div>
</div>
<!--Invoice and print view Modal-->
<div class="modal fade" id="invoicemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="75%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo base_url(); ?>assets/images/home_logo.png" height="80" width="110" style="margin:auto" alt="homepage" class="dark-logo" />
        <button type="button" class="" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="invoicedom">

      </div>
      <div class="modal-footer">
        <div class='text-right'>
            <input id='print' class='btn btn-default btn-outline print' type='submit' value='Print'>
        </div>
      </div>
    </div>
  </div>
</div> 
<!--barcode view Modal-->
<div class="modal fade" id="barcodemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="75%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="closel" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>      
      </div>
      <div class="modal-body">
        <div id="printArr2" >
            
        </div>
      </div>
      <div class="modal-footer">
        <div class='text-right'>
            <input id='bprint' class='btn btn-default btn-outline print' type='submit' value='Print'>
        </div>
      </div>
    </div>
  </div>
</div>                       
        <!--<script>
                                   
                $(document).on("keyup", ".total", function(){

                    console.log('Typing');
                    
                    var sum = 0;
                    $(".total").each(function(index){
                        
                        sum += parseFloat($(this).val()); 
                        
                    });//each

                    console.log( sum );

                });
        </script>-->
        <!--Payment cash and bank control Info-->
       <script type="text/javascript">
            $(document).ready(function () {           
            $('#mtype').on('change', function(e) {

                e.preventDefault(e);

                // Get the record's ID via attribute  

                var type = $('#mtype').val();
                console.log(type);
                if(type =='Cheque'){
                    console.log(type);
                    $('#cheque').show();
                    $('#issuedate').show();
                    $('#bankid').show();
                    $('#rnamr').show();
                    $('#rcontact').show();
                } 

                else if(type =='Cash'){

                    console.log(type);
                    $('#rnamr').show();
                    $('#rcontact').show();
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
            <script>
            $('#purchasesubmit').hide();
                $('#payform').hide();
            </script>
    <!--Purchase calculation-->      
          <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.qty, .tradeprice, .total, .tdiscount, .gtotal, .paid, .due',function() {
            var discountamount = 0;  
            //var total;  
              
            var gtotal = 0; 
            var rows = this.closest('#purchaseForm tr');
            var quantity = $(rows).find(".qty"); 
            var price = $(rows).find(".tradeprice"); 

            var qty = parseInt($(quantity).val()); 
            var trade = parseFloat($(price).val()); 
            var discount;
              if(isNaN(qty) == true){
                  //console.log(qty);
                  $('#purchasesubmit').hide();
                  $('#payform').hide();
              } else {
                  $('#purchasesubmit').show();
                  
              }
              var total = 0;
              if(isNaN(qty) == true){
                  total = 0;
/*                 var theTotal = fnAlltotal(total);
                  console.log( "first " + total);*/
             } else {
                  total =  Math.round(qty * trade); 
              }
            //var discountedamount = total - discountamount;
              // console.log(total);
            $(rows).find('[name="total[]"]').val(total);
            /*$(rows).find('[name="tdiscount[]"]').val(discount);*/
                    var sum = 0;
                    $(".total").each(function(index){
                           sum += parseFloat($(this).val());  
                    });
                    //var discountsum = 0;
/*                    $(".tdiscount").each(function(index){
                        discountsum += parseFloat($(this).val());                         
                    });*/
              
              $(".gtotal").val(sum);
            var paid = $(rows).find(".paid"); 
            var paidval = parseInt($(paid).val());
            var gtotal = $(rows).find(".gtotal"); 
            var gtotalv = parseInt($(".gtotal").val(sum));
              console.log(sum);
            var dueval = 0;
              if(isNaN(paidval) == true){
                  dueval = 0;
                  $('#payform').hide();
/*                 var theTotal = fnAlltotal(total);
                  console.log( "first " + total);*/
             } else {
                 var dueval = sum - paidval;
                 $('#purchasesubmit').show();
                 $('#payform').show();
              }              
              $(".due").val(dueval);
          });
        });
          /*Grand total calculation*/    
/*        function fnAlltotal(total) {
            var gtotal = 0;
            $(".total").each(function () {
                return gtotal += total; // 17
            });
            
            $(".gtotal").val(gtotal);
        }*/
          /*Grand Discount calculation*/    
/*        function fnAlldiscount(discount) {
            var gdiscount = 0;
            $(".discount").each(function () {
                gdiscount += discount;
            });
            $(".gdiscount").val(gdiscount);
        } 
            */
              
          </script> 
          
          <!--Review form calculation-->    
          <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.qtyval, .tardepriceval, .totalval, .tdiscountval, .rpaid, .rdue',function() {
            var discountamount = 0;  
            //var total;  
            var gtotal = 0; 
            var rows = this.closest('#ReviewForm tr');
            var quantity = $(rows).find(".qtyval"); 
            var price = $(rows).find(".tardepriceval");  
            var qty = parseInt($(quantity).val()); 
            var trade = parseFloat($(price).val()); 
              var total = 0;
              if(isNaN(qty) == true){
                  total = 0;
/*                 var theTotal = fnAlltotal(total);
                  console.log( "first " + total);*/
              } else {
                  total =  Math.round(qty * trade); 
            //var discount = ((discount/100)* (qty * trade));
              }
            $(rows).find('[name="totalval[]"]').val(total);
            /*$(rows).find('[name="tdiscountval[]"]').val(discount);*/
                    var sum = 0;
                    $(".totalval").each(function(index){
                           sum += parseFloat($(this).val());  
                    });
              $(".gtotalval").val(Math.round(sum));
            var rpaid = $(rows).find(".rpaid"); 
            var rpaidval = parseInt($(rpaid).val());
            var gtotal = $(rows).find(".gtotal"); 
            var gtotalv = parseInt($(".gtotal").val(sum));
              console.log(sum);
            var rdueval = 0;
              if(isNaN(rpaidval) == true){
                  rdueval = 0;
                
/*                 var theTotal = fnAlltotal(total);
                  console.log( "first " + total);*/
             } else {
                 var rdueval = sum - rpaidval;
              }              
              $(".rdue").val(rdueval);              
          });
        });
          </script>
          <!--Add new purchase-->
        <script type="text/javascript">
                $(document).ready(function () {
                $(".additem").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute
                    var t=$("tbody#addPurchaseItem tr:first-child").html();
                    $("tbody#addPurchaseItem").append("<tr>"+t+"</tr>");
                    /*$('.select2').select2();*/
                });
                });
</script>
        <!--Get supplier product-->
<script>
$( function() {
$(this.target).find('input').autocomplete();
 $( "#supplier_name" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "<?php echo base_url() ?>purchase/GetSupplierByid",
    type: 'post',
    dataType: "json",
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
   $('#supplier_name').val(ui.item.label); // display the selected text
   $('#supplier').val(ui.item.value); // display the selected text
    $("#supplier_name").autocomplete('close');
                var iid = ui.item.value;
                console.log(iid);
                $.ajax({
                url: 'medicinebysupplierId?id=' + iid,
                method: 'GET',
                data: '',
                }).done(function (response) {
                    var rows = $('table').find("#medicine");
                //console.log(response);
                $("#addPurchaseItem").html(response);
                //$(rows).html(response);
                    
                    });      
   return false;
  },
 });
 });
</script>         
        <!--<script type="text/javascript">
                $(document).ready(function () {
                $(document).on('change','#supplier',function(e){
                e.preventDefault(e);
                    //console.log('gfcvb');
                // Get the record's ID via attribute
                var iid = $(this).val();
                console.log(iid);
                $.ajax({
                url: 'medicinebysupplierId?id=' + iid,
                method: 'GET',
                data: '',
                }).done(function (response) {
                    var rows = $('table').find("#medicine");
                //console.log(response);
                $("#addPurchaseItem").html(response);
                //$(rows).html(response);
                    
                    });
                });
                });
                </script>-->           
        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $(document).on('change', ".medicine", function (e) {
                                                e.preventDefault(e);
                                                
                                                var parentTR = this.closest('#purchaseForm tr');
                                                // Get the record's ID via attribute  
                                                var iid = +this.value;
                                               //console.log(this.value);
                                                $( "#purchaseForm" ).change();
                                                //$('#salaryform').trigger("reset");
                                        //var target = $(this).parent().parent().children().next().next().children();
                                                $.ajax({
                                                    url: 'medicineInfoByMedicineID?id=' + this.value,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
                                                    $(parentTR).find('[name="strenth[]"]').val(response.medicinevalue.strength).end();
                                                    $(parentTR).find('[name="stock[]"]').val(response.medicinevalue.instock).end();
                                                    $(parentTR).find('[name="tradeprice[]"]').val(response.medicinevalue.trade_price).end();
                                                    $(parentTR).find('[name="mrp[]"]').val(response.medicinevalue.mrp).end();
												});
                                            });
                                        });
</script>            
       <script type="text/javascript">
        $(document).ready(function () {
        $("#purchasesubmit").click(function (event) {
            event.preventDefault();
            var formval = $('#purchaseForm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Purchase_Review",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
              } else {
                  /*console.log(response);*/
            $("#reviewDom").html(response);
            $("#ReviewForm").trigger("reset");
            $("#reviewmodal").modal("show");
              }              
          },
          error: function(response) {
            console.error();
          }
            });

        });

    });
    </script>
      <!-- Print and Submit-->           
       <script type="text/javascript">
        $(document).ready(function () {
        $("#FinalPrint").on('click',function (event) {
            event.preventDefault();    
            var formval = $('#ReviewForm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Purchase_Invoice",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response){
                //console.log(response);
                $("#invoicedom").html(response);
                $('#ReviewForm').modal('hide');
                $(this).hide();
                $("#invoicemodal").modal("show");             
          },
          error: function(response){
            console.error();
          }
        });
        });

    });
    </script>            
       <script type="text/javascript">
        $(document).ready(function () {
        $("#FinalSubmitBar").on('click',function (event) {
            event.preventDefault();    
            var formval = $('#ReviewForm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Purchase_Bar",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response){
                //console.log(response);
                $("#printArr2").html(response);
                $('#ReviewForm').modal('hide');
                $(this).hide();
                $("#barcodemodal").modal("show");             
          },
          error: function(response){
            console.error();
          }
        });
        });

    });
    </script> 
<!--    <script>
    $(document).ready(function() {
        $(".print").on('click',function(){
            console,log('sdgdfg');
            $("div#printableArea").printArea();
        });
    });
    </script>  -->                
       <script type="text/javascript">
        $(document).ready(function () {
        $("#FinalSubmit").on('click',function (event) {
            event.preventDefault();
            var formval = $('#ReviewForm')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Purchase",
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
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>

        </div>
<?php 

    $this->load->view('backend/footer');

?>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div#invoicedom").printArea(options);
        });
    });
    </script>
<script>
    $(document).ready(function() {
        $(".close").click(function() {
            location.reload()
        });
    });
    </script>
    
<script>
    $(document).ready(function() {
        $("#bprint").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div#printArr").printArea(options);
        });
    });
    </script>