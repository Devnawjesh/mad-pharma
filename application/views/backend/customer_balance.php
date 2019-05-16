<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
<div class="flashmessage"> </div>
        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Customer Balance</h3>

                </div>
                
                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Customer Balance</li>

                    </ol>

                </div>

            </div>

            <div class="container-fluid">



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

                                <h4 class="m-b-0 text-white">Customer </h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="mymTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Customer ID</th>

                                                <th>Customer Name</th>

                                                <th>Total Amount</th>

                                                <!--<th>Target</th>-->

                                                <th>Paid Amount</th>
                                                <th>Due Amount</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                           <?php foreach($balancesheet as $value): ?> 

                                            <tr>

                                                <td><?php echo $value->c_id; ?></td>

                                                <td><?php echo $value->c_name; ?></td>

                                                <td><?php echo $value->total_balance; ?></td>

                                                <td><?php echo $value->total_paid; ?></td>
                                                <td><?php echo $value->total_due; ?></td>


                                                <td class="jsgrid-align-center ">
                                                   <?php if($value->total_due > 0) { ?>

                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light cbalanceid" data-id="<?php echo $value->c_id; ?>" id="cbalanceid"><i class="fa fa-pencil-square-o"></i></a>
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

    
    <!-- Modal HTML -->
<div class="modal fade" id="cbalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="Update_Balance" method="post"  id="cmodel"  class="form-horizontal"  enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Customer Name</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="cname" placeholder="Customer name" required minlength="1" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Total Amount </label>
                                    <div class="">
                                        <input type="text" class="form-control total" name="total" placeholder="Total Amount" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label text-right">Paid Amount</label>
                                    <div class="">
                                        <input type="text" class="form-control paid" name="paid" placeholder="Total Paid" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tamount">
                                <div class="form-group">
                                    <label class="control-label text-right">Due Amount</label>
                                    <div class="">
                                        <input type="text" name="due" class="form-control due" placeholder="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="tamount">
                                <div class="form-group">
                                    <label class="control-label text-right">Pay Amount</label>
                                    <div class="">
                                        <input type="text" name="pay" max="" class="form-control pay" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              <div class="modal-footer">
               <input type="hidden" name="id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
              </form>
            </div>
          </div>
    </div>
           <script type="text/javascript">
                $(document).ready(function () {
                    $(".cbalanceid").click(function (e) {
                        e.preventDefault(e);
                        // Get the record's ID via attribute  
                        var iid = $(this).attr('data-id');
                        //console.log(iid);
                         $('#cmodel').trigger("reset");
                         $('#cbalance').modal("show"); 
                        $.ajax({
                            url: '<?php echo base_url();?>Customer/GetCustomerBalanceBYId?id=' + iid,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                        }).done(function (response) {
                            console.log(response);
                            // Populate the form fields with the data returned from server
                            $('#cmodel').find('[name="id"]').val(response.mvalue.customer_id).end();
                            $('#cmodel').find('[name="total"]').val(response.mvalue.total_balance).end();
                            $('#cmodel').find('[name="paid"]').val(response.mvalue.total_paid).end();
                            $('#cmodel').find('[name="due"]').val(response.mvalue.total_due).end();
                            $('#cmodel').find('[name="cname"]').val(response.mvalue.c_name).end();
                            $('#cmodel').find('[name="pay"]').attr("max",response.mvalue.total_due).end();
        				});
                    });
                });               
            </script>
<?php 

    $this->load->view('backend/footer');

?>
    <script>
    $(document).ready(function() {
        $('#mymTable').dataTable( {
        "aaSorting": [[1,'desc']],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
    });
        });
    </script>
<!--   Input value calculation
    <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.pay',function() {
/*            var rows = this.closest('#cmodel input');
            var paid = $(rows).find(".paid"); 
            var due = $(rows).find(".due"); 
            var pay = $(rows).find(".pay");  */
            var paidval =$('.paid').val();
            var dueval =$('.due').val();
            var payval =parseFloat($('.pay').val());
            console.log(payval);
           
            var paidt = payval + paidval;
                  //$(".due").val(Math.abs(returnval).toFixed(2));
              $(".paid").val(paidt);

          });
        });
          </script> -->