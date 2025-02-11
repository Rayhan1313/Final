<?php include "db.php" ; 
 ob_start();


?>


<?php  


/* ::::::::::::::::::::::::::::::::::::::::   function globally use korte parbo agulo   :::::::::::::::::::::::::::::::::::::::::::::::*/

function connection($query){
    global $connect;
    return mysqli_query($connect,$query);
   
}


function checked($result){
    global $connect ;
    if(!$result){
      die("Query Failed". mysqli_error($connect));
  }
  
  }



  function link_kori($location=null){
            header("Location:" .$location);
            exit;
  }




 
function ifItIsMethod($method=null){     //je method ashbo uppercase hobo..
  if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
    return true;
  
}
return false;  
} 






//<!-- log in page a username paise kina specific check kortesi because of problem amra choto kortesi -->
function isLoggedIn(){ 
    if(isset($_SESSION['user_role'])){
      return true;
    }
    return false;
  }
  
   
  
  //<!--
  
  
  
  
  //user loggin and redirect kortese ai shalaare dia -->
  
   function checkIfUserIsLoggedInAndRedirect($koi_pathabo=null){
     global $connect;
    if(isLoggedIn()){
      link_to($koi_pathabo);
    }
  }



 // <!--  ::::::::  registration page er email exist ase kina seta check korar code,,    :::::::: -->

   function email_exists_check($email){
    global $connect;
    $q ="SELECT email FROM users WHERE email='$email'";
    $c=mysqli_query($connect,$q);
    $new =mysqli_num_rows($c);
    if($new > 0){
      return true;
    }else{
      return false;
    }
  }


  function email_verified_kina($email){
    global $connect;
    if(email_exists_check($email)){
      $newpp=mysqli_query($connect,"SELECT email FROM users WHERE email='$email' AND status='verified'");
      $verified_kina =mysqli_num_rows($newpp);
      if($verified_kina > 0){
          return true;
      }else{
        return false ;
      }
    }

  }
  ?>
  
  
  
  
  
  
  
  
  <!-- user page er role ki admin naki subscriber aita detect kortesi .. jodi admin hoy tahole user page show korbe, else korbe na.. -->
  
  <?php function check_admin($username){
    global $connect;
        $check ="SELECT user_role FROM users WHERE username ='$username'";
        $dataconnect =mysqli_query($connect,$check);
        while($data_ber_kori = mysqli_fetch_array($dataconnect)){
          $new =$data_ber_kori['user_role'] ;
        if($new == 'admin'){
          return true;
        }else{
          return false; 
  
        }
      }
  
  }




  function check_moderator($username){
    global $connect;
        $cheeck ="SELECT user_role FROM users WHERE username ='$username'";
        $dataconneect =mysqli_query($connect,$cheeck);
        while($data_ber_korii = mysqli_fetch_array($dataconneect)){
          $neww =$data_ber_korii['user_role'] ;
        if($neww == 'moderator'){
          return true;
        }else{
          return false; 
  
        }
      }
  
  }


  function check_customer($username){
    global $connect;
        $cheeck ="SELECT user_role FROM users WHERE username ='$username'";
        $dataconneect =mysqli_query($connect,$cheeck);
        while($data_ber_korii = mysqli_fetch_array($dataconneect)){
          $neww =$data_ber_korii['user_role'] ;
        if($neww == 'customer'){
          return true;
        }else{
          return false; 
  
        }
      }
  
  }

  function check_delivery_man($username){
    global $connect;
        $cheeck ="SELECT user_role FROM users WHERE username ='$username'";
        $dataconneect =mysqli_query($connect,$cheeck);
        while($data_ber_korii = mysqli_fetch_array($dataconneect)){
          $neww =$data_ber_korii['user_role'] ;
        if($neww == 'delivery_man'){
          return true;
        }else{
          return false; 
  
        }
      }
  
  }


  ?>
  
  
  <?php  // registration page er user exist ase kina seta check korar code,, row count korse just
      function username_check($username){
        global $connect ;
        $new ="SELECT username FROM users WHERE username ='$username'";
        $c= mysqli_query($connect,$new);
        $count =mysqli_num_rows($c);
        if($count > 0){
          return true;
        }else{
          return false;
        }
      }



      function password_check($email,$password){
        global $connect ;
        $nerw ="SELECT * FROM users WHERE email ='$email'";
        $ccc= mysqli_query($connect,$nerw);
        while($neww=mysqli_fetch_assoc($ccc)){
          $pass =$neww['password'];
          


        }
        if(password_verify($password,$pass)){
          return true;
        }else{
          return false;
        }
        
      }

      
      
  















/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/






function user_registration($first_name,$last_name,$username,$mobile_number,$email,$user_image,$house_no,$street,$city,$password,$user_role,$token){
    global $connect;
  
        $user_role=mysqli_real_escape_string($connect,$user_role) ;
        $first_name =mysqli_real_escape_string($connect,$first_name) ;
        $last_name =mysqli_real_escape_string($connect,$last_name) ;
        $username =mysqli_real_escape_string($connect,$username) ;
        $mobile_number =mysqli_real_escape_string($connect,$mobile_number) ;
        $email =mysqli_real_escape_string($connect,$email) ;
        $user_image =mysqli_real_escape_string($connect,$user_image) ;
        $house_no =mysqli_real_escape_string($connect,$house_no) ;
        
        $street =mysqli_real_escape_string($connect,$street) ;
        
        $city =mysqli_real_escape_string($connect,$city) ;

        $password =mysqli_real_escape_string($connect,$password) ;
  
  
        $password = password_hash($password ,PASSWORD_BCRYPT ,array('cost'=>12));    // new process 1 line
        $token =mysqli_real_escape_string($connect,$token) ;
  
  
        $nn= "INSERT INTO users(first_name,last_name,username,mobile_number,email,user_image,house_no,street,city,password,user_role,token) ";
        $nn.="VALUES('$first_name','$last_name','$username','$mobile_number','$email','$user_image','$house_no','$street','$city','$password','$user_role','$token')" ;
        $nnn=mysqli_query($connect,$nn);
  
        //if(!$nnn){
           // die("Connection Failed" . mysqli_error($connect) . ' ' . mysqli_errno($connect));
          
          //}
          checked($nnn);
          // echo "you are successfully registered";
          //link_kori("../cms1/frontpage.php");
  
          
          
          
                 
     // }
  
  }




  function user_login($email,$password){
    global $connect;
  
  $email =trim($email)  ;
  $password =trim($password) ;
  

  $email =mysqli_real_escape_string($connect,$email) ;
  $password =mysqli_real_escape_string($connect,$password) ;
  
  $neew ="SELECT * FROM users WHERE email= '$email' AND status='verified'" ;
  $coo= mysqli_query($connect,$neew);
  if(!$coo){
      die("Query FAiled " . mysqli_error($connect)) ;
  }
  while($new =mysqli_fetch_array($coo)){
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
       
       $db_user_role = $new['user_role'];
       $db_user_status = $new['status'];
  
  
       if(password_verify($password,$db_user_password)){
        $_SESSION['user_id']=$db_id;        
        $_SESSION['first_name'] = $db_user_firstname ;
        $_SESSION['last_name'] = $db_user_lastname ;
        $_SESSION['username'] = $db_username ;
        $_SESSION['mobile_number'] = $db_user_mobile_number ;
        $_SESSION['email'] = $db_user_email ;
        $_SESSION['user_image'] =$db_user_image ;
        $_SESSION['user_role'] = $db_user_role ;
        $_SESSION['house_no'] = $db_user_house_no ;
        $_SESSION['street'] = $db_user_street ;
        $_SESSION['city'] = $db_user_city ;

        $_SESSION['status'] = $db_user_status ;
        if(empty($_SESSION['user_image'])){
          $_SESSION['user_image']="all.png";
        }
        
        if($_SESSION['user_role'] =='admin' || $_SESSION['user_role'] =='moderator' || $_SESSION['user_role'] =='delivery_man'){
          link_kori("./admin/index.php");
        }
        else{
          link_kori("./index.php");
        }
        
        
        
        }
        else {
          return false;
        
        }
        return true;
       
  
  }
  
  
  
  
  
  }
 
  









/*   oi page ey korsii

function  check_otp($email){
    $nw="SELECT token FROM users WHERE email=$email";
    $neew=connection($nw);
    while($newww=mysqli_fetch_array($neew)){
        $tokenn=$newww['token'];
    }
    
}

*/









function delete_categories(){
    global $connect;
    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE id = {$the_cat_id} ";
    $delete_query = mysqli_query($connect,$query);
    if($delete_query){
        header("Location: categories.php");
    }
     


    }




}



function insert_categories(){
    global $connect;
    if(isset($_POST['add_category'])){
        $category_name=$_POST['category_name'] ;
        $category_image=$_FILES['category_image']['name'] ;
        $category_image_tmp=$_FILES['category_image']['tmp_name'] ;
        move_uploaded_file($category_image_tmp ,"../include/item_img/category/$category_image") ;
        if(!empty($category_name)){
        $new ="INSERT INTO categories(category_name,category_image) VALUES ('$category_name','$category_image')";
        $conn=mysqli_query($connect,$new);
        
        
        if($conn){
            echo "Added successfully";
        }
    }else{
        echo "<p class='text-danger'>Category name can not be empty</p>";
    }
    }
}

?>