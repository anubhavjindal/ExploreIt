<?php include "../includes/db.php"; 
ob_start();
session_start();

if(!isset($_SESSION['user_role']))
{
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ExploreIt! Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="../js/googlecharts.js"></script>
    <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    
    

</head>

<body>