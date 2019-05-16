<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
<style>
    .file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px;margin-right: 0px;margin-top: 0px;}
    .w-p-5{width:5%!important;}
    .w-p-10{width:10%!important;}
    .w-p-15{width:15%!important;}
    .w-p-20{width:20%!important;}
    .w-p-80{width:80%!important;}
    .w-p-100{width:100%!important;}    
</style>
        <div class="page-wrapper">


            <div class="container-fluid p-t-10">

                <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url();?>Customer/Create" class="text-white"><i class="" aria-hidden="true"></i> Add Customer</a></button>

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/View" class="text-white"><i class="" aria-hidden="true"></i> Manage Customer </a></button>

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/Regular" class="text-white"><i class="" aria-hidden="true"></i> Regular Customer </a></button>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Wholesale Customer </h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="example234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Pharmacy Name</th>
                                                <th>Phone Number</th>
                                                <th>Customer ID</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($wholesaleList as $value): ?> 

                                            <tr>

                                                <td><?php echo $value->c_name; ?></td>
                                                <td><?php echo $value->pharmacy_name; ?></td>

                                                <td><?php echo $value->cus_contact; ?></td>

                                                <td><?php echo $value->c_id; ?></td>

                                                <!--<td><?php #echo $value->t_amount; ?></td>-->

                                                <!--<td>26000</td>-->

                                                <td>
                                                    <?php if (empty($value->c_img)) {?>
                                                    <img src="<?php echo base_url();?>assets/images/capsules.png" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }else{?>
                                                    <img src="<?php echo base_url();?>assets/images/medicine/<?php echo $value->c_img ?>" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }?>
                                                </td>

                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light customerid"  data-id="<?php echo $value->c_id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="" title="Edit" data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-sm btn-info waves-effect waves-light barcodegenerator"  data-id="<?php echo $value->c_id; ?>"><i class="fa fa-barcode"></i></a>

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

    
    <!-- Modal HTML -->
    <!-- Modal HTML -->
        <div class="modal fade" id="customermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg"   style="max-width:60%!important"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="Update" method="post"  id="customerform"  class="form-horizontal"  enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="">
                                        <input name="ctype" value="Regular" data-value="Regular" type="radio" id="radio_1" checked="">
                                            <label for="radio_1">Ragular Customer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="ctype" value="Wholesale" data-value="Wholesale" type="radio" id="radio_2">
                                        <label for="radio_2">Wholesale Customer</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Customer Name</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="cname" placeholder="Customer name" required minlength="1">
                                    </div>
                                </div>
                            </div>
                                            <div class="col-md-6" id="storeneme">

                                                <div class="form-group">

                                                    <label class="control-label text-right">Pharmacy Name</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="pcname" placeholder="Phrmacy Name" required minlength="1">
                                                    </div>

                                                </div>

                                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Phone Number</label>
                                    <div class="">
                                        <input type="number" class="form-control" name="cphone" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Email </label>
                                    <div class="">
                                        <input type="text" class="form-control" name="cemail" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Address</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="caddress" placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tamount">
                                <div class="form-group">
                                    <label class="control-label text-right">Target Amount</label>
                                    <div class="">
                                        <input type="text" name="tamount" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="cregular">
                                <div class="form-group">
                                    <label class="control-label text-right">Regular Discount</label>
                                    <div class="">
                                        <input type="text" name="rdiscount" class="form-control" placeholder="" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tdiscount">
                                <div class="form-group" >
                                    <label class="control-label text-right">Target Discount</label>
                                    <div class="">
                                        <input type="text" name="tdiscount" class="form-control" placeholder="Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Note</label>
                                    <div class="">
                                        <textarea class="form-control" name="cnote" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label text-right">Image</label>
                                    <div class="width:100%">
                                        <input type="file" name="img_url" id="img_url" style="width:90%" class="form-control" aria-describedby="fileHelp">
                                    <div class="file_prev" style="height:45px;width:54px;padding:0px;margin:0px;">
                                        <img src="" name="img_url" class="img-responsive postimg" id="image" style="">
                                    </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
              <div class="modal-footer">

               <input type="hidden" name="cid" value="">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-info">Submit</button>

              </div>

              </form>

            </div>

          </div>
    </div>
<style type="text/css">
    .card-no-border .card{
        width:100%!important;
    }
</style>
           <script type="text/javascript">

        $(document).ready(function () {

            $(".customerid").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                console.log(iid);
                $('#customerform').trigger("reset");
                $('#customermodel').modal('show'); 
                $.ajax({
                    url: '<?php echo base_url();?>Customer/GetCustomerId?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server
                    $('#customerform').find('[name="cid"]').val(response.mvalue.c_id).end();
                    $('#customerform').find('[name="cname"]').val(response.mvalue.c_name).end();
                    $('#customerform').find('[name="cemail"]').val(response.mvalue.c_email).end();
                    $('#customerform').find('[name="caddress"]').val(response.mvalue.c_address).end();
                    $('#customerform').find('[name="cphone"]').val(response.mvalue.cus_contact).end();
                    $('#customerform').find('[name="tamount"]').val(response.mvalue.target_amount).end();
                    $('#customerform').find('[name="tdiscount"]').val(response.mvalue.target_discount).end();
                    $('#customerform').find('[name="rdiscount"]').val(response.mvalue.regular_discount).end();
                    $('#customerform').find('[name="cnote"]').val(response.mvalue.c_note).end();
                    $('#image').attr('src','<?php echo base_url()?>assets/images/customer/'+response.mvalue.c_img);
                        if(response.mvalue.c_type == 'Regular') {
                            $('#customerform').find(':radio[name=ctype][value="Regular"]').prop('checked', true).end();
                            $('#storeneme').hide();
                        } else if(response.mvalue.c_type == 'Wholesale') {
                            $('#customerform').find(':radio[name=ctype][value="Wholesale"]').prop('checked', true).end();
                            $('#tamount').hide();
                            $('#cregular').hide();
                            $('#tdiscount').hide();
                            $('#storeneme').show();
                            
                        }  /*else if(response.mvalue.c_type == 'WalkIn') {  
                            $('#customerform').find(':radio[name=ctype][value="WalkIn"]').prop('checked', true).end();
                            $('#tamount').hide();
                            $('#cregular').hide();
                            $('#tdiscount').hide();
                            $('#storeneme').hide();                            
                } */                  
                });
            });

            $("#medicineid").on('show.bs.modal', function(event){
                var button = $(event.relatedTarget);  // Button that triggered the modal
                var titleData = button.data('title'); // Extract value from data-* attributes
                $(this).find('.modal-title').text(titleData + ' Form');
            });            

            $('#customerform input').on('change', function(e) {

                e.preventDefault(e);

                // Get the record's ID via attribute  

                var type = $('input[name=ctype]:checked', '#customerform').attr('data-value');

                if(type =='Regular'){

                    console.log(type);

                    $('#tamount').show();

                    $('#cregular').show();

                    $('#tdiscount').show();

                } 

                else if(type =='Wholesale'){

                    console.log(type);

                    $('#tamount').hide();

                    $('#cregular').hide();

                    $('#tdiscount').hide();  

                }

            });
        });   

            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".barcodegenerator").click(function (e) {
                        e.preventDefault(e);
                        // Get the record's ID via attribute  
                        var iid = $(this).attr('data-id');
                        //console.log(iid);
                         
                        $.ajax({
                            url: '<?php echo base_url();?>Customer/GetBarcodeDom?id=' + iid,
                            method: 'GET',
                            data: '',
                            dataType: 'html',
                        }).done(function (response) {
                            console.log(response);
                            $('#printa').html(response);
                            $('.bs-example-modal-md').modal('show'); 
        				});
                    });
                });               
            </script>               
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>

        </div>
<div class="modal fade bs-example-modal-md" id="" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                    <div class='modal-content' style="width: 352px;">
                                       <div id="printa"></div>
                                        <!-- /.modal-content -->
                                        <button type='submit' class='btn btn-info' id='print'>print </button>
                                        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
                                    </div>
                                    </div>
                                </div>
<style type="text/css">
    .card-no-border .card{
        width:100%!important;
    }
</style>
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
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div#printa").printArea(options);
        });
    });
    </script>           
<?php 


    $this->load->view('backend/footer');

?>