<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Supplier Balance</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Supplier Balance</li>

                    </ol>

                </div>

            </div>

            <div class="container-fluid">



                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url();?>Supplier/Create" class="text-white"><i class="" aria-hidden="true"></i> Add Supplier</a></button>

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Supplier/View" class="text-white"><i class="" aria-hidden="true"></i> Manage Supplier </a></button>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Supplier </h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="example234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th>Supplier ID</th>
                                                <th>Supplier Name</th>
                                                <th>Total Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Due Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($balance as $value): ?> 
                                            <tr>
                                                <td><?php echo $value->supplier_id; ?></td>
                                                <td><?php echo $value->s_name; ?></td>
                                                <td><?php echo $value->total_amount; ?></td>
                                                <td><?php echo $value->total_paid; ?></td>
                                                <td><?php echo $value->total_due; ?></td>

                                                <td class="jsgrid-align-center ">
                                                   <?php if($value->total_due > 0){ ?>
                                                    <a href="<?php echo base_url() ?>Supplier/Dues?D=<?php echo base64_encode($value->supplier_id); ?>" title="Due Amount" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-google-wallet"></i></a>
                                                    <?php } else { ?>
                                                    <a href="<?php echo base_url() ?>Supplier/Invoice?I=<?php echo base64_encode($value->supplier_id); ?>" title="Invoice" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-ellipsis-h"></i></a> 
                                                    <?php } ?>

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