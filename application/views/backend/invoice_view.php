<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Invoice</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Invoice</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
<div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>INVOICE</b> <span class="pull-right">#<?php echo $invoice->invoice_no; ?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger"><?php echo $settings->name ?></b></h3>
                                            <p class="text-muted m-l-5"><?php echo $settings->address ?>,
                                                <br> <?php echo $settings->email?>,
                                                <br> <?php echo $settings->contact?>,
                                                </p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold"><?php echo $invoice->c_name; ?></h4>
                                            <p class="text-muted m-l-30"><?php echo $invoice->c_email; ?>,
                                                <br> <?php echo $invoice->cus_contact; ?>,
                                                <br> <?php echo $invoice->c_address; ?></p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> <?php echo date('l jS \of F Y',$invoice->create_date); ?></p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Product ID</th>
                                                    <th>Product Name</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">M.R.P</th>
                                                    <th class="text-right">Total Price</th>
                                                    <th class="text-right">Total Discount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php foreach($invoicedetails as $value): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $value->mid?></td>
                                                    <td><?php echo $value->product_name?></td>
                                                    <td class="text-right"><?php echo $value->qty?> </td>
                                                    <td class="text-right"> <?php echo $value->rate?> </td>
                                                    <td class="text-right"> <?php echo $value->total_price?> </td>
                                                    <td class="text-right"> <?php echo $value->total_discount?> </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Total amount: <?php echo $invoice->total_amount?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
        </div>
 <?php 

    $this->load->view('backend/footer');?>
<!--<script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>-->
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
