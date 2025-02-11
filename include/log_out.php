<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

$_SESSION['user_id']=null;
        
        $_SESSION['first_name'] = null ;
        $_SESSION['last_name'] = null ;
        $_SESSION['username'] = null ;
        $_SESSION['mobile_number'] = null ;
        $_SESSION['email'] = null ;
        $_SESSION['user_image'] =null ;
        $_SESSION['user_role'] = null ;
        $_SESSION['addresses'] = null;
        $_SESSION['status'] = null ;
        
    
// header("Location: ../index.php");

header("Location: ../");

?>

