<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Report</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Report</li>
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
                              <div class="row">
                               <div class="col-md-6">
                                   <h4 class="m-b-0 ">  Purchase Return</h4>
                               </div>

                               </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="" method="post" id="returnpurchase" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Invoice Number</label>
                                                    <div class="col-md-7">
                                                <select class="js-purchase-data-ajax form-control purchase" name="proid" style="width:100%" id="preturn" tabindex="1"  required>
                                                </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="submit" name="purchase" class="form-control purchaseclass" placeholder="" value="Submit" >
                                                    </div>
                                                </div>                                            
                                        </form>
                                    </div>
<!--                                    <div class="col-md-6">
                                        <form action="Sales_search" method="post" id="" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Invoice Number</label>
                                                    <div class="col-md-5">
                                                        <input type="text" name="sinvoice" class="form-control" placeholder="" required >
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="sale" class="form-control salesclass" placeholder="" value="Submit" >
                                                    </div>
                                                </div>                                            
                                        </form>
                                    </div>-->

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div id="purchasesaleDOM">
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
        </div>
        <script>
           // $('.select2-search__field').focus();
</script>
  <!--Select ajax remote data search for product-->
  <script type="text/javascript">
    $(document).ready(function () {
      $(".js-purchase-data-ajax").select2({
        placeholder: "Barcode, Product name",
        allowClear: false,
          
        ajax: {
          url: "<?php echo base_url() ?>Purchase/GetPurchaseparam",
          dataType: 'json',
          type: "GET",
          data: function (term) {
            return {
              param: term.term
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function (item) {
                return {
                  text: item.invoice_no,
                  id: item.p_id
                };
              })
            };
          },
        }
      });
    });
  </script>         
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', ".purchase", function (e) {
        e.preventDefault(e);
        //select to data return an array 
        var data = $(this).select2('data');
        //so i access it by index
        var pid = data[0].id;
        console.log(pid);
        $.ajax({
          url: '<?php echo base_url() ?>Purchase/GetPurchaseSpecificdata?id=' +pid,
          method: 'GET',
          data: 'data',
        }).done(function (response) {
          console.log(response);
          $('#purchasesaleDOM').html(response);
        });
      });
    });
  </script>
      <!--Purchase calculation-->      
          <script type="text/javascript">
          $(document).ready(function () {
          $(document).on('keyup','.rqty, .total',function() { 
            //var total;  
            var gtotal = 0; 
            var rows = this.closest('#purchaserForm tr');
            var quantity = $(rows).find(".pqty"); 
            var reqty = $(rows).find(".rqty"); 
            var price = $(rows).find(".td"); 
            var qtyval = parseInt($(quantity).val()); 
            var rqtyval = Math.abs(parseInt($(reqty).val())); 
            var tradeval = parseFloat($(price).val()); 
              var total = 0;
              if(isNaN(rqtyval) == true){
                  total = 0;
             } else {
                  total =  Math.round(rqtyval * tradeval); 
              }
              
            $(rows).find('[name="total[]"]').val(total);
                    var sum = 0;
                    $(".total").each(function(index){
                           sum += parseFloat($(this).val());  
                    });

              $(".gtotal").val(sum);
          });
        });
          </script> 
<?php 

    $this->load->view('backend/footer');

?>