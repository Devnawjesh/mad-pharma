<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">

<!--
            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Dashboard</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Dashboard</li>

                    </ol>

                </div>

            </div>
-->
            <style>
                .batch-d{
                    margin-top: 10px;
                }
            </style>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 batch-d d-flex">
                        <div class="card card-inverse card-info d-flex" style="flex: 1 1 100%;">
                            <div class="card-body" style="position: relative;">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-user float-right"></i></h1>
                                    </div>
                                    <div class="mr-auto">
                                        <h4 class="card-title">Wholesale <br /> Customer</h4>
                                    </div>
                                    <h2 class="font-light text-white">
                                        <?php 
                                            $this->db->where('c_type', 'Wholesale');
                                            $query = $this->db->get('customer');
                                            echo $query->num_rows(); ;
                                        ?>
                                    </h2>
                                </div>
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-user float-right"></i></h1>
                                    </div>
                                    <div class="mr-auto">
                                        <h4 class="card-title">Regular <br /> Customer</h4>
                                    </div>
                                    <h2 class="font-light text-white">
                                        <?php 
                                            $this->db->where('c_type', 'Regular');
                                            $query = $this->db->get('customer');
                                            echo $query->num_rows();
                                        ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-medkit float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">TOTAL MEDICINE</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white"><?php 
                                                        $query = $this->db->get('medicine');
                                                        echo $query->num_rows(); ;
                                                ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-danger">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-handshake-o float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">TOTAL SUPPLIER</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white"><?php 
                                                        $query = $this->db->get('supplier');
                                                        echo $query->num_rows(); ;
                                                ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-pencil-square-o float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">SALES TODAY</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white"><?php 
                                                $this->db->where('create_date', strtotime(date('m/d/y')));
                                                $query = $this->db->get('sales');
                                                echo $query->num_rows();
                                                ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!-- Row -->

                <div class="row">

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-info">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>invoice/Pos_Create">Create Invoice</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-success">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Medicine/Create">Add Medicine</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-success">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Purchase/Create">Add Purchase</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-inverse">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Supplier/Create">Add Supplier</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-primary">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Customer/Create">Add Customer</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-info">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Sales/Sales_report">Sales Report</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-success">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Sales/Purchase_report">Purchase Report</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-inverse">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">



                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>invantory/Stock_out">Out Of Stock</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->


                    <!-- Column -->

                </div>

                <div class="row">

                    <div class="col-lg-4">
                    <!-- Card -->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Top Sales</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                                    <!-- Message -->
                                    <?php foreach($topselling as $value): ?>    
                                    <a href="<?php echo base_url() ?>Sales/Sales_report">

                                        <div class="user-img"><?php if(!empty($value->product_image)){ ?> <img src="<?php echo base_url() ?>assets/images/medicine/<?php echo $value->product_image?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } else { ?> <img src="<?php echo base_url() ?>assets/images/capsules.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } ?></div>

                                        <div class="mail-contnet">

                                            <h6><?php echo $value->product_name?> </h6> <span class="mail-desc"><?php echo $value->generic_name?></span> <span class="time"><?php echo $value->expire_date?></span> </div>
                                    </a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Soon Expiring Medicine List</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                                    <!-- Message -->
                                    <?php foreach($expiresoonmedicine as $value):?>   
                                    <a href="<?php echo base_url() ?>invantory/Stock_expire_soon">

                                        <div class="user-img"><?php if(!empty($value->product_image)){ ?> <img src="<?php echo base_url() ?>assets/images/medicine/<?php echo $value->product_image?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } else { ?> <img src="<?php echo base_url() ?>assets/images/capsules.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } ?></div>

                                        <div class="mail-contnet">

                                            <h6><?php echo $value->product_name?> </h6> <span class="mail-desc"><?php echo $value->generic_name?></span> <span class="time"><?php echo $value->expire_date?></span> </div>

                                    </a>
                                    <?php endforeach;?>

                                </div>

                            </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Short Medicine List</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                                    <!-- Message -->
                                    <?php foreach($sortstock as $value): ?>   
                                    <a href="<?php echo base_url() ?>invantory/Stock_short">

                                        <div class="user-img"><?php if(!empty($value->product_image)){ ?> <img src="<?php echo base_url() ?>assets/images/medicine/<?php echo $value->product_image?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } else { ?> <img src="<?php echo base_url() ?>assets/images/capsules.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } ?></div>

                                        <div class="mail-contnet">

                                            <h6><?php echo $value->product_name?> </h6> <span class="mail-desc"><?php echo $value->generic_name?></span> <span class="time"><?php echo $value->expire_date?></span> </div>

                                    </a>
                                    <?php endforeach;?>

                                </div>

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