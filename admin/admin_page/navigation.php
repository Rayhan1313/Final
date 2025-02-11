
<nav class="navbar navbar-inverse fixed-top navbar-expand-lg bg-light border-white" role="navigation">
 
 <div class="navbar-header ml-3  ronded-left rounded-right rounded-top rounded-bottom border" style="background-color:#b3ecff;">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
         <span class="sr-only">Toogle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
          
     </button>
     <a class="navbar-brand font-weight-bold text-dark oop font-italic mt-4 pt-1 ronded-left rounded-right rounded-top rounded-bottom " href="index.php"><h1>  <i class="fa-solid fa-utensils"> </i> RT Food Delivery </h1></a>
 </div> 
 <ul class="navbar-nav topright  pt-4">
     
            <?php 

                                            
            $queery ="SELECT * FROM `order_list` WHERE user_id='".$_SESSION['user_id']."' ";
            $queery.="AND order_status='pending'";
            $ciii = connection($queery);
            $countt= mysqli_num_rows($ciii);


            
            $queerry ="SELECT * FROM `confirm_order` WHERE user_id='".$_SESSION['user_id']."' ";
            $queerry.="AND order_status='delivered'";
            $ciiii = connection($queerry);
            $ordered_item_by_customer_countt= mysqli_num_rows($ciiii); 


            


            $ki ="SELECT * FROM `confirm_order` WHERE user_id='".$_SESSION['user_id']."' ";
            $ki.="AND order_status='sent'";
            $connect_korii = connection($ki);
            $ordered_item_by_customer_pending_countt= mysqli_num_rows($connect_korii); 




            $wait ="SELECT  * FROM `confirm_order` WHERE  order_status='Received'  AND user_id='".$_SESSION['user_id']."'";
            $connect_koriiii = connection($wait);
            $ordered_item_by_customer_active_receive_countt= mysqli_num_rows($connect_koriiii); 
            $waitt ="SELECT  * FROM `confirm_order` WHERE  order_status='ON_THE_WAY'  AND user_id='".$_SESSION['user_id']."'";
            $connect_ko = connection($waitt);
            $ordered_item_by_customer_active_ON_WAY_countt= mysqli_num_rows($connect_ko); 
            $ordered_item_by_customer_active_countt= $ordered_item_by_customer_active_receive_countt +  $ordered_item_by_customer_active_ON_WAY_countt;





            $delivery_man_khali_koyday_ase ="SELECT * FROM `confirm_order` WHERE order_status='ON_THE_WAY' OR order_status='received'";    
            $okkk = connection($delivery_man_khali_koyday_ase);
            $taile_kotogula_order_joma_hoise= mysqli_num_rows($okkk); 




            $confirm_pending_koyda_ase ="SELECT * FROM `confirm_order` WHERE order_status='sent'"; 
            $okkkk = connection($confirm_pending_koyda_ase);
            $taile_kotogula_Pending= mysqli_num_rows($okkkk);





            $total_individual_d_man_task_q ="SELECT * FROM confirm_order WHERE  order_status='ON_THE_WAY' AND delivery_man_id='".$_SESSION['user_id']."'";
            $process_kori =mysqli_query($connect,$total_individual_d_man_task_q) ;
            $total_individual_d_man_task=mysqli_num_rows($process_kori);
            
            
            
            
            $pl ="SELECT * FROM confirm_order WHERE  order_status='delivered' AND user_id='".$_SESSION['user_id']."'";
            $pl_mix =mysqli_query($connect,$pl) ;
            $total_order_by_a_customer=mysqli_num_rows($pl_mix);
            
            
            
            $ggg ="SELECT * FROM confirm_order WHERE  order_status='delivered'";
            $okgg =mysqli_query($connect,$ggg) ;
            $total_delivered_order_list_admin_er_oikhane_count=mysqli_num_rows($okgg);
            
            
            
            
            
            $kaw ="SELECT * FROM confirm_order WHERE  order_status='placed_successfully' OR order_status='delivered'  AND delivery_man_id='".$_SESSION['user_id']."'";
            $mixxing =mysqli_query($connect,$kaw) ;
            $total_delivered_order_by_d_man=mysqli_num_rows($mixxing);
            
            
            

            $lllll ="SELECT * FROM confirm_order WHERE  order_status='placed_successfully'";
            $kopp =mysqli_query($connect,$lllll) ;
            $handover=mysqli_num_rows($kopp);
            
            
            
            
            $lppl = "SELECT * FROM users WHERE status='verified'";
            $poou = mysqli_query($connect,$lppl);
            $total_user = mysqli_num_rows($poou);
            
            
            
            $loppp=mysqli_query($connect,"SELECT * FROM users WHERE user_role='admin'");
            $total_admin=mysqli_num_rows($loppp);
            
            
            
            $lpol=mysqli_query($connect,"SELECT * FROM users WHERE user_role='moderator'");
            $total_moderator=mysqli_num_rows($lpol);
            
            
            
            $opli=mysqli_query($connect,"SELECT * FROM users WHERE user_role='delivery_man' AND status='verified'");
            $total_delivery_man=mysqli_num_rows($opli);
            
            
            
            $oplpp=mysqli_query($connect,"SELECT * FROM users WHERE user_role='customer' AND status='verified'");
            $total_customer=mysqli_num_rows($oplpp);
            
            
            
            
            
            $rpii ="SELECT * FROM confirm_order WHERE  order_status='delivered' AND order_processed_by='".$_SESSION['user_id']."'";
            $iknow =mysqli_query($connect,$rpii) ;
            $total_processed_order_by_admin_moderator=mysqli_num_rows($iknow);
            
            ?>



            

                    
                    
    <?php if(check_admin($_SESSION['username']) || check_moderator($_SESSION['username']) || check_customer($_SESSION['username'])) : ?>
     <li class="nav-item mt-1 ml-2 mr-4">
         <a class="btn white bg-white text-dark" href="../">
             <i class="fas fa-home mt-1 pt-2 ml-3 mr-2">  </i>   <b>Homepage </b>
         </a>
     </li>
     <?php endif; ?>
     



     <style>

     .color-deei_option:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        letter-spacing: 4px;
                        border: 1px solid green;
                        border-radius: 3px;
                        
                        
 
                                            
                        
                    }
                    .color-deei_option{
                        color: black;
                        background: transparent;
                        background-color: transparent;
                        
                        letter-spacing: 4px;
                        border: 1px solid green;
                        border-radius: 3px;
                        
                        
 
                                            
                        
                    }
                    .color-deei-button{
                        background-color: transparent;
                        background: transparent;
                        color: dark;
                    }

                    .color-deei-button:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        
                        border: 2px solid green;
                        border-radius: 5px;
                        padding: 5px;
                    }
                    
</style>

     <li class="nav-item dropdown background ml-4  mr-5">
        



         
     
         <a class="btn btn-lg white bg-transparent  text-dark color-deei-button"  data-toggle="dropdown">
         <img class="rounded-circle mr-2" src="../img/<?php echo $_SESSION['user_image'];?>" height="30px" width="40px" alt="card-img">
         <strong class="font-italic"><?php echo $_SESSION['username'];?></strong>
                </a>
         <ul class="dropdown-menu ml-2 hover-kori-dekhi">
             <li  class="ml-1 mr-2  text-center color-deei_option">
                 <a  class="ml-1 mr-2  text-dark text-center bg-transparent fs-4" href="./index.php "><i class="fas fa-id-card"> </i>   Profile   </a>
             </li>
             <li class="ml-1 mr-2  text-center color-deei_option">
                <a  class="ml-1 mr-2 text-dark  text-center bg-transparent fs-4"  class="ml-1" href="../help.php"><i class="fa-regular fa-circle-question"> </i>   Help   </a> 
            </li>
             <li class="ml-1 mr-2  text-center color-deei_option">
                 <a  class="ml-1 mr-2 text-dark  text-center bg-transparent fs-4" href="./settings.php"><i class="fas fa-cogs text-muted"> </i>  Settings  </a>
             </li>
             <li class="divider"></li>
             <li class="ml-1 mr-2  text-center color-deei_option">
                 <a  class="ml-1 mr-2 text-dark  text-center bg-transparent fs-4" href="../../include/log_out.php"><i class="fas fa-sign-out-alt"> </i>  Log-out </a>
             </li>
         </ul>

     </li>
  

 </ul>
</nav>
<br>
<br>
<br>
<br><br><br><br>



<div class="d-flex bg-transparent" id="wrapper">
<!-- Sidebar -->
<div class="container-fluid col-md-3 col-lg-3 border pt-5">
     <nav class="nav side-nav  container-fluid" role="navigation">    

         <div class="collapse navbar-collapse navbar-ex1-collapse container-fluid hover-kori-dekhi_div mt-3 mb-5 ml-2 mr-2 border rounded-left">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                 <span class="sr-only">Toogle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
         
             </button>
             <ul class="nav navbar-nav side-nav container-fluid   rounded-top rounded-bottom hover-kori-dekhi_ul mb-5 mt-3">
 
              
                
                 <?php  ?>

                 <style>
                   ul.hover-kori-dekhi_ul,li.hover-kori-dekhi{
                        background-color: transparent;
                        background: transparent;
                        
                            
                    }
                    .color-deei{
                        letter-spacing: 2px;

                    }
                        
                        
                     /* border coloe disi nicher tuk css a 2nd para */
                     li.hover-kori-dekhi:hover{
                            color:  black;
                            background: #b3ecff;
                            background-color: #f2f3f4;
                          
                           
                            

                        /* aikhane */
                            letter-spacing: 2px;
                            border: 2px solid green;
                            border-radius: 12px;
                            
                            
                    }
                   
                            
                    
                       hr {
                        -webkit-filter: brightness(200%) blur(1px);
                        filter: brightness(200%) blur(1px);
                    }
                    

                    h1,h3,h4,.okay {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }
                    .okk {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }




                   
                        
                        
                            
                    
                    .color-deei:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        letter-spacing: 4px;
                        border: 2px solid green;
                        border-radius: 5px;
                        padding: 5px;
                        
 
                                            
                        
                    }
                    
                            
                    
                 </style>

                 <li class="pt-auto mt-7 hover-kori-dekhi"> 
                     <a class="text-success  font-weight-bold color-deei" href="./index.php"><i class="fas fa-tachometer-alt fa-2x">  </i>  Dashboard</a>
                 </li>

                 <?php // if($_SESSION['user_role']=='subscriber') : ?>
                
                    
                 <?php // endif ; ?>
                 
                 
                 <?php if(check_admin($_SESSION['username']) || check_moderator($_SESSION['username'])) : ?>
                 <li class="hover-kori-dekhi">
                     <a class="text-success font-weight-bold color-deei" href="./categories.php"><i class="fas fa-hammer fa-2x hover-kori-dekhi"> </i>  Categories</a>
                     
                 </li>
                    <?php endif ; ?>


                    <?php if(check_customer($_SESSION['username'])) : ?>
                    <li class="hover-kori-dekhi">
                     <a class="text-success font-weight-bold color-deei" href="./cart.php"><i class="fa-solid fa-cart-arrow-down fa-2x "> </i> Cart (<?php echo $countt; ?>)</a>
                     
                    </li>
                    <?php endif ; ?>
                     

                 <?php  ?>

                 <?php if(check_admin($_SESSION['username']) || check_moderator($_SESSION['username'])) : ?>

                 <li class="dropdown hover-kori-dekhi">
                     <a class="text-success font-weight-bold color-deei"  id="dropdownMenuButton25" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"> <i class="fa-solid fa-jar fa-2x">  </i>  Items <i class="fas fa-caret-down"> </i> </a>
                     <ul aria-labelledby="dropdownMenuButton25" class="dropdown-menu bg-light">
                         
                            <a class="dropdown-item  color-deei" href="item_post.php"><i class="fa fa-eye" aria-hidden="true"></i> View Items </a>
                            <a class="dropdown-item  color-deei" href="item_post.php?source=add_posts"><i class="fa-solid fa-circle-plus"></i> Add Items </a> 
                         
                         
       
                     </ul>
                 </li>

                 <?php endif ; ?>
                

                 
               

                    
                    <?php if(check_customer($_SESSION['username'])) : ?>
                    <li class="dropdown hover-kori-dekhi">
                        <a class="text-success font-weight-bold color-deei" id="dropdownMenuButton" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bell-concierge fa-2x"> </i>  Current Order <i class="fas fa-caret-down">  </i></a>
                        <ul aria-labelledby="dropdownMenuButton" class="dropdown-menu bg-light">
                            
                                <a class="dropdown-item btn  color-deei" href="./current_order_details.php"><i class="fa-solid fa-hourglass-start"> </i>  Pending Orders (<?php echo $ordered_item_by_customer_pending_countt ; ?>)</a>
                                <a class="dropdown-item btn  color-deei" href="./active_order.php"><i class="fa-solid fa-utensils"> </i> Active Orders (<?php echo $ordered_item_by_customer_active_countt ; ?>)</a>
                               
                                
                                
                                
                            
        
                        </ul>
                    </li>
                    <?php endif ; ?>

                    <?php if(check_admin($_SESSION['username']) || check_moderator($_SESSION['username'])) { ?>
                    <li class="dropdown hover-kori-dekhi">
                        <a class="text-success font-weight-bold  color-deei" id="dropdownMenuButton" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bowl-food fa-2x"> </i>  Orders <i class="fas fa-caret-down">  </i> </a>
                        <ul aria-labelledby="dropdownMenuButton" class="dropdown-menu bg-light">
                            
                                <a class="dropdown-item btn  color-deei" href="./total_pending_order.php"><i class="fa-solid fa-hourglass-start">  </i>  Total Pending Order   (<?php echo $taile_kotogula_Pending; ?>)</a>
                                <a class="dropdown-item btn  color-deei" href="./total_active_order.php"> <i class="fa-solid fa-utensils">  </i>  Total Active Order   (<?php echo $taile_kotogula_order_joma_hoise; ?>)</a>
                                <a class="dropdown-item btn  color-deei" href="./hanover_order_by_d_man.php"><i class="fa-solid fa-clipboard-check">   </i>   Handover Order By Delivery Man (<?php echo $handover; ?>)</a>
                                <a class="dropdown-item btn  color-deei" href="./total_processed_order_by_moderator.php"><i class="fa-solid fa-microchip">  </i> Total Completed Order By You  (<?php echo $total_processed_order_by_admin_moderator ?>)</a>
                                <?php // if(check_admin($_SESSION['username'])) : ?>
                                <a class="dropdown-item btn  color-deei" href="./total_delivered_order.php"><i class="fa-solid fa-plate-wheat">   </i> Total Delivered Ordered  (<?php echo $total_delivered_order_list_admin_er_oikhane_count; ?>)</a>
                                <?php // endif ; ?>
                                
                                
                            
            
                        </ul>
                    </li>
                 
                     
                    <?php } ?>


                        <?php if($_SESSION['user_role'] == 'delivery_man') : ?>
                            <li class="hover-kori-dekhi">
                                <a class="text-success font-weight-bold color-deei" class="" href="./delivery_task_d_man.php"><i class="fa-solid fa-person-through-window fa-2x"> </i> </i> Task  (<?php echo  $total_individual_d_man_task ; ?>)</a>
                            </li>    

                        <?php endif; ?> 

                        <?php if($_SESSION['user_role'] == 'delivery_man') : ?>
                            <li  class="hover-kori-dekhi">
                                <a class="text-success font-weight-bold color-deei" class="" href="./delivery_all_item_by_dman.php"> <i class="fa-solid fa-truck-ramp-box fa-2x"> </i> Total Completed Task (<?php echo  $total_delivered_order_by_d_man ; ?>)</a>
                            </li>    

                        <?php endif; ?>



                    <?php if(check_customer($_SESSION['username'])) : ?>
                    <li  class="hover-kori-dekhi">
                        <a class="text-success font-weight-bold color-deei" class="" href="./all_delivered_order_customer_side.php"><i class="fa-solid fa-box fa-2x"> </i> Total Order History (<?php echo $total_order_by_a_customer ; ?>)</a>
                    </li>
                    <?php endif; ?>
                    
                 <?php // if(check_admin($_SESSION['username']) || check_moderator($_SESSION['username'])) : ?>
               <!--  <li>
                     <a class="text-success font-weight-bold " class="" href="./index.php"><i class="far fa-comment-dots"> Comments</i>  </a>
                 </li>
                 <?php // endif; ?> -->

                 <?php if(check_admin($_SESSION['username'])) : ?>
                 <li class="dropdown hover-kori-dekhi">
                     <a class="text-success font-weight-bold color-deei" id="dropdownMenuButton2" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"> <i class="fa-solid fa-user-large fa-2x">  </i>  Users  <i class="fas fa-caret-down">  </i></a>
                     <ul  class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton2">
                         
                             <a class="dropdown-item color-deei" href="./users.php"><i class="fa-solid fa-eye">  </i> View Total Users    (<?php echo $total_user; ?>)</a>
                         
                             
                             <a class="dropdown-item color-deei" href="./users.php?source=admin"><i class="fa-solid fa-eye">  </i> Total Admin   (<?php echo $total_admin; ?>)</a> 
                             <a class="dropdown-item color-deei" href="./users.php?source=moderator"><i class="fa-solid fa-eye">  </i> Total Moderator   (<?php echo $total_moderator; ?>)</a> 
                             <a class="dropdown-item color-deei" href="./users.php?source=delivery_man"><i class="fa-solid fa-eye">  </i> Total Delivery Man   (<?php echo $total_delivery_man; ?>)</a>
                             <a class="dropdown-item color-deei" href="./users.php?source=customer"><i class="fa-solid fa-eye">  </i> Total Customers   (<?php echo $total_customer; ?>)</a> 

                             <a class="dropdown-item color-deei" href="./users.php?source=add_users"><i class="fa-solid fa-user-plus">  </i> Add Users</a> 
       
                     </ul>
                 </li>
                 <?php endif ; ?>


                 
                 <?php if(check_admin($_SESSION['username']) || check_moderator($_SESSION['username'])) : ?>
                 <li class="hover-kori-dekhi">
                     <a class="text-success font-weight-bold color-deei" href="./coverage_area.php"><i class="fa-solid fa-location-dot fa-2x hover-kori-dekhi"> </i>  Coverage_area</a>
                     
                 </li>
                    <?php endif ; ?>

                    


                 <li class="hover-kori-dekhi">
                     <a class="text-success font-weight-bold color-deei" class="" href="./settings.php">  <i class="fa-solid fa-user-gear fa-2x">  </i>  Settings</a>
                 </li>
                 
                

                 


                 
             </ul>
         </div>
     </nav>
 </div> 
 
 
 <!--
    <li class="dropdown">
                     <a class="text-success font-weight-bold" id="dropdownMenuButton3" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"><i class="fas fa-child">   </i> Orders<i class="fas fa-caret-down"></i></a>
                     <ul  class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton3">
                         
                             <a class="dropdown-item text-success font-weight-bold" href="./total_pending_order.php"><i class="fas fa-hammer"> Total Pending Order   (<?php echo $taile_kotogula_Pending; ?>)</a>
                         
                             <a class="dropdown-item text-success font-weight-bold" href="./total_active_order.php"><i class="fas fa-hammer"> </i>Total Active Order   (<?php echo $taile_kotogula_order_joma_hoise; ?>)</a>
                     </ul>
                 </li> -->