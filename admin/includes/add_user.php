<?php ob_start();
    if(isset($_POST['create_user']))
    {
//        $user_id = $_POST['user_id']; 
//        $user_id = mysql_real_escape_string($user_id);
        $user_firstname = $_POST['user_firstname'];
        $user_firstname = mysql_real_escape_string($user_firstname);
        $user_lastname = $_POST['user_lastname'];
        $user_lastname = mysql_real_escape_string($user_lastname);
        $user_role = $_POST['user_role'];
        
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $username = $_POST['username'];
        $username = mysql_real_escape_string($username);
        $user_email = $_POST['user_email'];
        $user_email = mysql_real_escape_string($user_email);
        $password = $_POST['user_password'];
        $password = mysql_real_escape_string($password);
        $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
//        $post_date = date('d-m-y');

        
//        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
        $query.= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}',
        '{$username}','{$user_email}','{$password}') ";
        
        $create_user_query = mysqli_query($connection,$query);
        
        if(!$create_user_query)
        {
            die('UNABLE TO ADD USER '.mysqli_error($connection));
        }
        else
        {
            header("Location:users.php");
            echo "User successfully added :-)";
        }
    }
?>
  

  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
        <select name="user_role" id="">
           <option value="subscriber">Select Option</option>
           <option value="admin">ADMINISTRATOR</option>
           <option value="subscriber">SUBSCRIBER</option> 
        </select>
   </div>
    
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
-->
    
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    

</form>