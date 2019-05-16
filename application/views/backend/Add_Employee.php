<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Employee</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Employee</li>

                    </ol>

                </div>
            <div class="container-fluid">
                <div class="flashmessage"></div>
                <div class="row">
                    <div class="col-lg-12">
                            <div class="card-header">                                
                                <h4 class="m-b-0 ">New Invoice <span class="pull-right"><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">
                                <form action="Save" method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8"> 
                                    <div class="form-body">
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Employee Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="emname" class="form-control" placeholder="" minlength="3" maxlength="64" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Phone Number</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="emphone" class="form-control" minlength="10" maxlength="13" placeholder="" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email </label>
                                                    <div class="col-md-9">
                                                        <input type="email" name="ememail" class="form-control" placeholder="" minlength="6" maxlength="256" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Address</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="emaddress" class="form-control" placeholder="Address..." >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" name="passone" class="form-control" placeholder="**********" minlength="6" maxlength="256" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Confirm Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" name="passtwo" class="form-control" placeholder="**********" minlength="6" maxlength="256" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Employee Roll</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="emroll" required>
                                                            <option>Select User Type</option>
                                                            <option value="SALESMAN">Sales Man</option>
                                                            <option value="MANAGER">Manager</option>
                                                            <option value="ADMIN">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Employee Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="emstatus" required>
                                                            <option>Select User Status</option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="INACTIVE">INACTIVE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="img_url" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Note</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="emnote" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row justify-content-md-center">
                                            <div class=" col-md-offset-2 col-md-4 ">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                                <button type="button" class="btn btn-inverse">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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