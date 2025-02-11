

<?php include "admin_page/header.php" ; 
include "admin_page/db.php";
global $connect ; ?>




<div id="wrapper"  class="  background">



        <!-- Navigation -->
 
       
        
   
    <div id="page-wrapper" class="background">
        <?php include "admin_page/navigation.php" ?>

            <div class="container-fluid background">

                <!-- Page Heading -->
               <?php if($_SESSION['user_role']=='admin' || $_SESSION['user_role']=='moderator'){
                INCLUDE "./admin_page/admin_er_dashboard.php";
               }
               else if($_SESSION['user_role']=='customer'){
                INCLUDE "./admin_page/customer_er_dashboard.php";
               }
               else if($_SESSION['user_role']=='delivery_man'){
                INCLUDE "./admin_page/delivery_man_er_dashboard.php";
               }
            ?>

            
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<br>
            </div>
    </div>
    
    
    
</div>


<?php



?>


<?php include "admin_page/footer.php" ; ?>