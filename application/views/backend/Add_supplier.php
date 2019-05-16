<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
<style type="text/css">
.file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px;margin-right: 0px;margin-top: 0px;}

</style>
        <div class="page-wrapper">



            <div class="container-fluid p-t-10">

            <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Supplier/View" class="text-white"><i class="" aria-hidden="true"></i> Manage Supplier </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Supplier/Balance" class="text-white"><i class="" aria-hidden="true"></i>  Supplier Balance </a></button>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-white">New Supplier <span class="pull-right"><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">

                                <form action="" method="post" id="Smodel" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">

                                    <div class="form-body">

                                        <hr class="m-t-0 m-b-40">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Supplier Name <span class="text-danger">*</span></label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control sname" name="sname" placeholder="Supplier Name..." required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Phone Number <span class="text-danger">*</span></label>

                                                    <div class="col-md-9">

                                                        <input type="number" class="form-control sphone" placeholder="Phone Number..." name="sphone">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email </label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control semail" name="semail" placeholder="Email...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Address</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="saddress" class="form-control saddress" placeholder="Address...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Note</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control snote" name="snote" rows="1" value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12"> Image</label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <input type="file" name="img_url" id="img_url" class="form-control" aria-describedby="fileHelp">
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                    <div class="file_prev"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Status</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control status" name="status" value="" id="status">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-6 col-sm-12">
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
                                                    <canvas style="float:left;border: 1px solid #eef3f3;" id="canvas" width="220" height="180"></canvas> 
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

                                                <button type="submit" class="btn btn-info">Submit</button>

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
        
            $('#Smodel').bind('submit',function(e){
            // $("#formid").on('submit', function(e) {
                e.preventDefault();
                var dataURL = canvas.toDataURL();
                var img =$('#img_url').val();
                //
                console.log(dataURL);     
               if(img.length == 0){
                var sname = $(".sname").val();
                var sphone = $(".sphone").val();
                var semail = $(".semail").val();
                var saddress = $(".saddress").val();
                var snote = $(".snote").val();
                var status = $(".status").val();
                $.ajax({
                  type: 'POST',
                  url: "Save_Canvas",
                  dataType:'json',    
                  cache: false,
                  data: {
                    dataURL: dataURL,
                    sname: sname,
                    sphone: sphone,
                    semail: semail,
                    saddress: saddress,
                    snote: snote,
                    status: status,
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
            var formval = $('#Smodel');
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