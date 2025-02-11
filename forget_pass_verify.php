<?php INCLUDE "./include/db.php" ; ?>
<?php INCLUDE "./include/function.php" ; ?>

                                                    

          






<?php INCLUDE "./include/header.php" ; ?>

<?php
if((!$_GET['email']) || (!$_GET['token'])){
   
   
   link_kori('./index.php');     // jodi email r token na paay tobe ja hobe setar logic ...


}

?>
<?php





if(isset($_POST['forget_verify'])){
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

     $set_up ="UPDATE users SET password='$password1' WHERE email='".$_GET['email']."'";
     $ok_kori =mysqli_query($connect,$set_up);
     if($ok_kori){
        
          
        $neeew =true;
     }
}
}                                       

?>








                                             









<?php INCLUDE "include/navigation.php"; ?>




<br>
<div class="container-fluid  pb-3 float-left mb-5 pl-5 background   border rounded-left rounded-right rounded-top rounded-bottom">
        <div class="row container-fluid pl-5  bg-transparent">
            <div class="col-lg-12  pl-5 bg-transparent">

            
             <!-- //mail jeikhane send korsi tar vitore $$mailSent value ase condition nisi just -->
                <div class="card  pl-5 pb-5 mt-2 border bg-transparent rounded-left rounded-right rounded-top rounded-bottom "><br>
                <?php if(!isset($neeew)) : ?> 
                <h3 class="font-italic text-left ml-5 pl-5 font-width-bolder mt-5"><strong><h2 class="text-left">Set Up New Password</h2></strong></h3>
                             
                    <form role="form" autocomplete="off" method="POST" class="pt-4 pl-5 float-right bg-transparent form" was-validated>

                        
                            
                  <?php  ?>

                            
                            <div class="form-row pl-5 bg-transparent ">
        
                                <div class="col-md-5 mb-3">
                                    <label for="new_pass">Password</label>                                
                                    <input autocomplete="on" type="password" class="form-control form-control-sm" name="new_pass" id="new_pass" placeholder="Password"  required>    
                                    <small class="text-danger"><?php  echo isset($error['new_pass']) ? $error['new_pass'] :'' ?></small>  
                                </div>

                            </div>
                            <div class="form-row pl-5 bg-transparent ">
        
                                <div class="col-md-5 mb-3">
                                    <label for="confirm_pass">Confirm password</label>                                
                                    <input autocomplete="on" type="password" class="form-control form-control-sm" name="confirm_pass" id="cpassword" placeholder="Confirm Password"  required>    
                                    <small class="text-danger"><?php  echo isset($error['confirm_pass']) ? $error['confirm_pass'] :'' ?></small>  
                                </div>

                            </div>

                            <div class="form-row pl-5 ml-1 bg-transparent">
                                <button class="btn btn-primary btn-sm" type="submit" name="forget_verify">Change</button>
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
                    
                    <hr>
                    <?php else : ?>
                        <p class="text-center">Password changed successfully
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
                        </p>
                       <?php header("Refresh: 5 url=log_in.php") ; ?>

                       <?php endif ; ?>

                    
                </div>
                
                                


                                    





            
        </div>
    </div>




    <?php INCLUDE "./include/footer.php" ; ?>   

    
    
    
    
    
    ?>