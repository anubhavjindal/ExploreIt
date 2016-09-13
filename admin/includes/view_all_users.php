<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Admin</th>
                                <th>Subscriber</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $query = "SELECT * FROM users";
                            $select_users = mysqli_query($connection,$query);    
                            while($row = mysqli_fetch_assoc($select_users))
                            {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_image = $row['user_image'];
                                $user_role = $row['user_role'];
                                
//                                $comment_comment_count = $row['comment_count'];
//                                $comment_date = $row['comment_date'];
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$username</td>";
                                echo "<td>$user_firstname</td>";
                                
//                                 $query = "SELECT * FROM categories WHERE cat_id= $post_category_id";
//                                $select_categories_id = mysqli_query($connection,$query);    
//                                while($row = mysqli_fetch_assoc($select_categories_id))
//                                {
//                                    $cat_id = $row['cat_id'];
//                                    $cat_title = $row['cat_title'];
//                                
//                                echo "<td>{$cat_title}</td>";
//                                
//                                }

                                echo "<td>$user_lastname</td>";
                                echo "<td>$user_email</td>";
                                echo "<td>$user_role</td>";
                                
//                                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
//                                $select_post_id_query = mysqli_query($connection,$query);
//                                while($row = mysqli_fetch_assoc($select_post_id_query))
//                                {
//                                    $post_id = $row['post_id'];
//                                    $post_title = $row['post_title'];
//                                    echo "<td><a href='../post.php?p_id=$post_id ' >$post_title</a></td>";
//                                }
                                 
                                echo "<td><a href='users.php?make_admin={$user_id}'> ADMIN </a></td>";
                                echo "<td><a href='users.php?make_sub={$user_id}'> SUBSCRIBER </a></td>";
                                echo "<td>
                                    <a href='users.php?source=edit_user&edit_user={$user_id}'> EDIT </a>
                                    <a href='users.php?delete={$user_id}'> DELETE </a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    
                   <?php ob_start();
                    if($_SESSION['user_role']=='admin'){
                        if(isset($_GET['delete']))
                        {
                            $the_user_id =mysqli_real_escape_string($connection,$_GET['delete']);
                            $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
                            $delete_query = mysqli_query($connection,$query);
                            header("Location:users.php");
                        }

                        if(isset($_GET['make_admin']))
                        {
                            $the_user_id = mysqli_real_escape_string($connection,$_GET['make_admin']);
                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id={$the_user_id}";
                            $make_admin_query = mysqli_query($connection,$query);
                            header("Location:users.php");
                        }
                        
                        if(isset($_GET['make_sub']))
                        {
                            $the_user_id = mysqli_real_escape_string($connection,$_GET['make_sub']);
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id={$the_user_id}";
                            $make_sub_query = mysqli_query($connection,$query);
                            header("Location:users.php");
                        }
                    }
                    ?>