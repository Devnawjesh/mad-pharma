        <aside class="left-sidebar">
            <?php $stockout = $this->medicine_model->GetStockOutproduct();
            $sortstock = $this->medicine_model->Getshortproduct();
            ?>

            <!-- Sidebar scroll-->

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">

                    <ul id="sidebarnav">

                        <li class="nav-devider"></li>
                        <?php if($this->session->userdata('user_type') =='SALESMAN'){ ?>
                        <li> <a href="<?php echo base_url(); ?>dashboard/Dashboard" ><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>

                        <li> <a href="<?php echo base_url();?>invoice/Pos_Create" ><i class="fa fa-pencil-square-o"></i><span class="hide-menu">POS <span class="hide-menu"></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Medicine </span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Medicine/Create">Add Medicine </a></li>
                                <li><a href="<?php echo base_url();?>Medicine/View">Manage Medicine</a></li>
<!--                                <li><a href="<?php echo base_url();?>Medicine/Barcode">Barcode Print</a></li>-->
                            </ul>
                        </li> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customer </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Customer/Create">Add Customer </a></li>
                                <li><a href="<?php echo base_url();?>Customer/View">Manage Customer</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Regular">Regular Customer</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Wholesale">Wholesale Customer</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-handshake-o"></i><span class="hide-menu">Supplier </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Supplier/Create">Add Supplier </a></li>
                                <li><a href="<?php echo base_url();?>Supplier/View">Manage Supplier</a></li>
                                <li><a href="<?php echo base_url();?>Supplier/Balance">Supplier Balance</a></li>
                            </ul>
                        </li>  
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Report </span></a>

                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url();?>Sales/Today_counter_report">Today's Report </a></li>

                            </ul>

                        </li>                                                                                             
                        <?php } elseif($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER') {?>
                        
                        <li> <a href="<?php echo base_url(); ?>dashboard/Dashboard" ><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>

                        <li> <a href="<?php echo base_url();?>invoice/Pos_Create" ><i class="fa fa-pencil-square-o"></i><span class="hide-menu">POS <span class="hide-menu"></a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Medicine </span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Medicine/Create">Add Medicine </a></li>
                                <li><a href="<?php echo base_url();?>Medicine/View">Manage Medicine</a></li>
<!--                                <li><a href="<?php echo base_url();?>Medicine/Barcode">Barcode Print</a></li>-->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customer </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Customer/Create">Add Customer </a></li>
                                <li><a href="<?php echo base_url();?>Customer/View">Manage Customer</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Regular">Regular Customer</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Wholesale">Wholesale Customer</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-handshake-o"></i><span class="hide-menu">Supplier </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Supplier/Create">Add Supplier </a></li>
                                <li><a href="<?php echo base_url();?>Supplier/View">Manage Supplier</a></li>
                                <li><a href="<?php echo base_url();?>Supplier/Balance">Supplier Balance</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Purchase </span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Purchase/Create">Add Purchase </a></li>
                                <li><a href="<?php echo base_url()?>purchase/purchase">Manage Purchase</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu"> Inventory </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>invantory/Stock">Manage Stock </a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_short">Short Stock <span class="label label-rouded label-info pull-right"><?php echo count($sortstock); ?></span></a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_out">Out of Stock <span class="label label-rouded label-danger pull-right"><?php echo count($stockout); ?></span></a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_expire_soon"> Soon Expiring</a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_expired">Expired Medicine</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Accounts </span></a>

                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url();?>Customer/Balance">Customer Balance</a></li>
                                <li><a href="<?php echo base_url();?>Supplier/Balance">Supplier Balance</a></li>

<!--                                 <li><a href="#">Accounts Summary</a></li> -->

                                <li><a href="<?php echo base_url()?>accounts/Payment">Payment</a></li>

<!--                                 <li><a href="#">Cheque manager</a></li> -->

                               <li><a href="<?php echo base_url()?>accounts/closing">Closing</a></li>

                                <li><a href="<?php echo base_url()?>accounts/Report"> Closing Report</a></li>

                                <li><a href="<?php echo base_url()?>accounts/bank">Manage Bank</a></li>

                            </ul>

                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-adjust"></i><span class="hide-menu">Return </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a  href="<?php echo base_url();?>sales/Purchase_Return" >Purchase Return </a></li>
                            <li> <a  href="<?php echo base_url();?>sales/Sales_Return" >Sales Return </a></li>
                        </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Report </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Sales/Today_report">Today's Report </a></li>
                                <li><a href="<?php echo base_url();?>Sales/Sales_report">Sales Report</a></li>
                                <li><a href="<?php echo base_url();?>Sales/Counter_report">Counter Report</a></li>
                                <li><a href="<?php echo base_url();?>Sales/Sales_Return_Report">Sales Return Report</a></li>
                                <li><a href="<?php echo base_url();?>Sales/Purchase_report">Purchase Report</a></li>
                                <li><a href="<?php echo base_url();?>Sales/Purchase_Return_report">Purchase Return Report</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Employee </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Employee/Create">Add Employee </a></li>
                                <li><a href="<?php echo base_url();?>Employee/View">Manage Employee</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="	fa fa-child"></i><span class="hide-menu">Help </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url()?>help/phone_book">Phone Book </a></li>
                                <li><a href="<?php echo base_url()?>help/doctor">Doctor </a></li>
                                <li><a href="<?php echo base_url()?>help/hospital">Hospital </a></li>
                                <li><a href="<?php echo base_url()?>help/ambulance">Ambulance </a></li>
                                <li><a href="<?php echo base_url()?>help/fire_service">Fire Serivce</a></li>
                                <li><a href="<?php echo base_url()?>help/police">Police</a></li>
                            </ul>
                        </li>

                            <li> <a href="<?php echo base_url();?>Configuration/Settings"><i class="fa fa-gear"></i><span class="hide-menu">Settings </span></a></li>
                        <?php } ?>
                    </ul>

                </nav>

                <!-- End Sidebar navigation -->

            </div>

            <!-- End Sidebar scroll-->

        </aside>

