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
.table th, .table thead th{padding-left:0px;}
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
       #salesReturn .form-control{
           background-color: white;
       }
      </style>
    <div class="row">
      <div class="col-12">
        <div class="card card-outline-info" style="border-radius: none;">
          <div class="card-body" style="padding-top: 15px;">
              <div class="row">
                <div class="col-md-12">
                 <form action="Sales_Return_Form" method="post" class="SalesFormConfirm" id="SalesFormConfirm" enctype="multipart/form-data">
                  <div class="pos_inputs">
                      <div class="row m-b-5">
                        <div class="col-md-3 p-l-r-5">
                           <div class="input-group" >
                            <span class="input-group-addon b-r-0">
                            <i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="customer name" readonly value="<?php echo $salesreport->c_name ?>">
                          </div>
                        </div>
                        <div class="col-md-3 p-l-5">
                           <div class="input-group" >
                            <span class="input-group-addon b-r-0">
                            <i class="fa fa-user-o"></i></span>                           
                            <input type="text" class="form-control customer_id" name="customer_id" id="customer_id" placeholder="customer ID" value="<?php echo $salesreport->c_id ?>" readonly>
                            <input type="hidden" class="form-control s_id" name="s_id" id="s_id" placeholder="customer ID" value="<?php echo $salesreport->sale_id ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-3 p-l-5">
                           <div class="input-group" >
                            <span class="input-group-addon b-r-0">
                            <i class="fa fa-calendar"></i></span>                           
                            <input type="text" class="form-control sdate" name="sdate" id="sdate" placeholder="Sales Date" readonly value="<?php echo date('d/m/Y',$salesreport->create_date) ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            </div><?php if($salesreport->c_type =='Regular'){ ?>
                          <input name="customer_type" value="Regular" type="radio" id="Regular" tabindex="-1" checked="checked">
                          <label for="Regular">Regular Customer</label>                            
                            <?php } elseif($salesreport->c_type =='Wholesale'){ ?>
                          <input name="customer_type" value="Wholesale" type="radio" id="Wholesale" tabindex="-1" checked="checked">
                          <label for="Wholesale">Wholesale Customer</label>                              
                            <?php } else {?> 
                          <input name="customer_type" value="WalkIn" type="radio" id="WalkIn_customer" tabindex="-1" checked="checked">
                          <label for="WalkIn_customer">Walk In Customer</label>
                         <?php } ?>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive mb-15" style="height: 300px; overflow-y: auto; ">
                            <table class="table table-bordered m-t-5 purchase">
                                        <thead>
                                            <tr>
                                                <th>Medicine  </th>
                                                <th>G.Name</th>
                                                <th>Sale Qty</th>
                                                <th>Return Qty</th>
                                                <th>Sale Price</th>
                                                <th>Deduction</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="salesReturn">
                                        <?php foreach($allSales as $value): ?>
                                        <tr>
                                            <td><input type="text" name="medicisne" class="form-control" placeholder="Medicine" value="<?php echo $value->product_name ?>(<?php echo $value->strength ?>)" autocomplete="off" readonly="">
                                            <input type="hidden" name="mid[]" class="form-control" placeholder="Medicine" value="<?php echo $value->product_id ?>" autocomplete="off">
                                            </td>
                                            <td><input type="text" class="form-control" name="genname[]" placeholder="Ounce" readonly="" value="<?php echo $value->generic_name ?>"></td>
                                            <td><input type="number" class="form-control pqty" name="pqty[]" placeholder="" readonly value="<?php echo $value->qty ?>"></td>                            
                                            <td><input type="number" class="form-control rqty" name="rqty[]" placeholder="0.00" min="0" max="<?php echo $value->qty ?>" value=""></td>                                                          
                                            <td><input type="text" class="form-control sale" name="sale[]" placeholder="" value="<?php echo round($value->total_price / $value->qty,2) ?>" readonly=""></td>
                                            <td><input type="text" class="form-control deduction" name="deduction[]" placeholder="" value="0"></td>
                                            <td><input type="text" class="form-control total" name="total[]" placeholder="" value="0" readonly></td>
                                        </tr>
                                        <?php endforeach; ?>
                                       </tbody>
                                        <tfoot id="salesReturn">
                                            <tr>
                                               <td rowspan="3" colspan="5"></td>
                                                <td class="text-right font-weight-bold" >Grand Total:</td>
                                                <td><input type="text" class="form-control gtotal" name="grandamount" placeholder="" readonly="" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right font-weight-bold" colspan="1">Total Deduction:</td>

                                                <td><input type="text" class="form-control granddeduction" name="granddeduction" readonly value="0"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right font-weight-bold" colspan="1">Return Total:</td>
                                                <td><input type="text" class="form-control returntotal" name="returntotal" placeholder="" readonly="" value="0"></td>
                                            </tr>
                                        
                                    </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                          <button type="submit" id="salesposSubmit" class="btn waves-effect waves-light btn-secondary" style="width: 70%;">Return
                          </button>
                        </div>
                      </div>
                      </form>
                  </div>
                </div>

              </div>                              
          </div>
        </div>
      </div>
    </div> 
          <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.rqty, .total, .gtotal, .deduction,.granddeduction',function() { 
            //var total;  
            var gtotal = 0; 
            var rows = this.closest('#SalesFormConfirm tr');
            var quantity = $(rows).find(".pqty"); 
            var reqty = $(rows).find(".rqty"); 
            var price = $(rows).find(".sale"); 
            var deduction = $(rows).find(".granddeduction"); 
            var returntotal = $(rows).find(".gtotal"); 
            var qtyval = parseInt($(quantity).val()); 
            var rqtyval = Math.abs(parseInt($(reqty).val())); 
            var mrpval = parseFloat($(price).val()); 
              var total = 0;
              if(isNaN(rqtyval) == true){
                  total = 0;
             } else {
                  total =  Math.round(rqtyval * mrpval); 
              }
            $(rows).find('[name="total[]"]').val(total);
                    var sum = 0;
                    $(".total").each(function(index){
                           sum += parseFloat($(this).val());  
                    });
              $(".gtotal").val(sum);
              //$(".returntotal").val(sum);
              var ded = 0;
                $(".deduction").each(function(index){
                    ded += parseFloat($(this).val());  
                });
                $(".granddeduction").val(ded);
            var deductionval = parseFloat($(deduction).val()); 
            var returnval = parseFloat($(returntotal).val()); 
              var treturn;
              if(isNaN(ded) == true){
                  treturn = sum;
             } else {
                  treturn = sum - ded;
              }              
              $(".returntotal").val(treturn);
              
          });
        });
    </script>        
    <footer class="footer"> © 2017 GenIT Bangladesh 
    </footer>
  </div>
  <?php 
    $this->load->view('backend/footer');
  ?>
