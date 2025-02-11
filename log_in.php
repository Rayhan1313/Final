
<?php INCLUDE "./include/db.php"; ?>
<?php INCLUDE "./include/function.php"; 

?>
<?php INCLUDE "./include/header.php" ; ?>

<?php



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    
    $email=$_GET['email'];
    $password=$_GET['password'];

    
    $error=[
        'email' =>'',
        'password'=> ''

    ];


    if ($email =='')  {
        $error['email'] = 'please enter your email.';
        
    }
    if(!empty($email ) && !$email ==''){
    if(!email_exists_check($email)){
        $error['email']="Email doesn't exist  <a href='./sign_up.php'>click here for sign_up</a>" ;
    }
}



    


    if ($password =='')  {
        $error['password'] = 'please enter your password.';

    }
    if(email_exists_check($email)){
    if(!password_check($email,$password)){
        $error['password']="incorrect password" ;
    }
    }




    foreach($error as $key => $value){   // prottekta error detect koirar jonno foreach loop use kora hyese
        if(empty($value)){
            unset($error[$key]);
           
        }
    }
    if(empty($error)){
       user_login($email, $password);

    }

}
else {
    link_kori('./log_in.php');
}




?>













 



<?php INCLUDE "./include/navigation.php"; ?>






<div class="container-fluid  float-left pl-5 mb-5 background  border rounded-left rounded-right rounded-top rounded-bottom">


        <div class="row container-fluid pl-5 mb-5 bg-transparent">
            <div class="col-lg-12 pl-5  bg-transparent ">
                
                <div class="card pl-5 pb-5 bg-transparent">
                    

                 





                <h3 class="font-italic text-left ml-5 pl-5 font-width-bolder mt-5"><strong><kbd>Log IN</kbd></strong></h3>
                    <form action="./log_in.php" autocomplete="off" method="GET" class="pt-4 pl-5 float-right bg-transparent" was-validated>

                        
                            


                            
                            <div class="form-row pl-5 bg-transparent ">
        
                                <div class="col-md-5 mb-3">
                                    <label for="email">Email</label>                                
                                    <input autocomplete="on" type="email" class="form-control form-control-sm" name="email" id="email" placeholder="your@mail.com" value="<?php  echo !isset($email) ? '':$email ?>"  required>    
                                    <small class="text-danger"><?php  echo isset($error['email']) ? $error['email'] :'' ?></small>  
                                </div>

                            </div>

                            
                            

                            <div class="form-row pl-5 bg-transparent">
                                <div class="col-md-5 mb-3">
                                    <label for="password">Enter your password</label>
                                    <input autocomplete="off" type="password" class="form-control form-control-sm" name="password" id="password" placeholder="password">
                                    <small class="text-danger"><?php  echo isset($error['password']) ? $error['password'] :'' ?></small>  
                                </div>
                            </div>
                            <div class="form-row pl-5 ml-1 bg-transparent">
                                <button class="btn btn-primary btn-sm" type="submit" name="log_in">Log IN</button>
                            </div>
                            
                            <p class="text-left  badge pl-5">Don't have an account  ? <a class="card-link stretched-link" href="./sign_up.php">
                                 click here for sign up</a>
                            </p>
                            <p class="text-left  badge pl-5">Forget Password? <a class="card-link stretched-link" href="./forget_password_er_kaj.php?forget=<?php echo uniqid(true) ; ?>">
                                  recover now</a>
                            </p>

                    </form>


                    <br><br>
    <br>
    <br><br>
    <br>
    
                </div>
            
        </div>
        <br>
    <br>
    <br>
        
   
    </div>
    

    





    <?php INCLUDE "./include/footer.php" ; ?>   