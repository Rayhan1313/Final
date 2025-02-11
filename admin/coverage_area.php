<?php ob_start(); ?>





<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


function insert_city(){
    global $connect;
    if(isset($_POST['add_city'])){
        $city_name=$_POST['city_name'] ;
        
        if(!empty($city_name)){
        $new ="INSERT INTO city(city_name) VALUES ('$city_name')";
        $conn=mysqli_query($connect,$new);
        
        
        if($conn){
            echo "Area Added successfully";
        }
    }else{
        echo "<p class='text-danger'>Coverage area can not be empty</p>";
    }
    }
}

function delete_city(){
    global $connect;
    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM city WHERE id = {$the_cat_id} ";
    $delete_query = mysqli_query($connect,$query);
    if($delete_query){
        header("Location: coverage_area.php");
    }
     


    }




}




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
                    <li><a class="text-dark" href="./coverage_area.php"><i class="fa-solid fa-location-dot"> <small>  City</small></i></a></li>

                </ol>
            </div>
            <br>
            <br>


            <div class="col-xs-6">
            
            <?php
            
            //insert part here
            insert_city();  
            
            
            
            
            
            
            
            
            
            ?>
    
    <form action="" method="post">
      <div class="form-group">
         <label for="cat-title">City Name</label>
          <input type="text" class="form-control" name="city_name">
      </div>
     
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_city" value="Add New City">
      </div>

    </form>
    
    <?php // UPDATE AND INCLUDE QUERY

    if(isset($_GET['edit'])) {
    
        $cat_id = $_GET['edit']; 
        
          include "admin_page/update_city.php";
        ?>
        
      
      
       
     
         
      </div>
       
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_city" value="Update City">
      </div>

    </form>

       
    
  <?php  }
                
                
    ?>









    
    </div><!--Add Category Form-->

            <div class="col-xs-6 bg-white border-secondary border border rounded-left bg-transparent rounded-right border-3 rounded-top rounded-bottom mt-2">
                <h2 class="text-left">City List</h2>
    <table class="table table-bordered border border-3 table-hover border-bottom border-dark   border rounded-left rounded-right rounded-top rounded-bottom mt-3">
      

        <thead>
            <tr class="bg-white ">
               
                <th class="text-danger">City Name</th>
                
                <th class="text-danger">Delete</th>
                <th class="text-danger">Edit</th>
            </tr>
        </thead>
        <tbody>

        <?php 


    $query = "SELECT * FROM city";
    $select_categories = mysqli_query($connect,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['id'];
    $city_name = $row['city_name'];
   

    echo "<tr>";
   
    echo "<td class='font-weight-bold'><samp><h5>{$city_name}</h5></samp></td>";

   echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete?') \"; class='btn btn-sm btn-danger d-inline-block justify-content-center' href='coverage_area.php?delete={$cat_id}'><i class='fa-solid fa-trash-can'></i></a></td>";
   echo "<td><a class='btn btn-sm btn-info text-center' href='coverage_area.php?edit={$cat_id}'><i class='fa-solid fa-pen-to-square'> </i> edit</a></td>";
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


delete_city();

 ?>

  
        
     
        
        <!-- /#page-wrapper -->
        
    <?php include "admin_page/footer.php" ?>
