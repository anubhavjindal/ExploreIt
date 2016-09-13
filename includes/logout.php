<?php
    ob_start();
    session_start();

    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['user_role'] = null;
    echo "<script>alert('You have been logged out');</script>";
    $Message = "You have been logged out";
    header("Location: ../index.php?message=".$Message); 
   
?>