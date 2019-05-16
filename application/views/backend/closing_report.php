<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Closing</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Closing</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"> </i> <a href="<?php echo base_url() ?>accounts/closing" class="text-white"><i class="" aria-hidden="true"></i> Add Closing </a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Closing Report</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="mymTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date </th>
                                                <th>Opening Balance</th>
                                                <th>Cash In </th>
                                                <th>Cash Out </th>
                                                <th>Cash In Hand</th>
                                                <th>Closing Balance</th>
                                                <th>Adjustment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($closing as $value): ?>
                                            <tr>
                                                <td><?php echo $value->date ?></td>
                                                <td><?php echo $value->opening_balance ?></td>
                                                <td><?php echo $value->cash_in ?></td>
                                                <td><?php echo $value->cash_out ?></td>
                                                <td><?php echo $value->cash_in_hand ?></td>
                                                <td><?php echo $value->closing_balance ?></td>
                                                <td><?php echo $value->adjustment ?></td>
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
    <script>
    $(document).ready(function() {
$('#mymTable').dataTable( {
        "aaSorting": [[0,'desc']]
    });
        });
</script>
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
 <?php 

    $this->load->view('backend/footer');

?>
