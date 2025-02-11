<?php 
ob_start();

if(isset($_GET['p_id'])){
    $new_id = $_GET['p_id'] ;

}

                $rule ="SELECT * FROM post where item_id=$new_id";
                $new_p_id =mysqli_query($connect,$rule) ;
                while($view=mysqli_fetch_assoc($new_p_id)){
                    $item_id =$view['item_id'];
                    $item_category_id=$view['item_category_id'];
                    $item_name=$view['item_name'];
                    $item_image =$view['item_image'];
                    $item_price=$view['item_price'];
                    $item_description =$view['item_description'];
                    $item_tags=$view['item_tags'];
                    $item_created_date =$view['item_created_date'];
                    $item_creator=$view['item_creator'];
                  
                }

                if(isset($_POST['update_item'])){
                    $title =$_POST['title'];
                    $post_category =$_POST['item_category'];
                    $author =$_POST['creator'];
                    $items_price =$_POST['item_price'];

                    $post_image =$_FILES['item_image']['name'];
                    $post_image_temp =$_FILES['item_image']['tmp_name'];

                    $post_tags =$_POST['item_tags'];
                    $post_description =$_POST['item_description'];
                   
                    $post_date=date('y-m-d');

                    move_uploaded_file($post_image_temp ,"../include/item_img/$post_image") ;

    

                    if(empty($post_image)){
                        $new="SELECT * FROM post WHERE item_id=$new_id" ;
                        $CON =mysqli_query($connect,$new);
                        while($ro =mysqli_fetch_assoc($CON)){
                            $post_image =$ro['item_image'];
                        }
                    }


            $query  = mysqli_prepare($connect,"UPDATE post SET item_category_id =? ,item_name =?, item_image =? ,item_description =?, item_price =?, item_tags =?,item_created_date =? ,item_creator=? WHERE item_id = ? ");
            mysqli_stmt_bind_param($query, 'isssisssi', $post_category, $title,$post_image,$post_description,$items_price,$post_tags,$post_date,$author,$item_id);
            mysqli_stmt_execute($query);


            if(!$query){
         
             die("QUERY FAILED" . mysqli_error($connect));
         
         }

         mysqli_stmt_close($query);

       
    /*  
    
    
    **** prepare statement sara try korcilam ,,problem hyeclo
    
    $query = "UPDATE post SET ";
               $query .= "item_category_id ='$post_category', ";

            $query .= "item_name ='$title', ";
        
            $query .="item_image ='$post_image', ";

            $query .="item_description ='$post_description', ";

            $query .="item_price = '$items_price', " ;

            $query .="item_tags ='$item_tags',  ";
            
            
                
                
                
            $query .="item_creator='$item_creator', ";
            $query .="item_created_date ='$post_date' ";
            
            $query .="WHERE item_id= '$new_id' ";

            $update =mysqli_query($connect,$query);     */
            
           // header("Location: item_post.php?source=edit_posts&p_id=$new_id");
            echo "<p>Post Updated<a href='../view_individual_post.php?item_id=$new_id'> View Post</a> or <a href='item_post.php'> Edit More Post</a></p>" ;
        
            
           


        }
            



?>


<form action="" method="post" enctype="multipart/form-data">
    <br>
    <br>

    <div class="form-group">
        <label for="title">Item Title</label>
        <input value="<?php echo $item_name ; ?>" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
    <label for="post_status">Item Category</label><br>
        <select name="item_category" id="">
        <?php 
       $setting ="SELECT * FROM post WHERE item_id=$new_id" ;
       $connoo =mysqli_query($connect, $setting);
       while ($dataaa=mysqli_fetch_assoc($connoo)) {
        $item_id = $dataaa['item_id'] ;
        $item_category_id = $dataaa['item_category_id'] ;

        $settingg ="SELECT * FROM categories WHERE id=$item_category_id" ;
       $connooo =mysqli_query($connect, $settingg);
       while ($dataaa=mysqli_fetch_assoc($connooo)) {
        $cate_id = $dataaa['id'] ;
        $categorry_name = $dataaa['category_name'] ;
        
        echo "<option  value='$cate_id'>$categorry_name</option>";
       } 
    }
        ?>

       <?php 
       $sett ="SELECT * FROM categories" ;
       $conno =mysqli_query($connect, $sett);
       if(!$conno){
         die("Connectioon FAiled" .mysqli_error($connect));
       }
       while ($data=mysqli_fetch_assoc($conno)) {
           $cat_id = $data['id'] ;
           $category_name = $data['category_name'];
                echo "<option  value='$cat_id'>$category_name</option>" ;

       }
                      ?>
        </select>
       
                      
    </div>




    <div class="form-group">
        <label for="author">Item Price</label>
        <input value="<?php echo $item_price; ?>" type="number" class="form-control" name="item_price">
   </div> 


    







   
   <div class="form-group">
        <label for="author">Item Creator</label>
        <input value="<?php echo $item_creator ; ?>" type="text" class="form-control" name="creator">
   </div>   





    <div class="form-group">
        <label for="photo">Upload a post related picture</label>
        <img width="100" src="../include/item_img/<?php echo $item_image; ?>" name="image" alt="set a image">
        <input type="file" class="form-control" name="item_image">
    </div>
    <div class="form-group">
        <label for="item_tags">Post Tags</label>
        <input value="<?php echo $item_tags ; ?>" type="text" class="form-control" name="item_tags">
    </div>
    <div class="form-group">
        <label for="item_description">Item Description</label>
        <textarea  class="form-control" name="item_description" id="" cols="30" rows="10 "><?php echo $item_description ; ?></textarea>

    </div>
    <div class="form-group">
        
        <input type="submit" class="text-center btn btn-success form-control w-50" name="update_item" value="Published item">
    </div>
 
</form>

<?php // } ?>