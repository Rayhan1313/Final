<?php ob_start(); ?>






<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    


    <?php if(!check_admin($_SESSION['username'])){
    header("Location: ./index.php"); 
}
?>











    <div id="wrapper" class="background mb-5">
       

        
  

        <!-- Navigation -->
 
       
        
        
    

        <div id="page-wrapper" class="background mb-5">
                <?php include "./admin_page/navigation.php" ?>

                <div class="container-fluid background">
                    

                        <!-- Page Heading -->
                        <div class="row bg-transparent">
                            <div class="col-lg-12 bg-transparent">


                                <div class="card container-fluid bg-transparent">
                                    <ol class="breadcrumb pl-auto bg-transparent mt-3">
                                        <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                                        <li><a class="text-dark" href="./users.php"><i class="fa-solid fa-user-large"> <small>  Users</small></i></a></li>

                                    </ol>
                                </div>
                                <br>

                                <div class="card container-fluid bg-transparent">
                                    <div class="row">
                                        <div class="col-lg-6"></div>
                                        <div class="col-lg-6 mt-3">
                                            <form action="./find_user.php?username" method="post">
                                                <div class="form-group row">
                                                    Find a user  :<input type="text" placeholder="find a user" name="username" class="col-lg-6">
                                                    <input type="submit" value=find name="find">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                


                                <div class="card container-fluid bg-transparent">
              
                                                <?php 
                                                if(isset($_GET['source'])){
                                                    $source = $_GET['source'] ;
                                                }
                                                else{
                                                    $source ='' ;
                                                }
                                                switch($source){
                                                    case 'add_users' ;
                                                    include "./admin_page/add_users.php";
                                                    break ;

                                                    case 'edit_users' ;
                                                    include "./admin_page/edit_users.php";
                                                    break ;

                                                    case 'admin' ;
                                                    include "./admin_page/total_admin.php";
                                                    break ;

                                                    case 'moderator' ;
                                                    include "./admin_page/total_moderator.php";
                                                    break ;

                                                    case 'delivery_man' ;
                                                    include "./admin_page/total_delivery_man.php";
                                                    break ;

                                                    case 'customer' ;
                                                    include "./admin_page/total_customers.php";
                                                    break ;

                                                

                                                    default ;
                                                    include "./admin_page/view_users.php" ;
                                                }
                                                ?>


<br>
<br>
<br>

                                </div>

                        
                                <br>
<br>
<br>
            
                                           
                                            
                            </div>        


                        </div>
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->

    </div>






  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>
