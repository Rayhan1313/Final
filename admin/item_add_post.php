<?php 
include "../include/db.php";
global $connect;
if(isset($_POST['create_post'])){
    

    $item_name =$_POST['item_name'];
    $item_category_id =$_POST['item_category'];

 
    $author =$_POST['item_author'];
    

    $item_image =$_FILES['item_image']['name'];
    $item_image_temp =$_FILES['item_image']['tmp_name'];

    $item_price =$_POST['item_price'];

    $item_tags =$_POST['item_tags'];
    $item_content =$_POST['item_content'];

    $item_date =date('d-m-y');
   
    

    move_uploaded_file($item_image_temp ,"../include/item_img/$item_image") ;
    $query ="INSERT INTO post(item_name,item_category_id,item_creator,item_created_date,item_price,item_image,item_description,item_tags) " ;
    $query.= "VALUES('$item_name','$item_category_id','$author','$item_date','$item_price','$item_image','$item_content','$item_tags')" ;
    $create =mysqli_query($connect,$query) ;

    if(!$create){
        die("connection failed". mysqli_error($connect));
    } ;

    // sobar sesher insert howa id pick koresi mysqli_insert_id ;
    $new_id= mysqli_insert_id($connect);
    
    //onno page er link up rakhsii
    echo "<p>Post Updated<a href='/view_individual_post.php?item_id=$new_id'> View Post</a> or <a href='item_post.php'> Edit More Post</a></p>" ;
    

    
}
?>



<form action="" method="post" enctype="multipart/form-data">
    <br>
    <br>

    <div class="form-group">
        <label for="item_name">Item Title</label>
        <input type="text" class="form-control" name="item_name">
    </div>
   

    <div class="form-group">
            <label for="item_category">Select Item Category</label>
              <select name="item_category">
              <option value='1'>Choose Category</option>
              <?php 
                                    
                                    $category_query ="SELECT * FROM categories";
                                    $category_connect =connection($category_query); 
                                    while($category_ber_kori=mysqli_fetch_array($category_connect)){
                                        $category_id =$category_ber_kori['id'];
                                        
                                        $category=$category_ber_kori['category_name'];

                                        echo "<option  value='$category_id'>$category</option>";
                                    } ?>
            </select>
        
                        
        </div>
        <br>


        <div class="form-group ">
            <br>
            <label for="item_author">Item Creator</label>
              <select name="item_author">
              <option value='Tisha'>Item Creator</option>
              
                                    
              <option  value='Tisha'>Tisha</option>                       
            <option  value='Rayhan'>Rayhan</option>
        
            <br>
            <br>

        </div>


        

    
    <div class="form-group">
        <label for="image">Item Image</label>
        
        <input type="file" class="form-control w-50 mt-5" name="item_image">
    </div>
    
    <div class="form-group  mt-5">
        <label for="item_price">Item Price</label>
        <input type="number" class="form-control " name="item_price">
    </div>
    <div class="form-group">
        <label for="item_tags">Item Tags</label>
        <input type="text" class="form-control" name="item_tags">
    </div><br>

    <div class="form-group">
        <label for="item_content">Item Description</label>
        <textarea  class="form-control" name="item_content" id="" cols="30" rows="10 "></textarea>

    </div>
    <div class="form-group">
        
        <input type="submit" class="text-center btn btn-success form-control w-50" name="create_post" value="Published item">
    </div>
 
</form>