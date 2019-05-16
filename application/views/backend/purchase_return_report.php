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

                                <h4 class="m-b-0 text-white"> Purchase Return Report</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Invoice No</th>
                                                <th>Supplier Name</th>
                                                <th>Return Date</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Invoice No</th>
                                                <th>Supplier Name</th>
                                                <th>Return Date</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                           <?php foreach($purchasereturnreport as $value): ?>

                                            <tr>

                                                <td><a href="<?php echo base_url() ?>Sales/Purchase_R_History?H=<?php echo base64_encode($value->r_id) ?>">
                                                        <?php echo $value->invoice_no ?>                      
                                                    </a></td>
                                                <td><?php echo $value->s_name ?></td>
                                                <td><?php echo date('d/m/Y', $value->return_date)?></td>
                                                   <td>
                                                    <?php echo 'TK ' .$value->total_deduction; ?>
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

<?php 

    $this->load->view('backend/footer');

?>