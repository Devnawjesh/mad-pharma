<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
               <!-- ============================================================== -->
        <div class="page-wrapper">
           <div class="flashmessage"></div>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage Bank</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Manage Bank</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                         <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="" class="text-white" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="" aria-hidden="true"></i> Add Bank</a></button> 

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Manage Bank </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>Bank Name</th>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Bank Address</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($bankinfo as $value): ?>
                                            <tr>
                                                <td><?php echo $value->bank_name ?></td>
                                                <td><?php echo $value->account_name ?></td>
                                                <td><?php echo $value->account_number ?></td>
                                                <td><?php echo $value->branch ?></td>
                                                
                                                <!--<td class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
                                                </td>-->
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Bank</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="Save_BANK" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Bank Name  </label>
                                        <input type="text" name="bname" class="form-control" id="recipient-name" placeholder="Bank Name.."> 
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Account Name  </label>
                                        <input type="text" name="aname" class="form-control" id="recipient-name" placeholder="Account Name.."> 
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Account Number  </label>
                                        <input type="text" name="anumber" class="form-control" id="recipient-name" placeholder="Account Number..."> 
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Branch</label>
                                        <input type="text" name="branch" class="form-control" id="recipient-name" placeholder="Branch Name.."> 
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Signature</label>
                                        <input type="file" name="signature" class="form-control" id="recipient-name"> 
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                            </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-dialog -->
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