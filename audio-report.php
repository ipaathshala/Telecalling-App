<?php
  require_once("include/config.php");
  error_reporting (E_ALL ^ E_NOTICE);
  if(!$_SESSION['user_id']){
  require_once("sign-out.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Audio Report</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Plugins css -->
    <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <?php require_once("include/header-css.php"); ?>
  </head>
  <body>
    <div id="wrapper">
      <?php 
        require_once("include/topbar.php");
        require_once("include/sidebar.php"); 
        ?>
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-20 m-t-20">
                  <div class="card-body">
                    <h4 class="mt-0 header-title">Audio Report</h4>
                    <form>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Start Telecaller</label>
                            <select class="form-control select2" id="telecaller" name="telecaller">
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Select School</label>
                            <select class="form-control select2" id="school" name="school">
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="from_dt" id="from_dt" value="<?php echo $_POST["from_dt"];?>">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="to_dt" id="to_dt" value="<?php echo $_POST["to_dt"];?>">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="alert alert-danger" role="alert" id="invtel"><strong>Error! Select Telecaller</strong></div>
                            <div class="alert alert-danger" role="alert" id="invschool"><strong>Error! Select School</strong></div>
                            <div class="alert alert-danger" role="alert" id="invschool"><strong>Error! Select Date</strong></div>
                            <div class="alert alert-danger" role="alert" id="norecord"><strong>Error! No records to show</strong> </div>
                            <div class="alert alert-danger" role="alert" id="invalid"><strong>Error! Some error occurs unable to send request</strong></div>
                            <div class="alert alert-danger" role="alert" id="fail"><strong>Error! Unable to proceed your request</strong></div>
                            <div class="alert alert-success" role="alert" id="records"><strong>Success! Records fetched successfully</strong></div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-lg-12">
                        <table class="table mb-0">
                          <thead>
                            <tr>
                              <th>Sr. No.</th>
                              <th>Student Name</th>
                              <th>Last Call Date</th>
                              <th>Call Back Date</th>
                              <th>Call Back Time</th>
                              <th>Status</th>
                              <th>Audio File</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="callreport">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("include/footer.php");?>
      </div>
    </div>
    <!-- jQuery  -->
    <?php require_once("include/footer-js.php");?>
    <!-- Plugins js -->
    <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Plugins Init js -->
    <script src="assets/pages/form-advanced.js"></script>
    <script src="custom-js/audio-call.js"></script>
  </body>
</html>