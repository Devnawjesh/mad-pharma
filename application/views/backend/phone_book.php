<?php $this->load->view('backend/header');?>
<?php  $this->load->view('backend/sidebar');?>

      <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Phone Book</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Phone Book</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        
            <div class="container-fluid">
<!--
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="#" class="text-white"  data-toggle="modal" data-target=".bs-example-modal-lg"><i class="" aria-hidden="true"></i> Add Phone Number</a></button>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Manage Hospital </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($phonebook as $value): ?>
                                            <tr>
                                                <td><?php echo $value->c_name ?></td>
                                                <td><?php echo $value->cus_contact ?></td>
                                                <td><?php echo $value->c_email ?></td>
                                                <td><?php echo $value->c_address ?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Information</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body ">
                                <div class="flashmessage"></div>
                                <form class="row" method="post" action="add_hospital.php">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="control-label">Name  </label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="contact" class="control-label">Phone Number </label>
                                        <input type="text" class="form-control" id="contact" name="contact">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="control-label">Email </label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address" class="control-label">Address </label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" id="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 GenIT Bangladesh </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

        <script>
             $("#submit").on("click", function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>help/add_phonebook",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        'name': $('#name').val(),
                        'contact': $('#contact').val(),
                        'email': $('#email').val(),
                        'address': $('#address').val()
                    },
                    success: function(response) {
                        if(response.error) {
                            $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.error);
                        } else {
                            $('#submit').html('Saved');
                            $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                            window.setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }
                    },
                    error: function(response) {
                        console.error();
                    }
                });
            });

        </script>

<?php $this->load->view('backend/footer');?>