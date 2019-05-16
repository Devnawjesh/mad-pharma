<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">
<style>
.file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px;margin-right: 0px;margin-top: 0px;}
</style>

            <div class="container-fluid p-t-10">

            <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url('Medicine/View');?>" class="text-white"><i class="" aria-hidden="true"></i> Manage Medicine </a></button>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-white">New Medicine <span class="pull-right"><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" class="form-horizontal" id="formid" enctype="multipart/form-data" accept-charset="utf-8">

                                    <div class="form-body">

                                        <span class="m-t-30 m-b-40"></span>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Company Name</label>

                                                    <div class="col-md-9 col-sm-12">
                                                        <!--<select class="js-supplier-data-ajax form-control supplier" name="supplier" style="width:100%">
                                                           <?php foreach($supplierList as $value): ?>
                                                            <option value="<?php echo $value->s_id; ?>"><?php echo $value->s_name; ?></option>
                                                            <?php endforeach; ?>        
                                                        </select>-->
                                                        <input type="text" class="form-control supplier_name" name="supplier_name" placeholder="Supplier Name..."  id="supplier_name" autocomplete="off"> 
                                                        <input type="hidden" class="form-control supplier" name="supplier"  id="supplier" autocomplete="off"> 
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Product Name</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="product_name" class="form-control product_name" placeholder="Product Name" required minlength="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Generic Name</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="generic_name" class="form-control generic_name" placeholder="Generic Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Barcode Number</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="barcode" class="form-control barcode" placeholder="" value="<?php echo rand(100000000,1500000000)?>" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Strength</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="strength" class="form-control strength" placeholder="Strength" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Form</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <select name="formSelect" class="select2 formSelect" id="" style="width:100%" required>
                                                            <option value="Tablet">Tablet</option>
                                                            <option value="Capsules">Capsule</option>
                                                            <option value="Injection">Injection</option>
                                                            <option value="Eye Drop">Eye Drop</option>
                                                            <option value="Suspension">Suspension</option>
                                                            <option value="Cream">Cream</option>
                                                            <option value="Saline">Saline</option>
                                                            <option value="Inhaler">Inhaler</option>
                                                            <option value="Powder">Powder</option>
                                                            <option value="Spray">Spray</option>
                                                            <option value="Paediatric Drop">Paediatric Drop</option>
                                                            <option value="Nebuliser Solution">Nebuliser Solution</option>
                                                            <option value="Powder for Suspension">Powder for Suspension</option>
                                                            <option value="Nasal Drops">Nasal Drops</option>
                                                            <option value="Eye Ointment">Eye Ointment</option>
                                                        </select>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Trade Price</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="number" name="trade_price" class="form-control trade_price" placeholder="Trade Price" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">M.R.P.</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="number" name="mrp" class="form-control mrp" placeholder="M.R.P." required>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Box Size</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="box_size" class="form-control boxsize" placeholder="Box Size" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Box Pirce</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="number" name="box_price" class="form-control totalboxprice box_price" placeholder="Box Pirce">

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Expire Date</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="text" name="expire_date" class="form-control expire_date" placeholder="Expire Date" id="datepicker" required>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Short Quantity</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="shortstock" class="form-control shortstock" placeholder="Short Quantity" id="shortstock" required>
                                                    </div>
                                                </div>
                                            </div>
<!--                                        <div class="col-md-9 col-md-offset-3">
                                            <div class="file_prev"></div>
                                            <label for="user_image" class="custom-file-upload">Upload image</label>
                                        </div>
                                        <div class="col-md-9 col-md-offset-3">
                                            <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp" required>
                                        </div>-->
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                   
                                                    <label class="control-label text-right col-md-3 col-sm-3">Product Image</label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <input type="file" name="webcam" id="user_image" class="form-control" aria-describedby="fileHelp" value="">
                                                        
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="file_prev " id="file_prev"></div>
                                                          
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Side Effect</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <textarea class="form-control side_effect" name="side_effect" rows="1"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12"></label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input name="favourite" class="custom-control-input favourite" value="1" type="checkbox" id="regular_customer">
                                                        <label for="regular_customer">Add To Favourite</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Discount </label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="radio" name="discount" class="custom-control-input discount" value="YES"  id="discount_yes" checked>
                                                        <label for="discount_yes">Yes</label>
                                                        <input type="radio" name="discount" class="custom-control-input discount" value="NO"  id="discount_no">
                                                        <label for="discount_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Take Photo </label>
                                                    <div class="col-md-9 col-sm-12">
                                                            <video id="video" style="border: 1px solid #eef3f3;" width="220" height="180" onclick="takePhoto()" autoplay></video>
                                                            <!--<button id="btnSnap" onclick="takePhoto()">Snap Photo</button>-->
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Canvas Photo </label>
                                                    <div class="col-md-9 col-sm-12">  
                                                    <canvas style="border: 1px solid #eef3f3;float:left" id="canvas" width="220" height="180"></canvas> 
                                                    </div>
                                                </div> 
                                            </div>

                                        </div>

                                        <!--/row-->

                                    </div>

                                    <hr>

                                    <div class="form-actions text-center">

                                        <div class="row">

                                            <div class=" col-md-12 ">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">Submit</button>

                                                <button type="button" class="btn btn-inverse">Cancel</button> 
                                                </div>   

                                                <br>
                                                <br>

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
<script>
$( function() {
$(this.target).find('input').autocomplete();
 $( "#supplier_name" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "<?php echo base_url() ?>purchase/GetSupplierByid",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function(data) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
   // Set selection
   $('#supplier_name').val(ui.item.label); // display the selected text
   $('#supplier').val(ui.item.value); // display the selected text
    $("#supplier_name").autocomplete('close');
   return false;
  },
 });
 });
</script> 
        
    <script>
        var canvas, context, video, videoObj;

        $(function () {
            canvas = document.getElementById("canvas");
            context = canvas.getContext("2d");
            video = document.getElementById("video");

            // different browsers provide getUserMedia() in differnt ways, so we need to consolidate 
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||  navigator.mozGetUserMedia;

            if (navigator.getUserMedia) {
                navigator.getUserMedia(
                   { video : true }, // which media
                   function (stream) {   // success function
                       video.src = window.URL.createObjectURL(stream);
                       video.onloadedmetadata = function (e) {
                           video.play();
                       };
                   },
                   function (err) {  // error function 
                       console.log("The following error occured: " + err.name);
                   }
              );
            } 
            else {
                console.log("getUserMedia not supported");
            }
        });

        function takePhoto() {
            context.drawImage(video, 0, 0, 220, 180);
        }
        
            $('#formid').bind('submit',function(e){
            // $("#formid").on('submit', function(e) {
                e.preventDefault();
                var dataURL = canvas.toDataURL();
                var img =$('#user_image').val();
                //
                //console.log(img);
               if(img.length == 0){
                var supplier = $(".supplier").val();
                var product_name = $(".product_name").val();
                var generic_name = $(".generic_name").val();
                var favourite = $(".favourite").val();
                var barcode = $(".barcode").val();
                var strength = $(".strength").val();
                var formSelect = $(".formSelect").val();
                var box_size = $(".boxsize").val();
                var trade_price = $(".trade_price").val();
                var mrp = $(".mrp").val();
                var box_price = $(".totalboxprice").val();
                var side_effect = $(".side_effect").val();
                var discount = $(".discount").val();
                var expire_date = $(".expire_date").val();
                var shortstock = $(".shortstock").val();
                $.ajax({
                  type: 'POST',
                  url: "Save_Canvas",
                  dataType:'json',    
                  cache: false,
                  data: {
                    dataURL: dataURL,
                    supplier: supplier,
                    product_name: product_name,
                    generic_name: generic_name,
                    favourite: favourite,
                    barcode: barcode,
                    strength: strength,
                    formSelect: formSelect,
                    box_size: box_size,
                    trade_price: trade_price,
                    mrp: mrp,
                    box_price: box_price,
                    side_effect: side_effect,
                    discount: discount,
                    expire_date: expire_date,
                    shortstock: shortstock,
                  },
                  success: function(response){
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
              } else if(response.status == 'success') {
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
                window.setTimeout(function() {
                    window.location = response.curl;
                }, 3000);
              }
                  }
                });
                } else {
            var formval = $('#formid');
            var data = new FormData(this);
            console.log(data);
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                // url: "crud/Add_userInfo",
                url: "Save",
                dataType:'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
              } else if(response.status == 'success') {
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                  console.log(response);
                window.setTimeout(function() {
                    window.location = response.curl;
                }, 3000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });
                }
            });
/*        function savePhoto() {
            var data = canvas.toDataURL();
            var title = $("#title").val();

            $.ajax({
                type: "POST",
                url: "savephoto.aspx",
                data: {
                    photo: data,
                    title: title
                }
            }).done(function (o) {
                alert("Photo Saved Successfully!");
            });
        }*/
    </script>
                <script type="text/javascript">
                    $('.boxsize , .mrp').on('input', function() {
                        var boxprice = $('.boxsize').val();
                        var mrp = $('.mrp').val();
                        console.log('mrp');
                        $('.totalboxprice').val((boxprice * mrp ? boxprice * mrp : 0).toFixed(2));
        
                    });
                </script>
<script type="text/javascript">
    $(document).ready(function () {
	$(".js-supplier-data-ajax").select2({

	    ajax: {
	        url: "<?php echo base_url(); ?>purchase/GetSupplierByid",
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
		                    text: item.s_name,
		                    id: item.s_id
		                };
		            })
		        };
	        },
	    }
	});
	});
</script>
<script>
$("#user_image").on("change", function() {
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