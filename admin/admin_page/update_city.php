<br>
<br>
<br>
<br>
<br>
<br>
<br>


<form role="" method="post">
      <div class="form-group">
         <label for="cat-title">Edit City</label>
         
         
         <?php

        if(isset($_GET['edit'])){

            $cat_id = $_GET['edit'];



    
        $query = "SELECT * FROM city WHERE id = $cat_id ";
        $select_categories_id = mysqli_query($connect,$query);  

            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['id'];
            $city_name = $row['city_name'];
           
                
            ?>
            
 <input value="<?php echo $city_name; ?>" type="text" class="form-control" name="city_name">
 
 
        
        
        
       <?php }} ?>
       
     <?php   

        /////////// UPDATE QUERY   bbb

            if(isset($_POST['update_city'])) {

                $the_cat_title = $_POST['city_name'];
                


                $stmt = mysqli_prepare($connect, "UPDATE city SET city_name = ?  WHERE id = ?");

                 mysqli_stmt_bind_param($stmt, 'si', $the_cat_title, $cat_id);

                 mysqli_stmt_execute($stmt);


                         if(!$stmt){
                      
                          die("QUERY FAILED" . mysqli_error($connect));
                      
                      }

                      mysqli_stmt_close($stmt);


                    header("Location: coverage_area.php");
          
         }

    ?>