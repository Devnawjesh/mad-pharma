<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Dues Invoice</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Dues Invoice</li>

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
                                                <th>Invoice No</th>
                                                <th>Supplier Name</th>
                                                <th>Purchase Date</th>
                                                <th>Total Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Due Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($duesvalue as $value): ?> 
                                            <tr>
                                                <td><?php echo $value->invoice_no; ?></td>
                                                <td><?php echo $value->s_name; ?></td>
                                                <td><?php echo date('d/m/Y',$value->pur_date) ?></td>
                                                <td><?php echo $value->total_amount; ?></td>
                                                <td><?php echo $value->paid_amount; ?></td>
                                                <td><?php echo $value->due_amount; ?></td>

                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Delete" class="btn btn-sm btn-info waves-effect waves-light duesid" data-id="<?php echo $value->pur_id; ?>"><i class="fa fa-paypal"></i></a> 

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
<div class="modal fade" id="sbalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="post"  id="smodel"  class="form-horizontal"  enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Supplier Name</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="sname" placeholder="Supplier name"  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Pay Type</label>
                                        <select name="mtype" id="mtype" class="form-control" required>
                                            <option value="">Select Here</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="bankid">
                                <div class="form-group">
                                    <label class="control-label text-right">Bank Name </label>
                                    <select class="select2 form-control" name="bankid" style="width:100%" >
                                    <option value="">Select Bank..</option>
                                    <?php foreach($bankinfo as $value): ?>
                                    <option value="<?php echo $value->bank_id; ?>"><?php echo $value->bank_name; ?></option>
                                    <?php endforeach; ?>       
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="cheque">
                                <div class="form-group">
                                    <label class="control-label text-right">Cheque No</label>
                                    <div class="">
                                        <input type="text" name="cheque"  class="form-control" placeholder="Cheque No..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="issuedate">
                                <div class="form-group">
                                    <label class="control-label text-right">Issue Date</label>
                                    <div class="">
                                        <input type="text" name="issuedate"  class="form-control datepicker" placeholder="Issue Date" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="rnamr">
                                <div class="form-group">
                                    <label class="control-label text-right">Receiver Name</label>
                                    <div class="">
                                        <input type="text" name="rname" id="rname" class="form-control" placeholder="Receiver Name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="rcontact">
                                <div class="form-group">
                                    <label class="control-label text-right">Receiver Contact</label>
                                    <div class="">
                                        <input type="text" name="rcontact" id="rcontact" class="form-control" placeholder="Receiver Contact" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tamount">
                                <div class="form-group">
                                    <label class="control-label text-right">Due Amount</label>
                                    <div class="">
                                        <input type="text" name="due" id="due" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tamount">
                                <div class="form-group">
                                    <label class="control-label text-right">Pay Amount</label>
                                    <div class="">
                                        <input type="text" name="pay" id="pay" class="form-control" placeholder="Pay Amount..." value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tamount">
                                <div class="form-group">
                                    <label class="control-label text-right">Payment Date</label>
                                    <div class="">
                                        <input type="text" name="paydate" class="form-control datepicker" placeholder="Pay Date" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              <div class="modal-footer">
               <input type="hidden" name="sid" value="">
               <input type="hidden" name="pid" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="FinalPrint" class="btn btn-info">Pay & Invoice</button>
              </div>
              </form>
            </div>
          </div>
    </div>
<!--Invoice and print view Modal-->
<div class="modal fade" id="invoicemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="75%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo base_url(); ?>assets/images/home_logo.png" height="80" width="110" style="margin-left:330px" alt="homepage" class="dark-logo" />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="invoicedom">

      </div>
      <div class="modal-footer">
        <div class='text-right'>
            <input id='print' class='btn btn-default btn-outline print' type='submit' value='Print'>
        </div>
      </div>
    </div>
  </div>
</div> 
      <!-- Print and Submit-->           
       <script type="text/javascript">
        $(document).ready(function () {
        $("#FinalPrint").on('click',function (event) {
            event.preventDefault();    
            var formval = $('#smodel')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "Save_Bill",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response){
                //console.log(response);
                $("#invoicedom").html(response);
                $("#invoicemodal").modal("show");             
          },
          error: function(response){
            console.error();
          }
        });
        });

    });
    </script>             
       <script type="text/javascript">
            $(document).ready(function () {           
            $('#mtype').on('change', function(e) {

                e.preventDefault(e);

                // Get the record's ID via attribute  

                var type = $('#mtype').val();
                console.log(type);
                if(type =='Cheque'){
                    console.log(type);
                    $('#cheque').show();
                    $('#issuedate').show();
                    $('#bankid').show();
                    $('#rnamr').show();
                    $('#rcontact').show();
                } 

                else if(type =='Cash'){

                    console.log(type);
                    $('#rnamr').show();
                    $('#rcontact').show();
                    $('#cheque').hide();
                    $('#issuedate').hide();
                    $('#bankid').hide();  
                }

            });

                    $('#cheque').hide();
                    $('#issuedate').hide();
                    $('#bankid').hide();                
            });
        </script>           
           <script type="text/javascript">

        $(document).ready(function () {

            $(".duesid").click(function (e) {

                e.preventDefault(e);

                // Get the record's ID via attribute  

                var iid = $(this).attr('data-id');
                console.log(iid);
                $('#smodel').trigger("reset");
                $('#sbalance').modal('show'); 
                $.ajax({
                    url: '<?php echo base_url();?>Supplier/GetsupplierBalanceBYID?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server
                    $('#smodel').find('[name="sid"]').val(response.mvalue.supplier_id).end();
                    $('#smodel').find('[name="pid"]').val(response.mvalue.pur_id).end();
                    $('#smodel').find('[name="sname"]').val(response.mvalue.s_name).end();
                    $('#smodel').find('[name="due"]').val(response.mvalue.due_amount).end();
                });
            });
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
            $("div#invoicedom").printArea(options);
        });
    });
    </script> 
<script>
    $(document).ready(function() {
        $(".close").click(function() {
            location.reload()
        });
    });
    </script>               
<?php 

    $this->load->view('backend/footer');

?>