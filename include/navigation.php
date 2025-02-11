<style>


    
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





                    </style>
                   
<div class="container-fluid row mb-5 border border-dark">



    <nav class="navbar navbar-expand-lg bg-light background fixed-top active border  rounded-left rounded-right rounded-top rounded-bottom">

    <div class="navbar-header   rounded-left rounded-right rounded-top rounded-bottom">
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target=".navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                        <a class=" navbar-brand text-dark   mt-2 mb-1  pt-2  font-italic rounded-left rounded-right rounded-top rounded-bottom" style="background-color:#b3ecff;" href="./" ><h2 class="container-fluid "><i class="fa-solid fa-utensils"> </i>
                           RT Food Delivery </h2>
                        </a>
                       
    </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">



              
             
                <style>
                   ul.hover-kori-dekhi_ul,li.hover-kori-dekhi{
                        background-color: transparent;
                        background: transparent;
                        
                            
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

                    .color-deei:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        letter-spacing: 4px;
                        border: 2px solid green;
                        border-radius: 5px;
                        padding: 5px;
                        
 
                                            
                        
                    }
                    .color-deei-button{
                        background-color: transparent;
                        background: transparent;
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









          
      
        <li class="nav-item  dropdown mt-2  pt-2 pl-4 pr-2 background btn btn-xs "  data-toggle="tooltip" data-placement="top" title="click here to see food category"> <!-- css bb chilo -->
            <a class="btn-white background btn dropdown-toggle border border-dark color-deei-button" id="btnDropdownDemo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong class=""> <i class="bi bi-columns-gap"> </i>Food Category</strong> 
                </a>
            <div class="dropdown-menu background rounded border-secondary hover-kori-dekhi ml-4" aria-labelledby="navbarDropdown">  

            <?php   
            //category table theke item gulo ber kore antesi 
                                $new = "SELECT * FROM categories";
                                $fetchi =mysqli_query($connect,$new);
                                while($select =mysqli_fetch_assoc($fetchi)) { 
                                $id =$select['id'];
                                $rayhan=$select['category_name'];  //nicher a class a bb chilo.kete disi.....
                                    echo "
                                            <a class='dropdown-item background nav-link font-width-bolder color-deei  border text-center d-block justify-content-center  border-right-3 btn-sm  mr-1 ' href='./item_category.php?item_category_id={$id}'>
                                                    
                                                    <strong> $rayhan </strong> 
                                                         
                                            </a>
                                       " ;
                                     } 

                                     
                            ?>        
            </div>
        </li>
        <li class="nav-item mt-2 pt-2 pl-2 pr-2  bg-transparent btn btn-sm ">  <!-- bb class aikhan theke kete disi jeta css rakhsilam -->
            <a class="nav-link text-dark border border-dark text-light font-width-bolder btn-transparent color-deei-button rounded-left rounded-right btn btn-sm" href="price_list.php" data-toggle="tooltip" data-placement="top" title="click here to see food price list"><i class="fa-brands fa-joget"> </i><strong>  Pricing</strong></a>

        </li>
        


       
       
        <!-- bb class aikhan theke kete disi jeta css rakhsilam -->
       <!-- <li class="nav-item mt-2 pt-2 pl-2 pr-2  bg-transparent btn btn-sm">  
            <a class="nav-link text-dark border border-dark text-light font-width-bolder btn-transparent rounded-left rounded-right btn btn-sm" href="admin/index.php" data-toggle="tooltip" data-placement="top" title="click here to see food price list"><i class="fa fa-user-secret"> </i><strong>  Admin</strong></a>

        </li>-->

        
        
                <?php if(isLoggedIn()) { 
                    if(check_customer($_SESSION['username'])){?> 

                                                            
                       <?php     $queery ="SELECT * FROM `order_list` WHERE user_id='".$_SESSION['user_id']."' ";
                            $queery.="AND order_status='pending'";
                            $ciii = connection($queery);
                            $countt= mysqli_num_rows($ciii);


                            ?>
 
                      <li class="nav-item mt-2 pt-2 pl-2 pr-2  bg-transparent btn btn-sm" height="130px"> <!-- aikhane bb chilo -->
                          
                              <a class="btn-light btn-md nav-link mt-1 color-deei-button  font-weight-bolder border border-dark rounded-left rounded-right"  data-toggle="tooltip" data-placement="top" title="view carted list" href="./admin/cart.php"><strong><i class="bi bi-cart4"> </i></strong><strong>cart</strong>  
                                  <strong class="badge badge-success">
                                       <?php //kotogula cart korlam total pore user_id verify er kaj korbo cart er
                                       echo $countt; 
                                       ?>
                                  </strong>
                                  
                              </a>
                        
                             
                      </li>
                      <?php ?>
        <?php }} ?>
        
        </ul>
    </div>







    
                          <!-- 2nd ul nitesi ||||| function.php page a function banay short kortesi hijibijir jnno pore abar akhaney kaj ansi choto problem hyeclo
                          ,ki problem hoysilo vule gesi..pore kete disi..  -->




                          <!-- 2nd ul nitesi -->

                <ul class="navbar-nav pull-right mr-auto pl-2 bg-transparent">  <!-- sir er sathe kotha bolar por aa css class change korsi ... aikhane aa clss clo -->

                   <?php    if(isLoggedIn())  {       
                date_default_timezone_set('Asia/Dhaka');
                                                    $day = date('l');
                                                    $time = date('H:i:s A');
                                                    
                                                    $que_korii = sprintf("SELECT `ID` FROM `schedule_time` WHERE  `Day` = '%s' AND '%s' BETWEEN `Open` AND `Close`", $day, $time);
                                                    $result=mysqli_query($connect,$que_korii); 
                                                    
                                                    
                                                    while($row = mysqli_fetch_array($result)){
                                                    
                                                    $ID=$row['ID'];
                                                    }
                                                    if (mysqli_num_rows($result)>0) { ?>


                <li class="nav-item mt-2 pt-2 pl-2 pr-2  bg-transparent btn btn-sm ">  <!-- bb class aikhan theke kete disi jeta css rakhsilam -->
                    <a class="nav-link  border border-dark text-success font-width-bolder btn-transparent color-deei-button rounded-left rounded-right btn btn-sm" data-toggle="tooltip" data-placement="top" title="Shop is open, cart and place your order "><strong><i class="fa-solid fa-store"> </i>  Shop is Open</strong></a>

                </li>
                <?php }

                else{ ?>

                <li class="nav-item mt-2 pt-2 pl-2 pr-2  bg-transparent btn btn-sm ">  <!-- bb class aikhan theke kete disi jeta css rakhsilam -->
                    <a class="nav-link text-danger border border-dark  font-width-bolder btn-transparent color-deei-button rounded-left rounded-right btn btn-sm" data-toggle="tooltip" data-placement="top" title="We are available from 10AM  to 10PM (Monday to Sunday)"><strong><i class="fa-solid fa-store-slash"> </i>  Shop is closed</strong></a>

                </li>

             <?php } }  ?>
                      

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
</style>
                      



                      <?php if(isLoggedIn()): ?>
                     <li class="nav-item dropdown background mt-2 pt-2 ml-4 mb-1">
        
     
                        <a class="btn btn-sm white bg-transparent text-dark ml-3 mr-3 color-deei-button" data-toggle="dropdown">
                        <img class="rounded-circle mr-2" src="./img/<?php echo $_SESSION['user_image'];?>" height="30px" width="40px" alt="card-img">
                        <strong  class="font-italic"><?php echo $_SESSION['username'];?></strong  class="font-italic">
                                </a>
                        <ul class="dropdown-menu   ml-3 mr-4 ">
                            <li class="ml-1 mr-2  text-center color-deei_option">
                                <a class="ml-1 mr-2 bg-transparent text-dark text-center" href="./admin/index.php"><i class="fas fa-id-card"></i> <small class="text-xs">  Profile </small>   </a>
                            </li>
                            <li class="ml-1 mr-2  text-center color-deei_option">
                                <a  class=" mr-4 text-dark bg-transparent" href="./help.php"><i class="fa-regular fa-circle-question"> </i>  <small class="text-xs"> Help </small>  </a> 
                            </li>

                            <li class="ml-1 mr-2  text-center color-deei_option" >
                                <a  class="ml-1 mr-2 text-dark bg-transparent" href="./admin/settings.php"><i class="fas fa-cogs text-muted "></i> <small class="text-xs"> Settings </small>  </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="ml-1 mr-2  text-center color-deei_option">
                                <a  class="ml-1 mr-2 text-dark bg-transparent" href="./include/log_out.php"><i class="fas fa-sign-out-alt"> </i>  <small class="text-xs"> Log-out </small> </a>
                            </li>
                        </ul>

                    </li>



                      

                    <?php else: ?>

                        <!-- aikhane bb chilo 
                        <li class="nav-item pt-1   bg-transparent btn btn-sm"> 
                          <a class="text-white nav-link   mt-1 font-weight-bolder border border-dark rounded-left rounded-right btn-info" href="./include/log_out.php"><strong> <i class="fa fa-sign-out"> </i><bold> Log out</bold></strong></a> 
                      </li>
                            -->
                      
                      

                      <li class="nav-item pt-1  bg-transparent btn btn-sm">  <!-- aikhane bb chilo -->
                          <a class="text-white nav-link  mt-1 font-weight-bolder border border-dark rounded-left rounded-right  btn-success" href="./log_in.php"><strong> <i class="fa-solid fa-user-tag"> </i><bold> Log in</bold></strong></a> 
                      </li>



                      <li class="nav-item pt-1   bg-transparent btn btn-sm">
                          <a class="nav-link font-width-bolder mt-1  btn-primary  border border-dark rounded-left rounded-right" href="./sign_up.php"><i class="fa-solid fa-user-ninja"> </i> Sign Up</a> 
                      </li> 

                      <li class="nav-item pt-1  bg-transparent btn btn-sm">
                                <!-- website somporke pore likhbo -->

                                    <a class="nav-link font-width-bolder mt-1  btn-dark  border border-dark rounded-left rounded-right"  href="./help.php"> <i class="fa-regular fa-circle-question"> </i> Help</a> 
                        </li>

                    <?php endif; ?>


                     <!-- footer a pore about likhbo 


                      <li class="nav-item rounded-right pt-4 pl-3  pr-2 bb ">   -->
                                <!-- website somporke pore likhbo 

                            <a class="nav-link  border border-dark text-white btn-outline-dark" href="#"><i class="fa-solid fa-circle-info"> </i>About Us</a> 
                     </li>
                     -->

                      

                </ul>
   
          </div>






    </nav>



</div>
  
<!--
    
//Tv link add korchilam

<div class="w-50 justify-content-center" height='200'><iframe src="//stream.crichd.vip/update/star.php" width="100%" height="500px" marginheight="0" marginwidth="0" scrolling="no" frameborder="0" allowfullscreen  allow="encrypted-media"></iframe>

</div> -->
           
        
            
            
           
           
               
           
