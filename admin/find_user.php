<?php ob_start(); ?>






<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    


    <?php if(!check_admin($_SESSION['username'])){
    header("Location: ./index.php"); 
}
?>






<!-- //approved -->
<?php 
              if(isset($_GET['change_role_admin'])){
                $users_id =$_GET['change_role_admin'] ;
                $change_role ="UPDATE users set user_role ='admin' WHERE user_id=$users_id " ;
                $admin =mysqli_query($connect,$change_role);
                
                  
              }
              
              
              ?>

<?php 
              if(isset($_GET['change_role_moderator'])){
                $users_idd =$_GET['change_role_moderator'] ;
                $changee_role ="UPDATE users set user_role ='moderator' WHERE user_id=$users_idd " ;
                $moderator =mysqli_query($connect,$changee_role);
                
                  
              }

              if(isset($_GET['change_role_delivery_man'])){
                $users_iidd =$_GET['change_role_delivery_man'] ;
                $changee_roleee ="UPDATE users set user_role ='delivery_man' WHERE user_id=$users_iidd " ;
                $change_role_delivery_man =mysqli_query($connect,$changee_roleee);
                
                  
              }
              
              
              ?>
             <!-- //unapproved -->
              <?php 
              if(isset($_GET['change_role_customer'])){
                $users_id =$_GET['change_role_customer'] ;
                $change_role ="UPDATE users set user_role ='customer' WHERE user_id=$users_id " ;
                $subscriber =mysqli_query($connect, $change_role);
                
                  
              }
              
              
              ?>

              <?php 
              if(isset($_GET['delete'])){
                $users_id =$_GET['delete'] ;
                $del_query ="DELETE FROM users WHERE user_id=$users_id " ;
                $delete =mysqli_query($connect,$del_query);
                
                  
              }
              
              
              ?>











<?php
if(ifItIsMethod("post")){
    $username= $_POST['username']; 
    

    
    
    ?>







    <div id="wrapper" class="background mb-5">
       

        
  

        <!-- Navigation -->
 
       
        
        
    

        <div id="page-wrapper" class="background mb-5">
                <?php include "./admin_page/navigation.php" ?>

                <div class="container-fluid   background background">
                  

                        <!-- Page Heading -->
                        <div class="row mt-3 bg-transparent">
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
                                            <form action="" method="post">
                                                <div class="form-group row">
                                                    Find a user  :<input type="text" placeholder="find a user" name="username" class="col-lg-6">
                                                    <input type="submit" value=find name="find">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                


                                <div class="card container-fluid bg-transparent">
                            <?php    $rules ="SELECT  *   FROM users  WHERE username LIKE '%$username%'";
                                        
                                        $news =mysqli_query($connect,$rules) ; 
                                        
                                        $countty =mysqli_num_rows($news) ;
                                        if($countty<1){ ?>
                                        <h2 class="text-center">No Results found
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
                                            <br>
                                            <hr>
                                           
                                            
                                            

                                        </h2>
                                        <?php }  else { ?>
                                            

                        <table class="table  card-body  table-hover table-borderless  border rounded-top rounded-bottom bg-transparent"><hr>
                        <h5 class="text-center">Below Results found</h5>
                                        <tr class="text-dark bg-white   rounded-top rounded-bottom">
                                        <th>Id</th>
                                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    <!--  <th>Image</th> -->
                                        
                                        <th>Role</th>
                                        <th>Set  as admin</th>
                                        <th>Set  as moderator</th>
                                        <th>Set  as customer</th>
                                        <th>Set  as delivery man</th>
                                        
                                        
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                        <tbody>

                                        <?php 
                                        
                                            
                                        
                                        while($view=mysqli_fetch_assoc($news)){
                                            $db_id =  $view['user_id'];       
                                            $db_user_firstname =  $view['first_name'];
                                            $db_user_lastname =  $view['last_name'];
                                            $db_username =  $view['username'];
                                            $db_user_mobile_number =  $view['mobile_number'];
                                            $db_user_email =  $view['email'];      
                                            $db_user_image =  $view['user_image'];
                                        /*   $db_user_house_no =  $view['house_no'];
                                            $db_user_street =  $view['street'];
                                            $db_user_city =  $view['city'];
                                            */
                                            $db_user_password =  $view['password'];
                                        
                                            $db_user_role =  $view['user_role'];
                                            $db_user_status =  $view['status'];
                                        
                                        

                                        echo "<tr>" ;
                                        echo "<td>{$db_id }</td>";
                                        echo "<td>{$db_user_firstname}</td>";
                                        echo "<td>{$db_user_lastname}</td>";
                                        echo "<td>{$db_username}</td>";
                                        echo "<td>{$db_user_email}</td>";
                                        echo "<td>0{$db_user_mobile_number}</td>";
                                    //    echo "<td><img class='img-thumbnail' width='60' height='40' src='../img/{$db_user_image}' alt='img'></td>";
                                    //     echo "<td>{$db_user_addresses}</td>";
                                        echo "<td><a  class='btn btn-success text-white font-weight-bolder'>{$db_user_role}</a></td>";


                                        
                                        echo "<td><a class='btn btn-primary' href='users.php?source=admin&change_role_admin={$db_id}'> Admin</a></td>";
                                        echo "<td><a class='btn btn-primary' href='users.php?source=moderator&change_role_moderator={$db_id}'>Moderator</a></td>";
                                        echo "<td><a  class='btn btn-secondary' href='users.php?source=customer&change_role_customer={$db_id}'>Customer</a></td>";
                                        echo "<td><a class='btn btn-primary' href='users.php?source=delivery_man&change_role_delivery_man={$db_id}'>Delivery man</a></td>";
                                        echo "<td><a class='btn btn-warning' target='_blank' href='users.php?source=edit_users&edit_user={$db_id}'>Edit Profile</a></td>";
                                        /* nicher line a javascript er onclick class use hoise  */
                                        echo "<td><a  class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure to delete?');  \" href='users.php?delete={$db_id}'><i class='fa-solid fa-trash-can'></i></a></td>";
                                        echo "</tr>";

                                        
                                        }
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        ?>
                                        
                                        </tbody>
                        </table>
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
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                           
                                            
                                            <hr>

                        <?php }  ?>

              


                                            


     


                                </div>

                        
                                            
                                           
                                            
                            </div>        


                        </div>
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->

    </div>
    <?php } ?>


<br>
<br>
<br>
<br>



  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>
