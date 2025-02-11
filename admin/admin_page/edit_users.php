

<?php


if(isset($_GET['edit_user'])){
    $picking_user_id = $_GET['edit_user'];
}


    $rules ="SELECT * FROM users WHERE user_id = $picking_user_id"  ;
    $news =mysqli_query($connect,$rules) ;
    while($new=mysqli_fetch_assoc($news)){
        $db_id = $new['user_id'];       
        $db_user_firstname = $new['first_name'];
        $db_user_lastname = $new['last_name'];
        $db_username = $new['username'];
        $db_user_mobile_number = $new['mobile_number'];
        $db_user_email = $new['email'];      
        $db_user_image = $new['user_image'];
        $db_user_house_no = $new['house_no'];
        $db_user_street = $new['street'];
        $db_user_city = $new['city'];
        $db_user_password = $new['password'];
        //$db_user_addresses = $new['addresses'];
        $db_user_role = $new['user_role'];
        $db_user_status = $new['status'];
      
    






if(isset($_POST['edit_user'])){
    

    $first_name =$_POST['first_name'];
    $last_name =$_POST['last_name'];
    $username =$_POST['username'];
    $mobile_number =$_POST['mobile_number'];
    $email =$_POST['email'];
    $user_image =$_FILES['user_image']['name'];
    $temp_loc =$_FILES['user_image']['tmp_name'];
    move_uploaded_file($temp_loc, "../img/$user_image");
    
    if(empty($user_image)){
        $new="SELECT user_image FROM users WHERE user_id=$db_id" ;
        $CON =mysqli_query($connect,$new);
        while($ro =mysqli_fetch_assoc($CON)){
            $user_image =$ro['user_image'];
        }
    }


    $user_role=$_POST['user_role'];
    $house_no =$_POST['house_no'];
    $street =$_POST['street'];
    $city =$_POST['city'];
    $password =$_POST['user_password'];
    $status =$_POST['user_status'];
    //$post_date =date('d-m-y');
   
    echo "Updates" ." ".$username . " " . "successfully. Go back to user page <a href='../admin/users.php'> click here</a> ";
    $qqq = "SELECT pass_proteect from users";
    $cooo=mysqli_query($connect,$qqq);
    checked($cooo);
    while($new =mysqli_fetch_array($cooo)){
        $pass_proteect = $new['pass_proteect'];
    }
        $password1 =crypt($password,$pass_proteect);

   
   
    $query ="UPDATE users SET " ;
    $query.="first_name = '{$first_name}' ," ;  
    $query.="last_name ='$last_name' ," ; 
    $query.="username ='$username' ,";
    $query.="user_role ='$user_role' ,";
    $query.="mobile_number ='$mobile_number' ,";
    $query.="email ='$email' ,";
    $query.="user_image ='$user_image' ,";
    $query.="house_no ='$house_no' ,";
    $query.="street ='$street' ,";
    $query.="status ='$status' ,";
    $query.="city ='$city' ,";
    $query.="password ='$password1' "  ;
    $query.="WHERE user_id = $picking_user_id";
    $update_user =mysqli_query($connect,$query) ;

    checked($update_user) ;
    

    
}





?>



<form action="" method="post" class="w-50" enctype="multipart/form-data">
    <br>
    <br>


        <div class="form-row pl-5">

                <div class="col-md-3 col-lg-6 mb-3 ">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control form-control-sm" value="<?php  echo $db_user_firstname ;  ?>" name="first_name" id="first_name" placeholder="First name" autocomplete ="on">
                    <small class="text-danger"><?php  echo isset($error['first_name']) ? $error['first_name'] :'' ?></small>     
                </div>

                <div class="col-md-2 col-lg-6 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" value="<?php  echo $db_user_lastname ;  ?>" autocomplete ="on" class="form-control form-control-sm" name="last_name" id="last_name" placeholder="Last name">
                    <small class="text-danger"><?php  echo isset($error['last_name']) ? $error['last_name'] :'' ?></small> 
                </div>


        </div>
        <div class="form-row pl-5">

        <div class="col-md-5 mb-3">
            <label for="username">Profile Name</label>                                
            <input type="text" value="<?php  echo $db_username ;  ?>" autocomplete ="on" class="form-control form-control-sm" name="username" id="username" placeholder="Username" >    
            <small class="text-danger"><?php  echo isset($error['username']) ? $error['username'] :'' ?></small> 
        </div>

    </div>






    



    <div class="form-group pl-5">
        <label for="post_status">Set Role</label>
            <select name="user_role" id="" class="text-md pl-auto" >
                <option value="<?php echo $db_user_role ; ?>"><?php echo $db_user_role ; ?></option>
                <?php 
                if($db_user_role == 'admin'){
                echo "<option value='customer'>customer</option>";
                echo "<option value='moderator'>moderator</option>";
                echo "<option value='delivery_man'>delivery man</option>";
                }else{
                    echo "<option value='admin'>admin</option>";
                    }
                ?>

            </select>    

       
                      
    </div>

    <div class="form-row pl-5">

                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <label for="mobile_number">Mobile Number</label>                                
                                                    <input type="number" autocomplete ="on" class="form-control form-control-sm" name="mobile_number" id="mobile_number" placeholder="01XXXXXXXXX"  value="0<?php  echo $db_user_mobile_number ; ?>">    
                                                    <small class="text-danger"><?php  echo isset($error['mobile_number']) ? $error['mobile_number'] :'' ?></small> 
                                                </div>
                                                
                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <label for="email">Email</label>                                
                                                    <input type="email" value="<?php  echo $db_user_email ;  ?>" autocomplete ="on" class="form-control form-control-sm" name="email" id="email" placeholder="your@mail.com" >    
                                                    <small class="text-danger"><?php  echo isset($error['email']) ? $error['email'] :'' ?></small> 
                                                </div>

                                            </div>


    
                                            <div class="form-row pl-5">

                                                <div class="col-md-6 col-lg-6 mb-3">
                                                    <label for="user_image">Upload a photo</label>
                                                    <img width="100" src="../img/<?php echo $db_user_image; ?>" name="image" alt="set a image">
                                                    <input type="file" name="user_image" class="form-control-file" id="user_image">
                                                </div>

                                            </div>


                                            <div class="form-row pl-5">
                                                <div class="col-md-2 col-lg-3 mb-3">
                                                    <label for="house_no">House No</label>
                                                    <input type="number" autocomplete ="on" class="form-control form-control-sm" name="house_no" id="house_no" placeholder="House No" value="<?php  echo $db_user_house_no; ?>">
                                                    <small class="text-danger"><?php  echo isset($error['house_no']) ? $error['house_no'] :'' ?></small> 
                                                </div>
                                                <div class="col-md-2 col-lg-6 mb-3">
                                                    <label for="street">Street Name</label>
                                                    <input type="text" autocomplete ="on" class="form-control form-control-sm" name="street" id="street" placeholder="street name" value="<?php  echo $db_user_street; ?>">
                                                    <small class="text-danger"><?php  echo isset($error['street']) ? $error['street'] :'' ?></small> 
                                                </div>
                                                <div class="col-md-1 col-lg-3 mb-3">
                                                    <label for="city">City</label>
                                                    <input type="text" autocomplete="on" class="form-control form-control-sm" name="city" id="City" placeholder="City" value="<?php  echo $db_user_city; ?>">
                                                    <small class="text-danger"><?php  echo isset($error['city']) ? $error['city'] :'' ?></small> 
                                                </div>
                                            </div>


    


    
    <div class="form-group pl-5">
        <label for="user_password">Password</label>
        <input  type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group pl-5">
        <label for="post_status">Set Status</label>
            <select name="user_status" id="" class="text-md pl-auto" >
                <option value="<?php echo $db_user_status ; ?>"><?php echo $db_user_status ; ?></option>
                <?php 
                if($db_user_role == 'verified'){
                echo "<option value='not verified'>not verified</option>";
                
                }else{
                    echo "<option value='verified'>verified</option>";
                    }
                ?>

            </select>    

       
                      
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn-success btn-lg" name="edit_user">Update</button>
    </div>
    <p class="pl-5 text-danger"> *****If u click update button , each time you need to change your password for security issues.</p>
 
</form>



<?php } ?>