<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="container-fluid p-t-10">
                <div class="flashmessage"></div>
<style>
.file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px;margin-right: 0px;margin-top: 0px;}
</style>
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/View" class="text-white"><i class="" aria-hidden="true"></i> Manage Customer </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/Regular" class="text-white"><i class="" aria-hidden="true"></i> Regular Customer </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/Wholesale" class="text-white"><i class="" aria-hidden="true"></i> Wholesale Customer </a></button>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-white">New Customer <span class="pull-right date-display"><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">

                                <form action="" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="col-md-3"></label>

                                                    <div class="col-md-9">

                                                            <input name="ctype" value="Regular" class="ctype  customer-type" data-value="Regular" type="radio" id="radio_1" checked="">

                                                            <label for="radio_1">Regular Customer</label>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="col-md-3"></label>

                                                    <div class="col-md-9">

                                                            <input name="ctype" class="active" class="ctype  customer-type" value="Wholesale" data-value="Wholesale" type="radio" id="radio_2">

                                                            <label for="radio_2">Wholesale Customer</label>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Customer Name</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control cname" name="cname" placeholder="Customer Name" required minlength="1" value="" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="storeneme" style="display:none">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Pharmacy Name</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control pname" name="pname" placeholder="Phrmacy Name" required minlength="1" value="" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Phone Number</label>

                                                    <div class="col-md-9">

                                                        <input type="number" class="form-control cphone" name="cphone" placeholder="Phone Number" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Email </label>

                                                    <div class="col-md-9">

                                                        <input type="email" class="form-control cemail" name="cemail" placeholder="Email">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Address</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control caddress" name="caddress" placeholder="address">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="tamount">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Target Amount</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="tamount" class="form-control tamount" placeholder="">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="cregular">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Regular Discount</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="rdiscount" class="form-control rdiscount" placeholder="" >

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="tdiscount">

                                                <div class="form-group row" >

                                                    <label class="control-label text-right col-md-3">Target Discount</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="tdiscount" class="form-control tdiscount" placeholder="Discount">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Note</label>

                                                    <div class="col-md-9">

                                                        <textarea class="form-control cnote" name="cnote" rows="1"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                   
                                                    <label class="control-label text-right col-md-3 col-sm-12">Image</label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <input type="file" name="img_url" id="img_url" class="form-control" aria-describedby="fileHelp">
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="file_prev" ></div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-6 col-sm-12">
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Take Photo </label>
                                                    <div class="col-md-9 col-sm-12">
                                                            <video id="video" width="220" height="180" onclick="takePhoto()" autoplay></video>
                                                            <!--<button id="btnSnap" onclick="takePhoto()">Snap Photo</button>-->
                                                    </div>
                                                </div>
                                            </div>                                             
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Canvas Photo </label>
                                                    <div class="col-md-9 col-sm-12">  
                                                    <canvas style="float:left" id="canvas" width="220" height="180"></canvas> 
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

                                                <input type="submit" name="" class="btn btn-info" value="Submit">

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

                                    <script>

                                        $(document).ready(function () {

                                            $('#cmodel input').on('change', function(e) {

                                                e.preventDefault(e);

                                                // Get the record's ID via attribute  

                                                var type = $('input[name=ctype]:checked', '#cmodel').attr('data-value');

                                                if(type =='Regular'){

                                                    console.log(type);

                                                    $('#tamount').show();

                                                    $('#cregular').show();

                                                    $('#tdiscount').show();
                                                    $('#storeneme').hide();

                                                } 

                                                else if(type =='Wholesale'){

                                                    console.log(type);

                                                    $('#tamount').hide();

                                                    $('#cregular').hide();

                                                    $('#tdiscount').hide();  
                                                    $('#storeneme').show();  

                                                }
/*
                                                else if(type =='WalkIn'){

                                                    console.log(type);

                                                    $('#tamount').hide();

                                                    $('#cregular').hide();

                                                    $('#tdiscount').hide();  
                                                    $('#storeneme').hide();  

                                                }*/

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
        
            $('#cmodel').bind('submit',function(e){
            // $("#formid").on('submit', function(e) {
                e.preventDefault();
                var dataURL = canvas.toDataURL();
                var img =$('#img_url').val();
                //
                console.log(dataURL);
               if(img.length == 0){
                var ctype = $(".ctype").val();
                var cname = $(".cname").val();
                var pname = $(".pname").val();
                var cemail = $(".cemail").val();
                var cphone = $(".cphone").val();
                var caddress = $(".caddress").val();
                var tamount = $(".tamount").val();
                var rdiscount = $(".rdiscount").val();
                var tdiscount = $(".tdiscount").val();
                var cnote = $(".cnote").val();
                $.ajax({
                  type: 'POST',
                  url: "Save_Canvas",
                  dataType:'json',    
                  cache: false,
                  data: {
                    dataURL: dataURL,
                    ctype: ctype,
                    cname: cname,
                    pname: pname,
                    cphone: cphone,
                    cemail: cemail,
                    caddress: caddress,
                    tamount: tamount,
                    rdiscount: rdiscount,
                    tdiscount: tdiscount,
                    cnote: cnote,
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
            var formval = $('#cmodel');
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
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
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
        </div>

<?php 

    $this->load->view('backend/footer');

?>