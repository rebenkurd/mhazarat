<?php ob_start(); ?>
<?php include("configs/init.php"); ?>
<?php if(!$session->is_signed_in()){
    RedirectTo("login.php");
 } 

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mhazarat</title>
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/rtl.css">

</head>
<body id="btnBody">