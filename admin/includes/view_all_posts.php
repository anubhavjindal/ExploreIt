<?php 
    if(isset($_POST['checkBoxArray']))
    {
        foreach($_POST['checkBoxArray'] as $postValueId)
        {
            $bulk_options = $_POST['bulk_options'];
            switch($bulk_options)
            {
                case 'published':
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                    $update_to_published_query = mysqli_query($connection,$query);
                    if(!$update_to_published_query)
                    {
                        die('UNABLE TO CHANGE POST STATUS TO published '.mysqli_error($connection));
                    }
                    break;
                case 'draft':
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                    $update_to_draft_query = mysqli_query($connection,$query);
                    if(!$update_to_draft_query)
                    {
                        die('UNABLE TO CHANGE POST STATUS TO draft '.mysqli_error($connection));
                    }
                    break;
                case 'delete':
                    $query = "DELETE FROM posts  WHERE post_id = {$postValueId} ";
                    $bulk_delete_query = mysqli_query($connection,$query);
                    if(!$bulk_delete_query)
                    {
                        die('UNABLE TO DELETE posts :( '.mysqli_error($connection));
                    }
                    break;
            }
        }
    }
?>
<form action="" method="post">  
    <div id="bulkOptionsContainer" class="col-xs-4">
      <select name="bulk_options" id="" class="form-control">
          <option value="">Select Option</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
      </select>
    </div>
    <div class="col-xs-4">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div>
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><input id='selectAllBoxes' type='checkbox'></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Views</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
       <?php
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection,$query);    
        while($row = mysqli_fetch_assoc($select_posts))
        {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_views_count = $row['post_views_count'];
            echo "<tr>"; ?>

            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' 
            value='<?php echo $post_id; ?>'></td>

            <?php
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td><a href='../post.php?p_id=$post_id ' >$post_title</a></td>";

             $query = "SELECT * FROM categories WHERE cat_id= $post_category_id";
            $select_categories_id = mysqli_query($connection,$query);    
            while($row = mysqli_fetch_assoc($select_categories_id))
            {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

            echo "<td>{$cat_title}</td>";

            }
    //                                echo "<td>$post_category_id</td>";



            echo "<td>$post_status</td>";
            echo "<td><img width='100' class='img-responsive' src='../images/$post_image' alt='image'></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo"<td>{$post_views_count}</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'> EDIT </a>
            <a onClick=\"javascript:return confirm('Are you sure you want to delete?')\" href='posts.php?delete={$post_id}'>DELETE </a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</form>
                    
<?php ob_start();
    if(isset($_GET['delete']))
    {
        $the_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:posts.php");
    }
?>