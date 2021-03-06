<?php
   include_once 'includes/core/session.php';
   include_once 'includes/classes/Database.php';
   include_once 'includes/core/utilities.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="Christopher Edynak">
   <meta name="generator" content="Jekyll v4.1.1">
   <!--custom page title -->
   <title><?php if(isset($page_title)) echo $page_title; ?></title>
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <script src="assets/js/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css"> 
</head>
<body>
