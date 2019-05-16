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
                    <h3 class="text-themecolor">Purchase History</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Purchase History</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="#" class="text-white"><i class="" aria-hidden="true"></i> Add Purchase</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url()?>purchase/purchase" class="text-white"><i class="" aria-hidden="true"></i> Manage Purchase </a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Purchase History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
<!--                                                <th>ID </th>
                                                <th>Purchase ID</th>-->
                                                <th>Supplier </th>
                                                <th>Medicine </th>
                                                <th>Strength </th>
                                                <th>Expire Date </th>
                                                <th>Quantity </th>
                                                <th>Trade Price </th>
                                                <th>Discount </th>
                                                <th>Total Amount </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($purchasehistory as $value): ?>
                                            <tr>
<!--                                                <td><?php echo $value->ph_id; ?></td>
                                                <td><?php echo $value->pur_id; ?></td>-->
                                                <td><?php echo $value->s_name; ?></td>
                                                <td><?php echo $value->product_name; ?></td>
                                                <td><?php echo $value->strength; ?></td>
                                                <td><?php echo date('d/M/Y',$value->expire_date); ?></td>
                                                <td><?php echo $value->qty; ?></td>
                                                <td><?php echo $value->supplier_price; ?></td>
                                                <td><?php echo $value->discount .'%' ?></td> 
                                                <td><?php echo $value->total_amount ?></td>
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