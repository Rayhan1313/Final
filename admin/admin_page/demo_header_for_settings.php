demo_header_for_settings.php 


<?php  ob_start();

session_start();
?>
<?php  INCLUDE "../include/function.php"  ; ?>
<?php if(!isLoggedIn()) {
        link_kori("../index.php");
} ?>

<!DOCTYPE html>

<head>
    

    <title>RT Food Delivery</title>
    
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon"/>
    <!-- Latest compiled and minified CSS -->

   
    <link rel="stylesheet" type="text/css" href="css/style.css">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

    

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <!-- font awesome cdmn -->
     <script src="https://kit.fontawesome.com/c8bee5c707.js" crossorigin="anonymous"></script>
    




            <style>
                .background{
                background-image: url('../img/background.png');
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            </style>





</head>


 //start kori ok  

<body

class="container-fluid background rounded-left rounded-right min-vw-100">






