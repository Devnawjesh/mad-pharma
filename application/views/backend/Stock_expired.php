<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Expired Medicine</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Medicine</li>
                    </ol>
                </div>
            </div>
        
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url();?>Medicine/Create" class="text-white"><i class="" aria-hidden="true"></i> Add Medicine </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>invantory/Stock_out" class="text-white"><i class="" aria-hidden="true"></i> Out of Stock </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>invantory/Stock_short" class="text-white"><i class="" aria-hidden="true"></i> Short Stock </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>invantory/Stock_expire_soon" class="text-white"><i class="" aria-hidden="true"></i>Soon  Expire Medicine</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Expire Soon</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Generic Name</th>
                                                <th>Company</th>
                                                <th>Strength</th>
                                                <th>Quantity Available</th>
                                                <th>Expiry Date</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                
                                           <?php foreach($expired as $value): ?>
                                            <tr>
                                                <td><?php echo $value->product_name?>(<?php echo $value->strength?>)</td>
                                                <td><?php echo $value->generic_name;  ?></td>
                                                <td><?php echo $value->s_name;  ?></td>
                                                <td><?php echo $value->strength;  ?></td>
                                                <td><?php echo $value->instock;  ?></td>
                                                <td><?php echo $value->expire_date;  ?></td>
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
        </div>
         
<?php 

    $this->load->view('backend/footer');

?>