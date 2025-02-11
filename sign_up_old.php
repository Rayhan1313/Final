<?php  use PHPMailer\PHPMailer\PHPMailer; ?>

<?php INCLUDE "include/db.php"; ?>
<?php INCLUDE "include/function.php"; ?>






<?php




  

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_role =$_POST['user_role'];
    $first_name =$_POST['first_name'];
    $last_name =$_POST['last_name'];
    $username =$_POST['username'];
    $mobile_number =$_POST['mobile_number'];
    $email =$_POST['email'];
    $user_image =$_FILES['user_image']['name'];
    $temp_loc =$_FILES['user_image']['tmp_name'];
    move_uploaded_file($temp_loc, "./img/$user_image");

    $house_no =$_POST['house_no'];
    $street =$_POST['street'];
    $city =$_POST['city'];
    $password =$_POST['password'];
    $length= 4;
    $token= bin2hex(openssl_random_pseudo_bytes($length));


$error=[
    'first_name'=> '',
    'last_name' => '',
    'username'=> '',
    'mobile_number' => '',
    'email' => '',
    'house_no'=> '',
    'street' =>'',
    'city' =>'',
    'password'=> ''

];


if ($first_name =='')  {
    
  

   $error['first_name'] = 'please enter your first name.';
}




if ($last_name =='')  {
    

    $error['last_name'] ='please enter your last name.';
 }

 if ($username =='')  {
    

    $error['username'] ='username can not be empty.';
 }
   

    if(!empty($username ) && !$username ==''){
        if(strlen($username ) < 5 )  {
            $error['username'] ='username is too short';
         } 

    }

    if(username_check($username)){
        $error['username']='Username exists ,try another name' ;
    }


    if(empty($mobile_number)){
        $error['mobile_number'] ='Enter your 11 digit mobile number';
    }
        
    if(!empty($mobile_number)){
    if(strlen($mobile_number ) < 11 || strlen($mobile_number ) > 11)  {
        $error['mobile_number'] ='please enter a valid phone number.number needs to be 11 digit';
     } }

     if($email =='')  {
        $error['email'] ='please enter a email address.';
     } 

     if(email_exists_check($email)){
        $error['email']="Email exists  <a href='./log_in.php'>click here to log in</a>" ;
    }



     if($house_no =='')  {
        $error['house_no'] ='please enter your house_no.';
     } 

     if($street =='')  {
        $error['street'] ='please enter your street name.';
     } 

     if($city =='')  {
        $error['city'] ='please enter your city name.';
     } 


     if($password =='')  {
        $error['password'] ='password can not be empty.';
     } 

     if(!empty($password ) && !$password ==''){
        if(strlen($password ) < 6 )  {
            $error['password'] ='password is too short , it must be 6 charecter or long';
         } 

    }
    foreach($error as $key => $value){   // prottekta error detect koirar jonno foreach loop use kora hyese
        if(empty($value)){
            unset($error[$key]);
           
        }
    }
    if(empty($error)){

        user_registration($first_name,$last_name,$username,$mobile_number,$email,$user_image,$house_no,$street,$city,$password,$user_role,$token);
        
        require './vendor/autoload.php'; 
    
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '17e3d9794d0c5d';
        $mail->Password = 'dbf7e1b5970307';

        
        $mail->SMTPSecure = 'tls';            
        $mail->SMTPAuth   = true; 
        $mail->isHTML(true);
        $mail ->CharSet ='UTF-8';  

        

        $mail ->setFrom('RTFoodDelivery@test.com', 'RTFoodDelivery'); //website address r ekta shortname nisi
        $mail->addAddress($email); //user email
        $mail->Subject ='Your One Time Password  (OTP)' ;

        $mail->Body ='<p>Your OTP is "  '.$token. ' .  " Verify your account with this code</p>'; 

        if($mail -> send()){
            $mailSent =true;
             //ekta storage/variable  a just true likhaysi condition er vitore..

             header("Location: verify.php?email=$email");
        }else{
            echo "sorry wrong input";
        }


 }
           


        }
        


    





?>





























<?php
 

    



?>

<?php INCLUDE "./include/header.php" ; ?>




<?php INCLUDE "include/navigation.php"; ?>




<br>
<div class="container-fluid pt-3 pb-3 float-left mb-5 pl-5 background   border rounded-left rounded-right rounded-top rounded-bottom">
        <div class="row container-fluid pl-5  background">
            <div class="col-lg-12 pt-5 pl-5 background">

            
             <!-- //mail jeikhane send korsi tar vitore $$mailSent value ase condition nisi just -->
                <div class="card  pl-5 pb-5  border background rounded-left rounded-right rounded-top rounded-bottom "><br>

                                <h3 class="font-italic text-left ml-5 pl-5  font-width-bolder "><strong><kbd>Sign Up</kbd></strong></h3>
                                    <form action="" method="POST" class="pt-4 pl-5 float-right background" enctype="multipart/form-data" autocomplete ="off">


                                    <div class="form-row pl-5">

                                        <div class="col-md-6 mb-3 ">
                                            <label for="first_name" class="mb-2">Sign Up as</label>
                                            <select name="user_role" >
                                                <option value="customer">User</option>
                                                <option value="delivery_man">Delivery Man</option>
                                            </select>
                                        </div>
                                    </div>    

                                            <div class="form-row pl-5">

                                                <div class="col-md-3 mb-3 ">
                                                    <label for="first_name">First name</label>
                                                    <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" placeholder="First name" autocomplete ="on"   value="<?php  echo !isset($first_name) ? '':$first_name ?>">
                                                    <small class="text-danger"><?php  echo isset($error['first_name']) ? $error['first_name'] :'' ?></small>     
                                                </div>

                                                <div class="col-md-2 mb-3">
                                                    <label for="last_name">Last name</label>
                                                    <input type="text" autocomplete ="on" class="form-control form-control-sm" name="last_name" id="last_name" placeholder="Last name" value="<?php  echo !isset($last_name) ? '':$last_name ?>" >
                                                    <small class="text-danger"><?php  echo isset($error['last_name']) ? $error['last_name'] :'' ?></small> 
                                                </div>

                                            
                                            </div>
                                            

                                            <div class="form-row pl-5">

                                                <div class="col-md-5 mb-3">
                                                    <label for="username">Profile Name</label>                                
                                                    <input type="text" autocomplete ="on" class="form-control form-control-sm" name="username" id="username" placeholder="Username" value="<?php  echo !isset($username) ? '':$username ?>" >    
                                                    <small class="text-danger"><?php  echo isset($error['username']) ? $error['username'] :'' ?></small> 
                                                </div>

                                            </div>



                                            
                                            <div class="form-row pl-5">

                                                <div class="col-md-2 mb-3">
                                                    <label for="mobile_number">Mobile Number</label>                                
                                                    <input type="number" autocomplete ="on" class="form-control form-control-sm" name="mobile_number" id="mobile_number" placeholder="01XXXXXXXXX"  value="<?php  echo !isset($mobile_number) ? '':$mobile_number ?>">    
                                                    <small class="text-danger"><?php  echo isset($error['mobile_number']) ? $error['mobile_number'] :'' ?></small> 
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="email">Email</label>                                
                                                    <input type="email" autocomplete ="on" class="form-control form-control-sm" name="email" id="email" placeholder="your@mail.com"  value="<?php  echo !isset($email) ? '':$email ?>">    
                                                    <small class="text-danger"><?php  echo isset($error['email']) ? $error['email'] :'' ?></small> 
                                                </div>

                                            </div>

                                            
                                            <div class="form-row pl-5">

                                                <div class="col-md-3 mb-3">
                                                    <label for="user_image">Upload your photo</label>
                                                    <input type="file" name="user_image" class="form-control-file" id="user_image">
                                                </div>

                                            </div>
                                            
                                            <div class="form-row pl-5">
                                            <div class="col-md-2 mb-3">
                                                <label for="house_no">House No</label>
                                                <input type="number" autocomplete ="on" class="form-control form-control-sm" name="house_no" id="house_no" placeholder="House No" value="<?php  echo !isset($house_no) ? '':$house_no ?>">
                                                <small class="text-danger"><?php  echo isset($error['house_no']) ? $error['house_no'] :'' ?></small> 
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="street">Street Name</label>
                                                <input type="text" autocomplete ="on" class="form-control form-control-sm" name="street" id="street" placeholder="street name" value="<?php  echo !isset($street) ? '':$street ?>">
                                                <small class="text-danger"><?php  echo isset($error['street']) ? $error['street'] :'' ?></small> 
                                            </div>
                                            <div class="col-md-1 mb-3">
                                                <label for="city">City</label>
                                                <input type="text" autocomplete ="on" class="form-control form-control-sm" name="city" id="City" placeholder="City" value="<?php  echo !isset($city) ? '':$city ?>">
                                                <small class="text-danger"><?php  echo isset($error['city']) ? $error['city'] :'' ?></small> 
                                            </div>
                                            </div>
                                            

                                            <div class="form-row pl-5">
                                                <div class="col-md-5 mb-3">
                                                    <label for="password">Set a Password</label>
                                                    <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="password">
                                                    <small class="text-danger"><?php  echo isset($error['password']) ? $error['password'] :'' ?></small> 
                                                </div>
                                            </div>
                                            <div class="form-row pl-5 ml-1">
                                                <input type="hidden" class="hide" name="token" id="token" value="">
                                                <button class="btn btn-primary btn-sm" type="submit" name="new_user">Sign Up</button>
                                            </div>
                                            
                                            <p class="text-left  badge pl-5">Already have an account ? <a class="card-link stretched-link" href="./log_in.php"> click here for login</a></p>

                                    </form>


                    
                </div>
                
                                


                                    





            
        </div>
    </div>




    <?php INCLUDE "./include/footer.php" ; ?>   