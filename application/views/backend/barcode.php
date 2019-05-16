<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Custom Barcode</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Manage Barcode</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Manage Barcode </h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="" enctype="multipart/form-data">
                                   <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="recipient-name" class="control-label">Medicine Name  </label>
                                        <select class='medicineid form-control select2' id='' name='medicineid' autocomplete='off' tabindex='-1' aria-hidden='true'>
                                            <?php foreach($medicineList as $value): ?>
                                             <option value="<?php echo $value->product_id?>"><?php echo $value->product_name.($value->batch_no)?></option>            
                                             <?php endforeach; ?>                           
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="recipient-name" class="control-label">Quantity</label>
                                        <input type="text" class="form-control qty" name="qty" id="recipient-name"> 
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="barcodesubmit" class="btn btn-info" value="Submit">
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div id="fullpage">
                <div class="row el-element-overlay">

                   
                    
                </div>
                
                <div class="text-right">
                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>
                </div>
                </div>
<script>
                $(document).ready(function () {
                $(document).on('click','#barcodesubmit',function(e){
                e.preventDefault(e);
                var mid = $('.medicineid').val();
                var qty = $('.qty').val();
                //console.log(cid);
                console.log(mid);
                $.ajax({
                url: 'GetbarcodeInfo?id=' + mid+'&qty=' + qty,
                method: 'GET',
                data: '',
                }).done(function (response) {
                    //var rows = $('table').find("#medicine");
                console.log(response);
                $(".el-element-overlay").append(response);
                //$(rows).html(response);
                    
                    });
                });
                });
</script>                       
                        
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
        </div>
          
<?php 

    $this->load->view('backend/footer');?>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div#fullpage").printArea(options);
        });
    });
    </script>
