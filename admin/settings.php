<?php ob_start(); ?>

<?php // header("Refresh: 20"); ?>




<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    

<?php

    if(isset($_POST['ok'])){
                                                           $new_password = $_POST['new_pass'];
                                                           $confirm_pass = $_POST['confirm_pass'];
                                                            
                                                            
                                                            $error=[
                                                                'new_pass' => '' ,
                                                                'confirm_pass'=> ''
                                                            ];


                                                                if($new_password !== $confirm_pass){




                                                                      


                                                        
                                                            $error['confirm_pass'] = 'password not match' ;


                                                        }

                                                        if(strlen($new_password) < 6 ){
                                                            $error['new_pass'] = 'password is too short' ;
                                                        }








                                                        foreach($error as $key => $value){   // prottekta error detect koirar jonno foreach loop use kora hyese
                                                            if(empty($value)){
                                                                unset($error[$key]);
                                                               
                                                            }
                                                        }
                                                        if(empty($error)){


                                                            $qqq = "SELECT pass_proteect from users";
                                                            $cooo=mysqli_query($connect,$qqq);
                                                            checked($cooo);
                                                            while($new =mysqli_fetch_array($cooo)){
                                                                $pass_proteect = $new['pass_proteect'];
                                                            }
                                                                $password1 =crypt($new_password,$pass_proteect);
    
                                                            $set_up ="UPDATE users SET password='$password1' WHERE user_id='".$_SESSION['user_id']."'";
                                                            $ok_kori =mysqli_query($connect,$set_up);
                                                            if(isset($ok_kori)){
                                                               
                                                                 header("Location: ./settings.php");
                                                            }
                                                    }
                                                }                                       

                                                    ?>









    <div id="wrapper" class="background ">
       

        
  

        <!-- Navigation -->
 
       
        
        
    

        <div id="page-wrapper" class="background">
                <?php include "./admin_page/navigation.php" ?>

                <div class="container-fluid  background">
                    

                        <!-- Page Heading -->
                        <div class="row bg-transparent">
                            <div class="col-lg-12 card bg-transparent">

                            
    <?php 



?>

                                   
                                            <div class="card container-fluid bg-transparent">
                                                                                <ol class="breadcrumb pl-auto bg-transparent mt-3">
                                                                                    <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                                                                                    <li><a class="text-dark" href="./settings.php"><i class="fa-solid fa-user-gear">  <small> Settings </small></i>  </a></li>

                                                                                </ol>
                                            </div>
                                            <br>

                                            <?php
                                                $qu =mysqli_query($connect,"SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'");
                                                $g=mysqli_num_rows($qu);

                                                while($data_ber_kori=mysqli_fetch_assoc($qu)){
                                                    $user_id=$data_ber_kori['user_id'] ;
                                                    $first_name =$data_ber_kori['first_name'] ;
                                                    $last_name =$data_ber_kori['last_name'] ;
                                                    $username =$data_ber_kori['username'] ;
                                                    $mobile_number =$data_ber_kori['mobile_number'] ;
                                                    $email =$data_ber_kori['email'] ;
                                                    $user_image =$data_ber_kori['user_image'] ;
                                                    $house_no =$data_ber_kori['house_no'] ;
                                                    $street =$data_ber_kori['street'] ;
                                                    $city =$data_ber_kori['city'] ;
                                                    $password =$data_ber_kori['password'] ;
                                                    $user_role =$data_ber_kori['user_role'] ;
                                                    $status =$data_ber_kori['status'] ;

                                                    if(empty($user_image)){
                                                        $user_image="all.png";
                                                      }
                                                    
                                                }



                                            ?>

                                            <div class="card container-fluid bg-transparent">
                                                <div class="row bg-transparent">
                                                    
                                                    <div class="col-lg-4 bg-transparent">
                                                        <br>
                                                        <img src="../img/<?php echo $user_image ; ?>" class="rounded-circle mb-1  bg-transparent" width="370px" height="350px" alt="" >
                                                        <br>
                                                        <br>
                                                        
                                                        <br>

                                                           
                                                            
                                                            
                                                            </p> 

                                                    </div>
                                                    <div class="col-lg-8">
                                                                <p class="text-right">User Status : <b class="btn btn-success"><?php echo $status ; ?></b></p>
                                                                <br>
                                                                <br>
                                                                <h2 class="text-center">Personal Information</h2><hr>
                                                                
                                                                <br>

                                                                <h4 class="text-center">Full name :<?php echo " ".$first_name ." ". "   ".$last_name ." " ; ?>  </h4>
                                                                <h4 class="text-center ">Username :<?php echo " ".$username." " ; ?>  </h4>
                                                                <h4 class="text-center ">Phone Number :<?php echo " 0".$mobile_number." " ; ?>  </h4>
                                                                <h4 class="text-center ">Email :<?php echo " ".$email." " ; ?>  </h4>

                                                                <h4 class="text-center">Address : <?php echo " ".$house_no.",".$street." ".$city ; ?>  </h4>


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
                                                                
                                                                <h4 class="text-center">Change password ? <a href="./settings.php?password">click here</a></h4>

                                                               
                                                                <br>
                                                                <br>
                                                                <?php

                                                        if(isset($_GET['password'])){ 
                                                            
                                                                ?>
                                                            
                                                                <form role="form" method="post" class="ml-5 d-block justify-content-flex-end" id="validate_form">
                                                                    <div class="form-group row ml-5">
                                                                        <input type="password" name="new_pass" class="form-control col-lg-4" placeholder="Password" required>
                                                                        <b class="text-danger mt-1"><?php  echo isset($error['new_pass']) ? $error['new_pass'] :'' ?></b>  
                                                                    </div>
                                                                    <div class="form-group row ml-5">
                                                                        <input type="password" name="confirm_pass" class="form-control col-lg-4" placeholder="Confirm password" required>
                                                                        <b class="text-danger mt-1"><?php  echo isset($error['confirm_pass']) ? $error['confirm_pass'] :'' ?></b>  

                                                                    
                                                                     </div>
                                                                     <input type="submit" class=" ml-5 btn btn-xs btn-success col-lg-2" value="change" name="ok">
                                                                   
                                                                 
                                                                    
                                                                </form>
                                                            


                                                                

                                                        <?php } 

                                                        
                                                        
                                                    
                                                    
                                                    

                                                        ?>

                                                            
                                                            
                                                        
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                                <br>
                                                                <br>
                                                               
                                                                <hr>
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
