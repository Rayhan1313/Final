<br>
<br>
<br>
<br>
<br>
<br>
<br>


<form role="" method="post" enctype="multipart/form-data">
      <div class="form-group">
         <label for="cat-title">Edit Category</label>
         
         
         <?php

        if(isset($_GET['edit'])){

            $cat_id = $_GET['edit'];



    
        $query = "SELECT * FROM categories WHERE id = $cat_id ";
        $select_categories_id = mysqli_query($connect,$query);  

            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['id'];
            $cat_title = $row['category_name'];
            $cat_image = $row['category_image'];
                
            ?>
            
 <input value="<?php echo $cat_title; ?>" type="text" class="form-control" name="category_name">
 
 
        
        
        
       <?php }} ?>
       
     <?php   

        /////////// UPDATE QUERY   bbb

            if(isset($_POST['update_category'])) {

                $the_cat_title = $_POST['category_name'];
                $cattegory_image=$_FILES['category_imagee']['name'] ;
                $cattegory_image_tmp=$_FILES['category_imagee']['tmp_name'] ;
                move_uploaded_file($cattegory_image_tmp ,"./../include/item_img/category/$cattegory_image") ;

                if(empty($cattegory_image)){
                    $new="SELECT category_image FROM categories WHERE id=$cat_id" ;
                    $CON =mysqli_query($connect,$new);
                    while($ro =mysqli_fetch_assoc($CON)){
                        $cattegory_image =$ro['category_image'];
                    }
                }


                $stmt = mysqli_prepare($connect, "UPDATE categories SET category_name = ?, category_image= ? WHERE id = ?");

                 mysqli_stmt_bind_param($stmt, 'ssi', $the_cat_title, $cattegory_image, $cat_id);

                 mysqli_stmt_execute($stmt);


                         if(!$stmt){
                      
                          die("QUERY FAILED" . mysqli_error($connect));
                      
                      }

                      mysqli_stmt_close($stmt);


                    header("Location: categories.php");
          
         }

    ?>