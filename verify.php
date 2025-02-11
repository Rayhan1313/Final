<?php  ob_start();
?>

<?php INCLUDE "include/db.php"; ?>
<?php INCLUDE "include/function.php"; ?>



<?php 
                                    
                            
                                        


                                    
                                    
                                    
                                    
?>



   
     


     
   
    
           








  


    
    

    




        
        


    





























<?php INCLUDE "./include/header.php" ; ?>




<?php INCLUDE "include/navigation.php"; ?>




<br>
<div class="container-fluid pt-3 pb-3 float-left mb-5 pl-5 background   border rounded-left rounded-right rounded-top rounded-bottom">
        <div class="row container-fluid pl-5  background">
            <div class="col-lg-12 pt-5 pl-5 background">

            
         <?php   
                if(!isset($_GET['email'])) {
                    link_kori("./");
                }
                else {
                   $email =$_GET['email'];
              
                  ?>


<?php

                                        if(isset($_POST['verify'])){
                                            $otp =$_POST['otp'];
                                         $u_email =$_POST['check'];
                                        
                                           
                                            $checking_error=[
                                                'otp'=> ''
                                            
                                            ];
                                            
                                            
                                            if($otp =='')  {
                                                $checking_error['otp'] ='please enter your verification code.';
                                             } 
                                        
                                             $nw="SELECT token FROM users WHERE email='$u_email'";
                                             $neew=connection($nw);
                                             while($newww=mysqli_fetch_array($neew)){
                                                 $tokenn=$newww['token'];}
                                             
                                            if($otp !==$tokenn){
                                                $checking_error['otp'] ='verification code not match';
                                             }  

                                             foreach($checking_error as $key => $value){   // prottekta $checking_error detect koirar jonno foreach loop use kora hyese
                                                if(empty($value)){
                                                    unset($checking_error[$key]);
                                                   
                                                }
                                                if(empty($checking_error)){
                                                    $new = "UPDATE users SET status='verified' WHERE email='$u_email'";
                                                    $done =connection($new);
                                                    // aikhane update kore user status dibo pore verified kina,,,, ok?
                                                    if($done){
                                                        $sign_UP=true ;
                                                    }
                                            }
                                           
                                                
                                                
                                        
                                         }}      ?>
                                         
                                        


                                    
                                    
                                    












































                    
                                <div class="panel-body w-50">

                                         
                                <?php if(!isset($sign_UP)) : ?> 
                                   
                                    <p class="text-dark card">
                                        A verification code has successfully sent to your email. Insert your verification code here and then log in..
                                    </p>

                                    <form id="register-form" action="" autocomplete="off" class="form " method="post">

                                        <div class="form-group border">
                                            <div class="input-group w-70">
                                                <label class="mt-2 pt-1" for="OTP">Enter  verification code</label>
                                                <span class="input-group-addon mt-3 mr-3 border-2 col-sm-1  form-group"></i></span>
                                                <input name="otp" placeholder="Enter Your verification code" class="form-control col-sm-11"  type="text">
                                                <small class="text-danger"><?php  echo isset($checking_error['otp']) ? $checking_error['otp'] :'' ?></small>     
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="check" value="<?php echo $email; ?>">
                                            <input name="verify" class="btn btn-lg btn-primary btn-block" value="verify" type="submit">
                                        </div>

                                        
                                    </form>
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

                                    <?php else : ?>
                        <p class="text-center">Sign Up successfully....
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
                            
                        </p>
                       <?php header("Refresh: 5 url=log_in.php") ; ?>

                       <?php endif ; ?>




                                    

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                             <?php   } ?>  
                                    
                                </div>

                                    
                                


                                    





            
        </div>
    </div>




    <?php INCLUDE "./include/footer.php" ; ?>   
    
