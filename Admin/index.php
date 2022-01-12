<?php
session_start();
require("../database/connection.php");
if (!$_SESSION['no']) {
  header("Location: ../login");
} else {


?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Covid-19</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- create -->
    <link rel="stylesheet" href="../Themes/main.css">
    <!-- create js -->
    <script src="../js/main.js"></script>
    <!-- data table -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  </head>

  

  <body>

    <!-- Sidenav -->
    <?php $page = isset($_GET["page"]) ? $_GET["page"] : ''; ?>
    <?php $sNo = isset($_GET["no"]) ? $_GET["no"] : ''; ?>
    <?php 
     
      
    
      include 'menu.php';
      ?>
  
    <!-- Main content -->
    <div class="main-content" id="panel">
      <?php include 'head.php'; ?>
    
      <div class="container-fluid mt--6">
        <div class="row">
        <?php include '../component/Alert.php'; ?>
          <?php
          if ($page == "dashboard") {
           
            include 'content.php';
          }else if ($page == "dashboard2"){
            include 'content2.php';
          }else if ($page == "dashboard3"){
            include 'content3.php';
          }else if ($page == "manage_user"){
            include 'manage_user.php';
          }else if ($page == "dashboard4"){
            header('location: ../index_data.php');
          }else{
            include 'content.php';
          }
          ?>
          <!-- Footer -->
        </div>
        <?php include '../component/Footer.php';
        ?>
      </div>
    </div>

    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- script php -->
    <?php include('../Api_provinces/script.php'); ?>
    <!-- data table -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
  </body>

  </html>

<?php } ?>