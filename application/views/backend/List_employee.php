<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Employee</h3>

                </div>
                <div class="flashmessage"></div>
                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Employee</li>

                    </ol>

                </div>

            </div>

        

            <div class="container-fluid">



                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url();?>Employee/Create" class="text-white"><i class="" aria-hidden="true"></i> Add Employee</a></button>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Manage Employee </h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Employee ID </th>

                                                <th>Name</th>

                                                <th>Phone Number</th>

                                                <th>Address</th>

                                                <th>Email</th>

                                                <th>Roll</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                           <?php foreach($userList as $value): ?>

                                            <tr>

                                                <td><?php echo $value->em_id; ?></td>

                                                <td><?php echo $value->em_name; ?></td>

                                                <td><?php echo $value->em_contact; ?></td>

                                                <td><?php echo substr($value->em_address,0,25).'...'?></td>

                                                <td><?php echo $value->email; ?></td>

                                                <td><?php echo $value->em_role; ?></td>

                                                <td class="jsgrid-align-center ">

                                                    <a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light emmodalid" data-id="<?php echo $value->em_id; ?>" id="emmodalid"><i class="fa fa-pencil-square-o"></i></a>

                                                    <!--<a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-trash-o"></i></a>-->

                                                </td>

                                                <?php endforeach; ?> 

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                        </div>

            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
<!--Modal-->

<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Medicine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Update" method="post" id="employeefORM" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-body">
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
<!--
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Password</label>

                                                    <div class="col-md-9">

                                                        <input type="password" name="passone" class="form-control" placeholder="**********" minlength="6" maxlength="256" required >

                                                    </div>

                                                </div>

                                            </div>-->
<!--
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Confirm Password</label>

                                                    <div class="col-md-9">

                                                        <input type="password" name="passtwo" class="form-control" placeholder="**********" minlength="6" maxlength="256" required >

                                                    </div>

                                                </div>

                                            </div>-->

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
                                                    <label class="control-label text-right col-md-3">Product Image</label>
                                                    <div class="col-md-7">
                                                        <input type="file" name="img_url" id="img_url" class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <div class="file_prev">
                                                        <img src="" name="image" class="img-responsive postimg" id="image" height="35px" width="60px">
                                                    </div>
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
            </div>
      <div class="modal-footer">

       <input type="hidden" name="eid" value="">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-info">Submit</button>

      </div>

      </form>

    </div>

  </div>

</div>
        </div>

           <script type="text/javascript">
                $(document).ready(function () {
                    $(".emmodalid").click(function (e) {
                        e.preventDefault(e);
                        // Get the record's ID via attribute  
                        var iid = $(this).attr('data-id');
                        //console.log(iid);
                         $('#employeefORM').trigger("reset");
                         $('#employeeModal').modal('show'); 
                        $.ajax({
                            url: '<?php echo base_url();?>employee/GetEmployeeById?id=' + iid,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                        }).done(function (response) {
                            console.log(response);
                            // Populate the form fields with the data returned from server
                            $('#employeefORM').find('[name="eid"]').val(response.employee.em_id).end();
                            $('#employeefORM').find('[name="emname"]').val(response.employee.em_name).end();
                            $('#employeefORM').find('[name="emphone"]').val(response.employee.em_contact).end();
                            $('#employeefORM').find('[name="ememail"]').val(response.employee.email).end();
                            $('#employeefORM').find('[name="emaddress"]').val(response.employee.em_address).end();
                            $('#employeefORM').find('[name="emroll"]').val(response.employee.em_role).end();
                            $('#employeefORM').find('[name="emstatus"]').val(response.employee.status).end();
                            $('#employeefORM').find('[name="emnote"]').val(response.employee.em_details).end();
                            $('#image').attr('src','<?php echo base_url()?>assets/images/users/'+response.employee.em_image);
        				});
                    });
                });               
            </script>
<script>
$("#img_url").on("change", function() {
    if (typeof FileReader == "undefined") {
        alert("Your browser doesn't support HTML5, Please upgrade your browser");
    } else {
        var container = $(".file_prev");
        //remove all previous selected files
        container.empty();

        //create instance of FileReader
        var reader = new FileReader();
        reader.onload = function(e) {
            $("<img />", {
                src: e.target.result
            }).appendTo(container);
        };
        reader.readAsDataURL($(this)[0].files[0]);
    }
});
    </script>             
<?php 

    $this->load->view('backend/footer');

?>