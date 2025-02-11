<?php ob_start(); ?>





<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    
  









    <div id="wrapper" class="background mb-5">
       

        
  

        <!-- Navigation -->
 
       
        
        
    

<div id="page-wrapper" class="background mb-5">
<?php include "./admin_page/navigation.php" ?>

<div class="container-fluid  background">

    <!-- Page Heading -->
    <div class="row bg-transparent">
        <div class="col-lg-12 bg-transparent">


            <div class="card container-fluid bg-transparent">
                <ol class="breadcrumb pl-auto bg-transparent mt-3">
                    <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                    <li><a class="text-dark" href="./categories.php"><i class="fas fa-hammer"> <small>  Categories</small></i></a></li>

                </ol>
            </div>
            <br>
            <br>


            <div class="col-xs-6">
            
            <?php
            
            //insert part here
            insert_categories();  ?>
    
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
         <label for="cat-title">Category Title</label>
          <input type="text" class="form-control" name="category_name">
      </div>
      <div class="form-group">
         <label for="cat-img">Category Image</label>
          <input type="file" class="form-control" name="category_image">
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_category" value="Add Category">
      </div>

    </form>
    
    <?php // UPDATE AND INCLUDE QUERY

    if(isset($_GET['edit'])) {
    
        $cat_id = $_GET['edit']; 
        
          include "admin_page/update_categories.php";
        ?>
        
      
      
       
     
         
      </div>
      <div class="form-group">
        <img width="100" src="../include/item_img/category/<?php echo $cat_image; ?>" name="image" alt="set a image">
        <input  type="file" class="form-control" name="category_imagee">
    </div>  
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
      </div>

    </form>

       
    
  <?php  }
                
                
    ?>









    
    </div><!--Add Category Form-->

            <div class="col-xs-6 bg-white border-secondary border border rounded-left bg-transparent rounded-right border-3 rounded-top rounded-bottom mt-2">
                <h2 class="text-left">Categories List</h2>
    <table class="table table-bordered border border-3 table-hover border-bottom border-dark   border rounded-left rounded-right rounded-top rounded-bottom mt-3">
      

        <thead>
            <tr class="bg-white ">
                <th class="text-danger">Id</th>
                <th class="text-danger">Category Title</th>
                <th class="text-danger">Category Image</th>
                <th class="text-danger">Delete</th>
                <th class="text-danger">Edit</th>
            </tr>
        </thead>
        <tbody>

        <?php 


    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connect,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['id'];
    $cat_title = $row['category_name'];
    $cat_image = $row['category_image'];

    echo "<tr>";
        
    echo "<td class='font-weight-bold'><samp>{$cat_id}</samp></td>";
    echo "<td class='font-weight-bold'><samp><h5>{$cat_title}</h5></samp></td>";
    echo "<td><img class='img-thumbnail' width='60' height='40' src='../include/item_img/category/{$cat_image}' alt='img'></td>";
   echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete?') \"; class='btn btn-sm btn-danger d-inline-block justify-content-center' href='categories.php?delete={$cat_id}'><i class='fa-solid fa-trash-can'></i></a></td>";
   echo "<td><a class='btn btn-sm btn-info text-center' href='categories.php?edit={$cat_id}'><i class='fa-solid fa-pen-to-square'> </i> edit</a></td>";
    echo "</tr>";

    }




?>
        

      

        </tbody>
    </table>

                        
                        
        
                </div>   
                   
                <br><br>
<br>
<br>
<br> <br><br>
<br>
<br>
<br> 

            </div>
           
            <br><br>
<br>
<br>
<br> 

        </div>
        <!-- /.row -->

    
    <br><br>
<br>
<br>
 


<br>
<br>
<br>
<br>
<br>

    <!-- /.container-fluid -->

</div>





<?php 


//function page a baki kaj korsi aikhane function cl korsi


delete_categories();

 ?>

  
        
     
        
        <!-- /#page-wrapper -->
        
    <?php include "admin_page/footer.php" ?>
