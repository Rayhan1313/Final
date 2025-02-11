
<?php session_start() ; ?>
<?php include 'function.php' ?>

<?php



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(empty( $email) || empty( $password)){
      link_kori('../index.php');
    }
    
       
  $email =trim($email)  ;
  $password =trim($password) ;
  

  $email =mysqli_real_escape_string($connect,$email) ;
  $password =mysqli_real_escape_string($connect,$password) ;
  
  $neew ="SELECT *,(house_no + ','  ' ' + street + ',' ' ' + city) AS addresses FROM users WHERE email= '$email'" ;
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
    /*   $db_user_house_no = $new['house_no'];
       $db_user_street = $new['street'];
       $db_user_city = $new['city'];
       */
       $db_user_password = $new['password'];
       $db_user_addresses = $new['addresses'];
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
        $_SESSION['addresses'] = $db_user_addresses ;
        $_SESSION['status'] = $db_user_status ;
        
        
        
        link_kori("../admin/index.php");
        
        }
        else {
          return false;
        
        }
        return true;
       
  
  }
  

    }


else {
    link_kori('./index.php');
}




?>