<?php use PHPMailer\PHPMailer\PHPMailer;
 
 use PHPMailer\PHPMailer\Exception;


use PHPMailer\PHPMailer\SMTP;




 ?>

<?php INCLUDE "./include/db.php"; ?>
<?php INCLUDE "./include/function.php"; ?>
<?php INCLUDE "./include/header.php" ; 


require "./vendor/phpmailer/phpmailer/src/PHPMailer.php";
 require "./vendor/phpmailer/phpmailer/src/SMTP.php";
 require "./vendor//phpmailer/phpmailer/src/Exception.php";


?>



<?php

 if(!isset($_GET['forget'])){
    link_kori('index.php');
}

if(ifItIsMethod('post')){
    if(isset($_POST['email'])){
        $email =$_POST['email'];
        $length = 5;
         // token generate hortesi.. bin2hex liabrary function ,,openssl_random_pseudo_bytes r ekta funtion  
        $token= bin2hex(openssl_random_pseudo_bytes($length));
        

$error=[
    
    'email' => ''
    

];




if ($email =='')  {
    $error['email'] = 'please enter your email.';
    
}
if(!empty($email)){
if(!email_exists_check($email)){
    $error['email']="Email doesn't exist  <a href='./sign_up.php'>click here for sign_up</a>" ;
}
}
if(!empty($email)){
    if(email_exists_check($email)){
if(!email_verified_kina($email)){
    $error['email']="Unverified email address" ;
}
    }
}


  



    
    foreach($error as $key => $value){   // prottekta error detect koirar jonno foreach loop use kora hyese
        if(empty($value)){
            unset($error[$key]);
           
        }
    }
    if(empty($error)){
       
            if($st=mysqli_prepare($connect, "UPDATE users SET token='{$token}' WHERE email=?")){
            mysqli_stmt_bind_param($st, "s", $email);
            mysqli_stmt_execute($st);
            mysqli_stmt_close($st);





       $mail = new PHPMailer;

                                     // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;  
                
       
       
     
      
      $mail->Username = "rtfooddelivery2022@gmail.com";
      $mail->Password = "samfsorkeflcgape";
         
          
         

        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;




        
        
        
        
        
        $mail->From = 'rtfooddelivery2022@gmail.com';
        $mail->FromName = 'RTFoodDelivery';
       
        $mail->addAddress($email); //user email
        
          
    

        $mail->isHTML(true);
        $mail ->CharSet ='utf-8';  

        

      
        
        $mail->Subject ='Reset Password Link' ;

        $mail->Body ='<div class="row">
                            <div class="col-xs-8">
                            <p>You have requested for  reset your password. Click here to reset your password
                            <a href="http://RtFoodDelivery.test/forget_pass_verify.php?email='.$email.'&token='.$token.'">http://RtFoodDelivery.test/forget_pass_verify.php?email='.$email.'&token='.$token.'</a>
                            <br>
                            <br>
                            
                            </p>
                            
                            <hr> ©RT Food Delivery
                             </div>
                      </div> '; 

        if($mail -> send()){
            $mailSent =true;

        }else{
            echo "sorry wrong input";
        }


    }else{
        echo mysqli_error($connect);
        
    }
           


        }
        
}
}



    





?>





























<?php
 

    



?>




<?php INCLUDE "include/navigation.php"; ?>




<br>
<div class="container-fluid  pb-3 float-left mb-5 pl-5 background   border rounded-left rounded-right rounded-top rounded-bottom">
        <div class="row container-fluid pl-5  bg-transparent">
            <div class="col-lg-12  pl-5 bg-transparent">

            
             <!-- //mail jeikhane send korsi tar vitore $$mailSent value ase condition nisi just -->
                <div class="card  pl-5 pb-5 mt-2 border bg-transparent rounded-left rounded-right rounded-top rounded-bottom "><br>
                <?php if(!isset($mailSent)): ?>
                <h3 class="font-italic text-left ml-5 pl-5 font-width-bolder mt-5"><strong><h2 class="text-left">Forgot Password?</h2>
                                <p>You can reset your password from here.</p></strong></h3>
                    <form role="form" autocomplete="off" method="POST" class="pt-4 pl-5 float-right bg-transparent form" was-validated>

                        
                            


                            
                            <div class="form-row pl-5 bg-transparent ">
        
                                <div class="col-md-5 mb-3">
                                    <label for="email">Email</label>                                
                                    <input autocomplete="on" type="email" class="form-control form-control-sm" name="email" id="email" placeholder="your@mail.com" value="<?php  echo !isset($email) ? '':$email ?>"  required>    
                                    <small class="text-danger"><?php  echo isset($error['email']) ? $error['email'] :'' ?></small>  
                                </div>
                                <input type="hidden" class="hide" name="token" id="token" value="">
                            </div>

                            <div class="form-row pl-5 ml-1 bg-transparent">
                                <button class="btn btn-primary btn-sm" type="submit" name="log_in">Request for Password</button>
                            </div>
                            
                            <p class="text-left  badge pl-5">Don't have an account  ? <a class="card-link stretched-link" href="./sign_up.php"> click here for sign up</a></p>

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
                            <hr>

                   <?php else : ?>
                    
                    
                            <P class=" pb-5 text-bolder bg-transparent text-dark">Please check your email .A verification link has been successfully sent to your email.Change your password through that link .Cheers ..
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
                            </P><!-- Body-->


                   <?php endif; ?>


                    
                </div>
                
                                


                                    





            
        </div>
    </div>




    <?php INCLUDE "./include/footer.php" ; ?>   