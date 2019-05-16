<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Invoice</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Invoice</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Manage Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="mymTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Invoice No</th>
                                                <th>Customer Name</th>
                                                <th>Customer Type</th>
                                                <th>Create Date</th>
                                                <th>Total Amount</th>
                                                <th>Total Paid</th>
                                                <th>Total Due</th>
                                                <th>View</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                           <?php foreach($invoice as $value): ?>
                                            <tr>
                                                <td><?php echo $value->invoice_no; ?></td>
                                                <td><?php if(empty($value->c_name)){ echo 'Walk In';} else { echo $value->c_name; } ?></td>
                                                <td><?php if(empty($value->c_type)){ echo 'Walk In';} else { echo $value->c_type; } ?></td>
                                                <td><?php echo date('d/m/Y',$value->create_date); ?></td>
                                                <td><?php echo $value->total_amount; ?></td>
                                                <td><?php echo $value->paid_amount; ?></td>
                                                <td><?php echo $value->due_amount; ?></td>
                                                <td><a href="" title="Edit" data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-sm btn-info waves-effect waves-light invoicegenerator"  data-id="<?php echo $value->sale_id; ?>"><i class="fa fa-eye"></i></a></td>
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
<div id="invoicemodal" class="modal fade" role="dialog" >
  <div class="modal-dialog" style="width: 350px;">
    <!-- Modal content-->
    <div class="modal-content" id="invoicedom">

    </div><!-- ./model-content  -->
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
  </div>
</div> 
<?php 
    $this->load->view('backend/footer');
?>
   <script>
$( ".close" ).click(function() {
  location.reload();
});  
 </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', ".invoicegenerator", function (e) {
        e.preventDefault(e);
        var sid = $(this).attr('data-id');
        $.ajax({
          url: '<?php echo base_url() ?>Sales/GetSalesInvoiceReport?id=' + sid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          //console.log(response);
          $('#invoicedom').html(response);
          $("#invoicemodal").modal("show"); 
        });
      });
    });
  </script>     
    <script>
    $(document).ready(function() {
$('#mymTable').dataTable( {
        "aaSorting": [[3,'desc']],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]    
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