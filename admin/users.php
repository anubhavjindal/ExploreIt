<?php include "includes/admin_header.php";
include "functions.php"; 
ob_start(); ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header">
                            Users
                    </h1>
                    <?php
                        if(isset($_GET['source']))
                        {
                            $source = $_GET['source'];
                        }
                        else
                        {
                            $source = '';
                        }
                        switch($source)
                        {
                            case 'add_user':
                                include "includes/add_user.php";
                                break;
                            case 'edit_user':
                                include "includes/edit_user.php";
                                break;
                            default:
                                include "includes/view_all_users.php";
                        }
                    ?>
                </div>

            </div>

        </div>

<?php include "includes/admin_footer.php" ?>
