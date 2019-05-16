<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
<style type="text/css">
.file_prev img {height: 44px!important;width: auto!important;max-width: 100%!important;margin-bottom: 0px!important;margin-right: 0px!important;margin-top: 0px!important;}
    .w-p-5{width:5%!important;}
    .w-p-10{width:10%!important;}
    .w-p-15{width:15%!important;}
    .w-p-20{width:20%!important;}
    .w-p-80{width:80%!important;}
    .w-p-100{width:100%!important;}
</style>
        <div class="page-wrapper">
            <div class="container-fluid p-t-10">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url();?>Supplier/Create" class="text-white"><i class="" aria-hidden="true"></i> Add Supplier</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Supplier/Balance" class="text-white"><i class="" aria-hidden="true"></i>  Supplier Balance </a></button>
                    </div>
                </div>
            <div class="flashmessage"></div>
                <div class="row">

                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Manage Supplier </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="w-p-10">Supplier Name</th>
                                                <th class="w-p-10">Phone Number</th>
                                                <th class="w-p-40">Address</th>
                                                <th class="w-p-10">Supplier ID </th>
                                                <th class="w-p-10">Image </th>
                                                <th class="w-p-10">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($supplierList as $value): ?>
                                            <tr>
                                                <td ><?php echo $value->s_name; ?></td>
                                                <td><?php echo $value->s_phone; ?></td>
                                                <td><?php echo substr($value->s_address,0,25).'...'; ?></td>
                                                <td><?php echo $value->s_id; ?></td>
                                                <td>
                                                    <?php if (empty($value->s_img)) {?>
                                                    <img src="<?php echo base_url();?>assets/images/supplier/supplier.png" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }else{?>
                                                    <img src="<?php echo base_url();?>assets/images/supplier/<?php echo $value->s_img ?>" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }?>
                                                </td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light supplierid" data-id="<?php echo $value->s_id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="<?php echo base_url();?>supplier/Medicine_View?S=<?php echo $value->s_id;?>" title="View" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>

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
<!--Modal-->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Update" method="post" id="supplierfORM" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Supplier Name</label>
                    <div class="col-md-9">
                        <input type="text" name="sname" class="form-control" placeholder="Supplier name" value="" required minlength="1">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Phone Name</label>
                    <div class="col-md-9">
                        <input type="number" name="sphone" value="" class="form-control" placeholder="Phone name">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Email</label>
                    <div class="col-md-9">
                        <input type="text" name="semail" value="" class="form-control" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Address</label>
                    <div class="col-md-9">
                        <input type="text" name="saddress" value=""  class="form-control" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Note</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="snote" value="" rows="1"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Status</label>
                        <div class="col-md-9">
                        <select class="form-control" name="status" id="status" value="">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        </div>
                </div>
            </div>
             <div class="col-md-6 col-sm-12">
                 <div class="form-group row">
                     <label class="control-label text-right col-md-3 col-sm-12"> Image</label>
                     <div class="col-md-6 col-sm-12">
                         <input type="file" name="img_url" id="img_url" class="form-control" aria-describedby="fileHelp">
                     </div>
                     <div class="col-md-3 col-sm-12">
                        <div class="file_prev modal_prev">
                            <img src="" name="img_url" class="img-responsive postimg" id="image">
                        </div>
                     </div>
                 </div>
             </div>            
        </div>
      </div>
      <div class="modal-footer">
       <input type="hidden" name="sid" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
       <script type="text/javascript">
            $(document).ready(function () {
                $(".supplierid").click(function (e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    //console.log(iid);
                     $('#supplierfORM').trigger("reset");
                     $('#supplierModal').modal('show'); 
                    $.ajax({
                        url: '<?php echo base_url();?>Supplier/GetSupplierById?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function (response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#supplierfORM').find('[name="sid"]').val(response.mvalue.s_id).end();
                        $('#supplierfORM').find('[name="sname"]').val(response.mvalue.s_name).end();
                        $('#supplierfORM').find('[name="sphone"]').val(response.mvalue.s_phone).end();
                        $('#supplierfORM').find('[name="semail"]').val(response.mvalue.s_email).end();
                        $('#supplierfORM').find('[name="saddress"]').val(response.mvalue.s_address).end();
                        $('#supplierfORM').find('[name="snote"]').val(response.mvalue.s_note).end();
                        $('#supplierfORM').find('[id="status"]').val(response.mvalue.status).end();
                        $('#image').attr('src','<?php echo base_url()?>assets/images/supplier/'+response.mvalue.s_img);
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