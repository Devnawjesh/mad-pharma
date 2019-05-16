<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
<style type="text/css">
    .no-padding{padding:0px!important;}
    .no-margin{margin:0px!important;}
    .no-padding-left{padding-left:0px!important;}
    .no-padding-right{padding-right:0px!important;}
    .select2-container--default .select2-selection--single{
        border-radius: 0px;
    }
    .select2-container--default .select2-results__group{padding: 0}
</style>
        <div class="page-wrapper">
        <div class="flashmessage"></div>
            <div class="container-fluid" style="padding-top: 30px;">
                <div class="row m-b-10"> 
                    <div class="col-7">
                        <!--<button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url()?>invoice/create" class="text-white"><i class="" aria-hidden="true"></i> New Invoice</a></button>-->
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url()?>invoice/Pos_Create" class="text-white"><i class="" aria-hidden="true"></i> POS Invoice</a></button>
                        <!--<button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="invoice-manage.php" class="text-white"><i class="" aria-hidden="true"></i> Manage Invoice </a></button>-->
                    </div>
                    <div class="col-5" id="sales" style="color:red">
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-white">New Invoice <span class="pull-right"> 
                                <?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            
                            <div class="card-body">
                               <form action="Save" method="post" id="SalesForm" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom: 15px">
                                        <select class="select2 customerid" value="" name="customerid" style="width: 100%; height:36px;border-radius: 0px;" required>
                                            <option>Customer Name(Type)</option>
                                            <optgroup>
                                                <?php foreach ($customer as $value) {?>
                                                    <option value="<?php echo $value->c_id;?>"><?php echo $value->c_name;?>(<?php echo $value->c_type;?>)(<?php echo $value->c_id;?>)</option>
                                                <?php }?>
                                            </optgroup>
                                        </select>
                                        <input type="hidden" id="firstName" class="form-control hidden" placeholder="Customer Name(Wholesale)">
                                    </div>
                                    </div>
                                    <div class="col-md-3"><!--
                                        <div class="form-group" style="margin-bottom: 15px">
                                        <select class="select2 customerid" name="customerid" style="width: 100%; height:36px;border-radius: 0px;">
                                            <option >Customer ID (Type)</option>
                                                <?php foreach ($customer as $value) {?>
                                                    <option value="<?php echo $value->c_id;?>"><?php echo $value->c_id;?>(<?php echo $value->c_type;?>)</option>
                                                <?php }?>
                                        </select>
                                            <input type="hidden" id="firstName" class="form-control" placeholder="Customer ID (Wholesale)">
                                        </div>-->
                                        <div class="form-group" style="margin-bottom: 15px">
                                            <input type="text" id="invoice" name="invoice" value="<?php echo rand(100000,1000000000); ?>" class="form-control" placeholder="" readonly>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-bottom: 15px">
                                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Phone Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-bottom: 15px">
                                            <input type="text" id="salesdate" value="" name="salesdate"  class="form-control mydatetimepicker" >
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered m-t-10">
                                        <thead>
                                            <tr>
                                                <th width="15%">Product Name(Strength)<span class="text-danger">*</span> </th>
                                                <th width="15%">Genaric Name<span class="text-danger">*</span> </th>
                                                <th width="8%">Form</th>
                                                <th width="6%">Stock</th>
                                                <th width="8%">Quantity<span class="text-danger"> *</span></th>
                                                <th>M.R.P.<span class="text-danger"> *</span></th>
                                                <th>Discount %</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addPurchaseItem">
                                            <tr>
                                                <td>
                                                    <select class="select2 productid" style="width: 100%; height:36px;border-radius: 0px;" name="productid[]" required>
                                                        <option>Product Name(Strength)</option>
                                                        <optgroup>
                                                            <?php foreach ($medicineList as $value) { ?>
                                                                <option value="<?php echo $value->product_id;?>"><?php echo $value->product_name;?></option>
                                                            <?php }?>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" name="generic[]" placeholder="Genaric Name" value=""></td>
                                                <td><input type="text" class="form-control" name="sform[]" placeholder="0.00" readonly="" value=""></td>
                                                <td><input type="text" class="form-control" name="sinstock[]" placeholder="" value=""></td>
                                                <td><input type="text" class="form-control qty" name="qty[]" value="" placeholder="0.00" required></td>
                                                <td><input type="text" class="form-control mrp" name="smrp[]" placeholder="0.00" value=""></td>
                                                <td><input type="text" class="form-control discount" name="discount[]" placeholder="0.00"></td>
                                                <td><input type="text" class="form-control total" name="total[]" placeholder="0.00"></td>
                                                <td><input type="hidden" class="form-control tdiscount" name="tdiscount[]" placeholder="0.00"  value=""></td>
                                                <td><button class="btn btn-primary remove">Delete</button></td>
                                            </tr>
                                        </tbody>
                                        <tfood>
                                            <tr>
                                                <td colspan=6></td>
                                                <td class="text-right font-weight-bold">Total Discount:</td>
                                                <td><input type="text" class="form-control gdiscount" name="gdiscount" placeholder="0.00"></td>
                                                <td></td>
                                            </tr>
<!--                                             <tr>
                                                <td colspan=5></td>
                                                <td class="text-right font-weight-bold">Total Tax:</td>
                                                <td><input type="text" class="form-control" name="" placeholder="0.00"></td>
                                                <td></td>
                                            </tr> -->
                                            <tr>
                                                <td colspan=6></td>
                                                <td class="text-right font-weight-bold">Grand Total:</td>
                                                <td><input type="text" class="form-control gtotal" name="gtotal" placeholder="0.00"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" > <button class="btn btn-info btn-block additem">Add New Item </button></td>
                                                <td class="text-right font-weight-bold"  colspan=6>Paid Amount:</td>
                                                <td><input type="text" class="form-control paid" name="paid" placeholder="0.00" required></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" > 
<!--                                                    <button class="btn btn-primary pull-left">Full Paid </button> 
                                                    <button class="btn btn-info pull-right"> Hold Bill</button>-->
                                                    <input type="submit" name="" class="btn btn-info pull-right" value="Submit">
                                                </td>
                                                <td class="text-right font-weight-bold" colspan=6>Due:</td>
                                                <td><input type="text" class="form-control due" name="due" placeholder="0.00"></td>
                                                <td></td>
                                            </tr>
                                        </tfood>
                                    </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>

        </div>
          <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.qty, .mrp, .discount, .total, .tdiscount, .paid',function() {
            var discountamount = 0;  
            //var total;  
            var gtotal = 0; 
            var rows = this.closest('#SalesForm tr');
            var quantity = $(rows).find(".qty"); 
            var price = $(rows).find(".mrp"); 
            var percent = $(rows).find(".discount"); 
            var qty = parseInt($(quantity).val()); 
            var mrp = parseInt($(price).val()); 
            var discount;
            discount = parseInt($(percent).val());
             
              if(isNaN(discount) == true){
                 var total = qty * mrp;
                  console.log(total);
              } else {
                 var total =  (qty * mrp) - ((discount/100)* (qty * mrp)); 
                 var discount = ((discount/100)* (qty * mrp));
              }
            //var discountedamount = total - discountamount;
              // console.log(total);
            $(rows).find('[name="total[]"]').val(total);
            $(rows).find('[name="tdiscount[]"]').val(discount);
                    var sum = 0;
                    $(".total").each(function(index){
                        
                        sum += parseFloat($(this).val()); 
                        
                    });
                    var discountsum = 0;
                    $(".tdiscount").each(function(index){
                        
                        discountsum += parseFloat($(this).val()); 
                        
                    });
              //console.log(sum);
              $(".gtotal").val(sum);
              $(".gdiscount").val(discountsum);
              var paid = $(".paid").val();
              var due = sum - paid;
              console.log(due);
              $(".due").val(due);
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
<script type="text/javascript">
                $(document).ready(function () {
                $(".additem").click(function (e) {
                e.preventDefault(e);
                    //console.log('gfcvb');
                // Get the record's ID via attribute
                    var t=$("tbody#addPurchaseItem tr:first-child").html();
                    $("tbody#addPurchaseItem").append("<tr>"+t+"</tr>");
                    $('.select2').select2(
                    );
                });
                });
/*        var t=$("tbody#addPurchaseItem tr:first-child").html();
        $("tbody#addPurchaseItem").append("<tr>"+t+"</tr>")*/
    $("tbody#addPurchaseItem").on('click', '.remove', function(e){ //Once remove button is clicked

        e.preventDefault();

        $(this).parent("#addPurchaseItem").remove(); //Remove field html
 //Decrement field counter

        console.log('ssss');

    });    
</script>        
<script type="text/javascript">
/*

    $(wrapper).on('click', '.remove', function(e){ //Once remove button is clicked

        e.preventDefault();

        $(this).parent('.product').remove(); //Remove field html
 //Decrement field counter

        console.log('fgdfgdfgd');

    });*/

        /*Supplier search*/

 /*   $(".js-example-data-ajax").select2({



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

                            id: item.id                            

                        };

                    })

                };

            },

        }

    });  

});*/
     
</script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(document).on('change', ".productid", function (e) {
                                                e.preventDefault(e);
                                                
                                                // Get the record's ID via attribute 
                                                var parentTR = this.closest('#SalesForm tr');
                                                var iid = +this.value;
                                               //console.log(this.value);
                                                $( "#salesForm" ).change();
                                                //$('#salaryform').trigger("reset");
                                        //var target = $(this).parent().parent().children().next().next().children();
                                                $.ajax({
                                                    url: '<?php echo base_url() ?>Medicine/GetMedicineById?id=' + this.value,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
                                                    $(parentTR).find('[name="generic[]"]').val(response.mvalue.generic_name).end(); $(parentTR).find('[name="sform[]"]').val(response.mvalue.form).end();
                                                    $(parentTR).find('[name="sinstock[]"]').val(response.mvalue.instock).end();
                                                    $(parentTR).find('[name="smrp[]"]').val(response.mvalue.mrp).end();
												});
                                            });
                                        });
</script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(document).on('change', ".customerid", function (e) {
                                                e.preventDefault(e);
                                                
                                                // Get the record's ID via attribute  
                                                var iid = +this.value;
                                               //console.log(this.value);
                                                $( "#salesForm" ).change();
                                                //$('#salaryform').trigger("reset");
                                        //var target = $(this).parent().parent().children().next().next().children();
                                                $.ajax({
                                                    url: '<?php echo base_url() ?>Customer/GetCustomerId?id=' + this.value,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
                                                    $("#SalesForm").find('[name="contact"]').val(response.mvalue.cus_contact).end();
                                                   /* $("#salesForm").find('[name="stock[]"]').val(response.mvalue.instock).end();
                                                    $("#salesForm").find('[name="tradeprice[]"]').val(response.mvalue.trade_price).end();
                                                    $("#salesForm").find('[name="mrp[]"]').val(response.mvalue.mrp).end();*/
                                                    //$('#sales').val(response);
												});
                                            });
                                        });
</script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(document).on('change', ".customerid", function (e) {
                                                e.preventDefault(e);
                                                
                                                // Get the record's ID via attribute  
                                                var iid = +this.value;
                                               //console.log(this.value);
                                                $( "#sales" ).change();
                                                //$('#salaryform').trigger("reset");
                                        //var target = $(this).parent().parent().children().next().next().children();
                                                $.ajax({
                                                    url: '<?php echo base_url() ?>Customer/GetCustomerMonthlyIncome?id=' + this.value,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
                                                   /* $("#salesForm").find('[name="stock[]"]').val(response.mvalue.instock).end();
                                                    $("#salesForm").find('[name="tradeprice[]"]').val(response.mvalue.trade_price).end();
                                                    $("#salesForm").find('[name="mrp[]"]').val(response.mvalue.mrp).end();*/
                                                    $('#sales').html(response);
												});
                                            });
                                        });
</script>
<?php 

    $this->load->view('backend/footer');

?>