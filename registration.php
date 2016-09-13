<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        
        if(!empty($username) && !empty($email) && !empty($password) && !empty($firstname)){
        
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        
        $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

        $query = "INSERT INTO users(user_firstname,user_lastname,username, user_email, user_password,user_role) ";
        $query.= "VALUES('{$firstname}','{$lastname}','{$username}','{$email}','".$password."','subscriber') ";
        $create_user_query = mysqli_query($connection,$query);
        if(!$create_user_query)
        {
            die('UNABLE TO ADD USER '.mysqli_error($connection));
            header( "refresh:2;url=registration.php" );
        }
        else
        {
            $message = "CONGRATS :) <br>You have been registered successfully";
            header( "refresh:2;url=index.php" );
        }   
        }
        else
        {
            $message = "Fields cannot be empty!";
        }
        }
        else
        {
            $message = " ";
        }
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>

<?php include "includes/footer.php";?>
