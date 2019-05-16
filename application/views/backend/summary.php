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
                    <h3 class="text-themecolor">Purchase</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Purchase</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
<!--                         <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="" class="text-white" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="" aria-hidden="true"></i> Add Incume</a></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="" class="text-white" data-toggle="modal" data-target=".bs-example-modal-lg2"><i class="" aria-hidden="true"></i>  Add Expense </a></button> -->
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/closing_report" class="text-white"><i class="" aria-hidden="true"></i> Closing Report</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/account" class="text-white"><i class="" aria-hidden="true"></i>  Account Manager </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/summary" class="text-white"><i class="" aria-hidden="true"></i>  Account Summary </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/tax" class="text-white"><i class="" aria-hidden="true"></i> Tax Manage</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>accounts/bank" class="text-white"><i class="" aria-hidden="true"></i> Bank Manage</a></button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Closing</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Last Day Closing</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Cash In</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Cash Out</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Cash In Hand</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="0.00" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Adjustment</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Adjustment">
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
<?php 

    $this->load->view('backend/footer');

?>