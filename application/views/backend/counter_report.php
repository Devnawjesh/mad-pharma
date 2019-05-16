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
                                   <h4 class="m-b-0 ">Counter Report</h4>
                               </div>

                               </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="reportsales" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Date</label>
                                                    <div class="col-md-4">
                                            <div class="input-daterange input-group" id="date-range">
                                                <input type="text" class="form-control start" name="start" />
                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                <input type="text" class="form-control end" name="end" />
                                            </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="counter" class="input-group form-control" value='' id="">
                                                            <option value="">Select Here...</option>
                                                            <option value="Counter1">Counter One</option>
                                                            <option value="Counter2">Counter Two</option>
                                                            <option value="Counter3">Counter Three</option>
                                                            <option value="Counter4">Counter Four</option>
                                                            <option value="Counter5">Counter Five</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="submit" name="purchase" class="form-control reportsales" placeholder="" value="Submit" >
                                                    </div>
                                                </div>                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                     <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sales Date </th>
                                                <th>Invoice Number</th>
                                                <th>Supplier Name</th>
                                                <th>Total Amount</th>
                                                <th>Counter</th>
                                                <th>Entry Name</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sales Date </th>
                                                <th>Invoice Number</th>
                                                <th>Supplier Name</th>
                                                <th>Total Amount</th>
                                                <th>Counter</th>
                                                <th>Entry Name</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="Salesreport">

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
       <script type="text/javascript">
        $(document).ready(function () {
        $(".reportsales").on('click',function (event) {
            event.preventDefault();
            //var start = $(".end").val();
           // console.log(start);
            var formval = $('#reportsales')[0];
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "GETSALESrePortBycounter",
                dataType: 'html',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response){
                //console.log(response);
                $("#Salesreport").html(response);
             
          },
          error: function(response){
            console.error();
          }
        });
        });

    });
    </script>         
<?php 
    $this->load->view('backend/footer');
?>