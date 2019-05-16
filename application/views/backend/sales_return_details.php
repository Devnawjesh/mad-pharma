<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
 <?php //echo date('Y-m-d H:i:s') ?>
        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Sales</h3>

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

                                <h4 class="m-b-0 text-white"> Sales Return Report</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Product Name</th>
                                                <th>Return Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Deduction</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Return Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Deduction</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($returndetails as $value): ?>
                                            <tr>
                                                <td><?php echo $value->product_name ?></td>
                                                <td>
                                                    <?php echo 'TK ' .$value->r_total; ?>
                                                </td>
                                                   <td>
                                                    <?php echo 'TK ' .$value->r_deduction; ?>
                                                </td>
                                                <td><?php echo date('d/m/Y', $value->date)?></td>
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