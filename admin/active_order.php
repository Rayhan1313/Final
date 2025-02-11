<?php ob_start(); ?>






<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page//header.php" ;


?>
    


    <?php //if(!check_admin($_SESSION['username'])){
   //         header("Location: ./index.php"); 
    //    }
?>











    <div id="wrapper" class="background ">
       

        
  

        <!-- Navigation -->
 
       
        
        
    

        <div id="page-wrapper" class="background">
                <?php include "./admin_page/navigation.php" ?>
                

                <div class="container-fluid bg-transparent border mb-3">
                        
                            <div class="col-lg-12 card  mb-4 bg-transparent">
                                    <ol class="breadcrumb pl-auto bg-transparent mt-3">
                                        <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                                        <li><a class="text-dark" href="./active_order.php"><i class="fa-solid fa-utensils"> <small>Active Orders</small></i> </a></li>

                                    </ol>
                            </div>
                            
                           <br>     

                        <!-- Page Heading -->
                        
                            
                            <div class="col-lg-12 card bg-transparent">

                                            <?php 
                                                if(isset($_GET['source'])){
                                                    $source = $_GET['source'] ;
                                                }
                                                else{
                                                    $source ='' ;
                                                }
                                                switch($source){
                                                    case 'view_details' ;
                                                    include "./admin_page/order_details_user.php";
                                                    break ;


                                                

                                                    default ;
                                                    include "./admin_page/active_order_details_user.php" ;
                                                }
                                            ?>
                                


                                



                                                                                                    <!-- Messenger Chat Plugin Code -->
                                                    <div id="fb-root"></div>

                                                <!-- Your Chat Plugin code -->
                                                <div id="fb-customer-chat" class="fb-customerchat">
                                                </div>


                                                <style>
                                                .messenger-ok{
                                                    position: fixed;
                                                    bottom: 5px;
                                                    right: 20px;
                                                    
                                                }
                                            </style>
                                            <div class="messenger-ok">
                            
                                                <a href="../help.php" target="_blank" rel="noopener noreferrer">
                                                    <small>for better experience browse messenger from help-desk</small>
                                                </a>
                                            </div>





                                                <script>
                                                var chatbox = document.getElementById('fb-customer-chat');
                                                chatbox.setAttribute("page_id", "101214685074790");
                                                chatbox.setAttribute("attribution", "biz_inbox");
                                                </script>

                                                <!-- Your SDK code -->
                                                <script>
                                                window.fbAsyncInit = function() {
                                                    FB.init({
                                                    xfbml            : true,
                                                    version          : 'v14.0'
                                                    });
                                                };

                                                (function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s); js.id = id;
                                                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));
                                                </script>







                                            <style>
                                                .whatsapp-ok{
                                                    position: fixed;
                                                    bottom: 10px;
                                                    right: 20px;
                                                    left: 20px;
                                                }
                                            </style>
                                            <div class="whatsapp-ok">
                                                <a href="http://wa.me/8801778700365" target="_blank">
                                                    <img src="../img/logo/whatsapplogo.PNG" width="60px" height="60px"><br>
                                                    
                                               
                                                    <small>You can directly message us on whatsapp by cllicking here or on the icon</small>
                                                </a>
                                            </div>








                        
                                            
                                <br>
                                                            <br>
                                                            <br>
                                                            
                                                           
                                                           
                             
                             
                                                            <hr>
                                           
                                            

                            </div>        
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>



                        
                </div><br>
                <!-- /.row -->
               

        </div>
            <!-- /.container-fluid -->
   



    </div>






  
        
     
        
        
        
    <?php include "./admin_page/footer.php" ?>
