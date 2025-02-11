<?php
if(isset($_POST['add_user'])){
    

    $first_name =$_POST['first_name'];
    $last_name =$_POST['last_name'];
    $username =$_POST['username'];
    $mobile_number =$_POST['mobile_number'];
    $email =$_POST['email'];
    $user_image =$_FILES['user_image']['name'];
    $temp_loc =$_FILES['user_image']['tmp_name'];
    move_uploaded_file($temp_loc, "../img/$user_image");
    
   


    $user_role=$_POST['user_role'];
    $house_no =$_POST['house_no'];
    $street =$_POST['street'];
    $city =$_POST['city'];
    $password =$_POST['user_password'];
    $status =$_POST['user_status'];
    
   
    
    $qqq = "SELECT pass_proteect from users";
    $cooo=mysqli_query($connect,$qqq);
    checked($cooo);
    while($new =mysqli_fetch_array($cooo)){
        $pass_proteect = $new['pass_proteect'];
    }
        $password1 =crypt($password,$pass_proteect);




        $nn= "INSERT INTO users(first_name,last_name,username,mobile_number,email,user_image,house_no,street,city,password,user_role,status) ";
        $nn.="VALUES('$first_name','$last_name','$username','$mobile_number','$email','$user_image','$house_no','$street','$city','$password1','$user_role','$status')" ;
        $nnn=mysqli_query($connect,$nn);
          

} 
?>













<form action="" method="post" class="w-50" enctype="multipart/form-data">
    <br>
   <?php if(isset($nnn)){
        echo "User" ." ".$username . " " . "added successfully. Go back to user page <a href='../admin/users.php'> click here</a> ";
    }
    ?>
    <br>


        <div class="form-row pl-5">

                <div class="col-md-3 col-lg-6 mb-3 ">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" placeholder="First name" autocomplete ="on">
                       
                </div>

                <div class="col-md-2 col-lg-6 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text"autocomplete ="on" class="form-control form-control-sm" name="last_name" id="last_name" placeholder="Last name">
                   
                </div>


        </div>
        <div class="form-row pl-5">

        <div class="col-md-5 mb-3">
            <label for="username">Profile Name</label>                                
            <input type="text" autocomplete ="on" class="form-control form-control-sm" name="username" id="username" placeholder="Username" >    
            
        </div>

    </div>






    



    <div class="form-group pl-5">
        <label for="post_status">Set Role</label>
            <select name="user_role" id="" class="text-md pl-auto" >
                <option value="admin">admin</option>
                
                <option value='customer'>customer</option>
                <option value='moderator'>moderator</option>
                <option value='delivery_man'>delivery man</option>
                

            </select>    

       
                      
    </div>

    <div class="form-row pl-5">

                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <label for="mobile_number">Mobile Number</label>                                
                                                    <input type="number" autocomplete ="on" class="form-control form-control-sm" name="mobile_number" id="mobile_number" placeholder="01XXXXXXXXX">    
                                                    
                                                </div>
                                                
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <label for="email">Email</label>                                
                                                    <input type="email"  autocomplete ="on" class="form-control form-control-sm" name="email" id="email" placeholder="your@mail.com" >    
                                                  
                                                </div>

                                            </div>


    
                                            <div class="form-row pl-5">

                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <label for="user_image">Upload a photo</label>
                                                   
                                                    <input type="file" name="user_image" class="form-control-file" id="user_image">
                                                </div>

                                            </div>


                                            <div class="form-row pl-5">
                                                <div class="col-md-2 col-lg-3 mb-3">
                                                    <label for="house_no">House No</label>
                                                    <input type="number" autocomplete ="on" class="form-control form-control-sm" name="house_no" id="house_no" placeholder="House No">
                                                    
                                                </div>
                                                <div class="col-md-2 col-lg-6 mb-3">
                                                    <label for="street">Street Name</label>
                                                    <input type="text" autocomplete ="on" class="form-control form-control-sm" name="street" id="street" placeholder="street name">
                                                    
                                                </div>
                                                <div class="col-md-1 col-lg-3 mb-3">
                                                    <label for="city">City</label>
                                                    <input type="text" autocomplete="on" class="form-control form-control-sm" name="city" id="City" placeholder="City">
                                                    
                                                </div>
                                            </div>


    


    
    <div class="form-group pl-5">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group pl-5">
        <label for="post_status">Set Status</label>
            <select name="user_status" id="" class="text-md pl-auto" >
                <option value="verified">verified</option>
                <option value='not verified'>not verified</option>

            </select>    

       
                      
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn-success btn-lg" name="add_user">ADD USER</button>
    </div>
 
</form>
