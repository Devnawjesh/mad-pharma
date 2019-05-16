<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Report</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Report</li>

                    </ol>

                </div>

            </div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">  Sales Return Report</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="mymTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                <th>Sales Date</th>
                                                <th>Invoice Number</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sales Date</th>
                                                <th>Invoice Number</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($salesreport as $value): ?>
                                            <tr>
                                                <td><?php echo date('d/m/Y',$value->create_date) ?></td>
                                                <td><?php echo $value->invoice_no ?></td>
                                                <td><?php echo $value->c_name ?></td>
                                                <td>
                                                    <?php echo $value->total_amount ?>
                                                </td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url() ?>Sales/SalesReturn?S=<?php echo base64_encode($value->sale_id) ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light customerid"  data-id="<?php echo $value->sale_id ?>"><i class="fa fa-undo"></i></a>                                                  
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

            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
        </div>
        
<script>
    $(document).ready(function() {
$('#mymTable').dataTable( {
        "aaSorting": [[0,'desc']]
    });
        });
</script>
<?php 

    $this->load->view('backend/footer');

?>