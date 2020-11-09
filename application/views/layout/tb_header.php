<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$judul;?></title>

  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <!-- Custom fonts for this template -->
  <link href="<?=base_url('assets/layout/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url('assets/layout/');?>css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?=base_url('assets/layout/');?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom Loader Screen Css-->
  <link href="<?=base_url('assets/myassets/');?>css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/layout/');?>vendor/sweetalret2/dist/sweetalert2.min.css">

  <style type="text/css">
    /* a.collapse-item{
      color: darkorange;
    } */
    img.img-profile{
      box-shadow: 0px 0px 0px 1px darkorange, 
      0px 0px 0px 2px orange,
      0px 0px 0px 3px darkorange,
      0px 0px 0px 4px orange;
    }
  </style>
</head>
<!-- loader -->
<div id="haraptunggu"></div>
<!-- loader -->

<body id="page-top" onload="setInterval('displayServerTime()', 1000);">
  <!-- Page Wrapper -->
  <div id="wrapper">