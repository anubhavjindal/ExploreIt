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
                            Comments
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
                            case 'add_post':
                                include "includes/add_post.php";
                                break;
                            case 'edit_post':
                                include "includes/edit_post.php";
                                break;
                            default:
                                include "includes/view_all_comments.php";
                        }
                    ?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>
