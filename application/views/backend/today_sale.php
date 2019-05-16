<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Account</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Account</li>

                    </ol>

                </div>

            </div>       

            <div class="container-fluid">



                <div class="row m-b-10"> 

                    <div class="col-12">

<!--                         <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="" class="text-white"  data-toggle="modal" data-target=".bs-example-modal-lg"><i class="" aria-hidden="true"></i> Add Incume</a></button>

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="" class="text-white"   data-toggle="modal" data-target=".bs-example-modal-lg2"><i class="" aria-hidden="true"></i>  Add Expense </a></button> -->

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white"> Todays Sales Report</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Sales Date</th>

                                                <th>Invoice Number</th>

                                                <th>Customer Name</th>

                                                <th>Total Amount</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th>Sales Date</th>

                                                <th>Invoice Number</th>

                                                <th>Customer Name</th>

                                                <th>Total Amount</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>

                                           <?php foreach($todaysreport as $value): ?>

                                            <tr>

                                                <td><?php echo date('l dS \o\f F Y', $value->create_date)?></td>

                                                <td><?php echo $value->invoice_no; ?></td>

                                                <td><?php echo $value->c_name; ?></td>

                                                <td>

                                                    <?php echo 'TK '.$value->total_amount; ?>

                                                </td>

                                            </tr>

                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white"> Todays Purchase Report</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="example234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Sales Date </th>

                                                <th>Invoice Number</th>

                                                <th>Supplier Name</th>

                                                <th>Total Amount</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th>Sales Date </th>

                                                <th>Invoice Number</th>

                                                <th>Supplier Name</th>

                                                <th>Total Amount</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>

                                           <?php foreach($purchasereport as $value): ?>

                                            <tr>

                                                <td><?php echo date('l dS \o\f F Y', $value->entry_date)?></td>

                                                <td><?php echo $value->invoice_no; ?></td>

                                                <td><?php echo $value->s_name; ?></td>

                                                <td>

                                                    <?php echo 'TK ' .$value->gtotal_amount; ?>

                                                </td>

                                            </tr>

                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>





                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

                    <div class="modal-dialog ">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title">Add Income</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            </div>

                            <div class="modal-body">

                                <form>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Payment Date </label>

                                        <input type="date" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Payment From  </label>

                                        <input type="text" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Amount </label>

                                        <input type="text" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Payment Account </label>

                                        <input type="text" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="message-text" class="control-label">Description</label>

                                        <textarea class="form-control" id="message-text"></textarea>

                                    </div>

                                </form>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-danger waves-effect waves-light">Submit</button>

                            </div>

                        </div>

                    </div>

                    <!-- /.modal-dialog -->

                </div>

                <!-- /.modal -->





                <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

                    <div class="modal-dialog ">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title">Create Accounts</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            </div>

                            <div class="modal-body">

                                <form>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Payment Date </label>

                                        <input type="date" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Payment To  </label>

                                        <input type="text" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Payment Account </label>

                                        <input type="text" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="recipient-name" class="control-label">Amount </label>

                                        <input type="text" class="form-control" id="recipient-name">

                                    </div>

                                    <div class="form-group">

                                        <label for="message-text" class="control-label">Description</label>

                                        <textarea class="form-control" id="message-text"></textarea>

                                    </div>

                                </form>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-danger waves-effect waves-light">Submit</button>

                            </div>

                        </div>

                    </div>

                    <!-- /.modal-dialog -->

                </div>

            <footer class="footer"> © 2017 GenIT Bangladesh </footer>

        </div>

<<?php 

    $this->load->view('backend/footer');

?>