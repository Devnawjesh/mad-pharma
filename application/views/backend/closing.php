<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Purchase</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Closing</li>
                    </ol>
                </div>
            </div>
            <div class="flashmessage"></div>
            <?php #print_r($todaysale) ?>
            <div class="container-fluid">
<!--                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/closing_report" class="text-white"><i class="" aria-hidden="true"></i> Closing Report</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/account" class="text-white"><i class="" aria-hidden="true"></i>  Account Manager </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/summary" class="text-white"><i class="" aria-hidden="true"></i>  Account Summary </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/tax" class="text-white"><i class="" aria-hidden="true"></i> Tax Manage</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/bank" class="text-white"><i class="" aria-hidden="true"></i> Bank Manage</a></button>

                    </div>
                </div>-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Closing</h4>
                            </div>
                            <div class="card-body">
                                <form action="Save_Closing" method="post" enctype="multipart/form-data" id="ClosimgForm" class="form-horizontal">
                                    <div class="form-body">
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Opening Balance</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="opening" id="opening" class="form-control opening" placeholder="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Cash In</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="cashin" class="form-control cashin" name="cashin" placeholder="0.00" value="<?php 
                                                            $total= 0;
                                                            foreach($todaysale as $value){
                                                               $total+= $value->paid_amount;
                                                            }
                                                             echo $total;
                                                            ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Cash Out</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="cashout" name="cashout" class="form-control cashout" placeholder="0.00" value="<?php 
                                                            $total= 0;
                                                            foreach($todaypurchase as $value){
                                                               $total+= $value->paid_amount;
                                                            }
                                                             echo $total;
                                                            ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Cash In Hand</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="cashhand" class="form-control cashhand" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Closing Balance</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="cbalance" class="form-control cbalance" placeholder="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Adjustment</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="adjustment" class="form-control adjustment" placeholder="Adjustment">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row justify-content-md-center">
                                            <div class=" col-md-offset-2 col-md-4 ">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
   <!--Input value calculation-->
    <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.opening,.cashhand,.adjustment,.cbalance',function() {
            var discountamount = 0;  
            //var total;  
            var gtotal = 0; 
            var obalance = parseInt($('.opening').val()); 
            var cashin =parseInt($('.cashin').val());
            var cashout =parseInt($('.cashout').val());
            var cbalance =parseInt($('.cbalance').val());
            var cashhand;
              
            if(isNaN(obalance) == true){
                cashhand = cashin - cashout;
                $(".cashhand").val(cashhand);
              } else {
                cashhand = (obalance + cashin) - cashout;
                $(".cashhand").val(cashhand);
              }
              var add;
            if(isNaN(cbalance) == true){
                add = 0;
              } else {
                add = cbalance - cashhand;
              }
                $(".adjustment").val(add);

          });
        });
          </script>         
 <?php 

    $this->load->view('backend/footer');

?>