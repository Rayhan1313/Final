<?php ob_start(); ?>


<!--  ekta bug ase present -- multiple order eer khetre , sob gulo order same dekhacce ,, confirm_order_id fix kora hoy nai,,,,


confirm order dewar por confirm_order_id  + order_code duitai order details a pathano lagbe --   sudhu order_code tai ami pathaysi,,,  -->



<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    


    <?php //if(!check_admin($_SESSION['username'])){
   //         header("Location: ./index.php"); 
    //    }
?>











    <div id="wrapper" class="background mb-5">
       

        
  

        <!-- Navigation -->
 
       
        
        
    

        <div id="page-wrapper" class="background mb-5">
                <?php include "./admin_page/navigation.php" ?>

                <div class="container-fluid border background">
                    

                        <!-- Page Heading -->
                        <div class="row  bg-transparent ml-1 mt-1 mb-1 mr-1" >
                            


                                <div class="card container-fluid bg-transparent mb-3">
                                    <ol class="breadcrumb pl-auto bg-transparent mt-3">
                                        <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                                        <li><a class="text-dark" href="./cart.php"><i class="fa-solid fa-cart-arrow-down"> <small> Cart</small></i> </a></li>

                                    </ol>
                                </div>
                                
                                
                                


                                <div class="card container-fluid mt-3 bg-transparent">



                                            <?php
                                            if(isset($_GET['confirm'])){
                                                $order_date=date('y-m-d');

                                                $Object = new DateTime();  
                                                $Object->setTimezone(new DateTimeZone('Asia/Dhaka'));
                                                $order_time = $Object->format("h:i:s a");
                                                
                                                $length= 4;
                                                $order_code= bin2hex(openssl_random_pseudo_bytes($length));




                                                $newop="SELECT * FROM confirm_order WHERE   user_id='".$_SESSION['user_id']."' ";
                                                $newop .="AND order_status='sent'";
                                                
                                               $jj=connection($newop);
                                               $sentt=mysqli_num_rows($jj);
                                               $total = $sentt + $ordered_item_by_customer_active_countt ;

                                               
                                                if($total >0){
                                                    echo '<script language="javascript" type="text/javascript">
                                                            alert("You have already placed an order.Once you received that order then you can place onother order");
                                                            window.location = "./cart.php";
                                                        </script>';

                                                }
                                                
                                                
                                                
                                                
                                                
                                                else{


                                                    date_default_timezone_set('Asia/Dhaka');
                                                    $day = date('l');
                                                    $time = date('H:i:s A');
                                                    
                                                    $que_korii = sprintf("SELECT `ID` FROM `schedule_time` WHERE  `Day` = '%s' AND '%s' BETWEEN `Open` AND `Close`", $day, $time);
                                                    $result=mysqli_query($connect,$que_korii); 
                                                    
                                                    
                                                    while($row = mysqli_fetch_array($result)){
                                                    
                                                    $ID=$row['ID'];
                                                    }
                                                    if (mysqli_num_rows($result)<1) { ?>
                                                    
                                                    <div class="background mt-4 mb-4">
                                                           <samp>

                                                           <?php
                                                           echo '<script language="javascript" type="text/javascript">
                                                           alert("you can not place an order right now  because the Shop has been closed.  We are available from 10AM to 10PM (Monday-Sunday)");
                                                           window.location = "./cart.php";
                                                       </script>';
                                                           
                                                           ?>
                                                              
                                                           </samp>
                                                        
                                                       </div> 
                                                      <?php } else {
                                                           
                                                           
                                                                                                                 














                                                $confirm_a_pathabo="INSERT INTO confirm_order(order_code,order_status,user_id,delivery_man_id,order_date,order_time) ";
                                                $confirm_a_pathabo.="VALUES('$order_code','sent','".$_SESSION['user_id']."','null',now(),'$order_time') ";
                                                $okk=connection($confirm_a_pathabo);
                                                
                                                if(isset($okk)){
                                                    $neeewwo="SELECT * FROM confirm_order WHERE order_status='sent' AND user_id='".$_SESSION['user_id']."'";
                                                    $okkkky=connection($neeewwo);
                                                    while($daaata=mysqli_fetch_assoc($okkkky)){
                                                        $order_code=$daaata['order_code'];
                                                        $order_statuss=$daaata['order_status'];

                                                    }
                                                    $next_kaj ="UPDATE order_list SET order_code='$order_code',order_status='$order_statuss' WHERE order_status='pending' AND user_id='".$_SESSION['user_id']."'";
                                                    $aita_connect_kori=connection($next_kaj);
                                                    if(isset($aita_connect_kori)){ 
                                                      //  header("Location:" .$_SERVER['PHP_SELF']);
                                                        
                                                        ?>
                                                        
                                                        <div class="background mt-4 mb-4">
                                                            <h2 class="text-dark mt-2 text-monospace">your order successfully placed...</h2>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            
                                                            <br>
                                                            <br>
                                                            <hr>

                                                        </div>

                                                        

                                                <?php  //location fix kore disi
                                                
                                                header( 'refresh: 5; url=./current_order_details.php' );
                                                 }
                                                } }
                                            }} 
                                              else{  ?> 


                                                        <?php  
                                                        $rules ="SELECT * FROM `order_list` WHERE user_id='".$_SESSION['user_id']."' ";
                                                        $rules.="AND order_status='pending'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c>0){
                                                        
                                                        ?>
                                                        
                                        
                                                                    <div class="mt-2">
                                        <h3 class="font-italic font-weight-bolder text-monospace text-center mt-2 mb-2">Your Carted Items
                                            <hr>
                                        </h3>
                                        <br>
                                                <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                        <tr class="text-dark">
                                                        <th>Item Name</th>
                                                        
                                                        <th>Quantity</th>
                                                        <th>Sub Total Price</th>
                                                        <th>Edit Quantityy</th>
                                                        <th>Remove Item</th>
                                                        <th class="text-center">Total Price</th>
                                                        </tr>
                                                        <tbody>

                                                        <?php 
                                                        
                                                    
                                                        $rules ="SELECT * FROM `order_list` WHERE user_id='".$_SESSION['user_id']."' ";
                                                        $rules.="AND order_status='pending'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        while($view=mysqli_fetch_assoc($news)){
                                                            $order_id =  $view['order_id'];     
                                                            $item_name =  $view['ordered_item_name'];
                                                            
                                                            $ordered_item_price =  $view['ordered_item_price'];
                                                            $Quantity =  $view['quantity'];
                                                            $Total_price =  $view['total_price'];
                                                        
                                        
                                                        

                                                        echo "<tr>" ;
                                                    
                                                        echo "<td class='mt-5 pt-5'>{$item_name}</td>";
                                                        echo "<td class='mt-5 pt-5'>{$Quantity}</td>";
                                                        echo "<td class='mt-5 pt-5'>{$Total_price}</td>"; ?>


                                                            <td class="justify-content-flex-start bg-transparent">

                                                                <form action="" class='form  w-50 pt-3' method='POST'>
                                                                    <div class='form-group mb-2 mt-2 mr-4 row'>
                                                                        <input type='number' class='form-control-xm form-control col-lg-3' name='quantityy' min='1' value='<?php echo $Quantity ; ?>'>
                                                                        <input type='hidden'  name='id' value='<?php echo $order_id ; ?>'>
                                                                        <input type='hidden'  name='item_price' value='<?php echo $ordered_item_price ; ?>'>
                                                                        <button type='submit' class='btn btn-sm btn-primary pt-1 mb-1 ml-1 col-lg-3 mt-1' name='change'>change</button>
                                                                    </div>
                                                                    
                                                                </form>



                                                            </td>

                                                            <?php echo "<td><a onClick=\"javascript: return confirm('Are you sure to remove that item?');  \" class='btn btn-danger mt-4' href='cart.php?remove={$order_id}'><i class='fa-solid fa-minus'></i></a></td>";

                                                                ?>







                            
                                                    
                                                        
                                                        </tr>

                                                        
                                                        <?php         } ?> 
                                                        
                                                        
                                                       
                                                        
                                                        </tbody>
                                                        <?php  // item remove kori.....relax
                                    if(isset($_GET['remove'])){
                                     echo   $ittem_id =$_GET['remove'] ;
                                        $queryy = "DELETE FROM order_list WHERE order_id = {$ittem_id} ";
                                        $remove =mysqli_query($connect,$queryy);
                                        header("Location: ./cart.php");
                                        
                                    }
                                    
                                    
                                    ?>
                                                        
                                            </table>


                                            <hr>
                                            <?php 
                                                        $queryyy = "SELECT SUM(total_price) AS total_money FROM order_list WHERE order_status='pending' AND user_id='".$_SESSION['user_id']."'";
                                                            $M =mysqli_query($connect,$queryyy);
                                                            while ($values=mysqli_fetch_assoc($M)) {
                                                                $total_money = $values['total_money'];
                                                                
                                                            }
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-lg-6 form">
                                                            
                                                              
                                                                
                                                                <?php
                                                                echo 
                                                                
                                                                    "<a onClick=\"javascript: return confirm('Are you Sure to Confirm Order?');  \" class='btn btn-success' href='Cart.php?confirm'> Confirm Order</a>";

                                                                ?>
                                                                <br>***Payment-method :Cash On Delivery 
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <p  class="text-right  mr-5"><samp class=" font-weight-bolder"><b><?php echo " ".$total_money; ?></b></samp> <small>taka</small> </p>
                                                               
                                                              
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row pt-auto">
                                                                    <div class="col-lg-10">
                                                    
                                                                            
                                                                    <br>
                                                                                                    <p  class="text-right ml-3 pl-3">Delivery charge: </p>
                                                                                                    <p  class="text-right ml-3 pl-3">Amount to pay: </p>

                                                                                                </div>
                                                                                                <div class="col-lg-2">
                                                                                                   <p  class="text-right mt-3 mr-5"> + <samp class=" font-weight-bolder"> <b>20</b> </samp> <small>taka</small> </p><hr>
                                                                                                    <p  class="text-right mr-5"><samp class=" font-weight-bolder"><b><?php echo " ".$total_money +20; ?></b></samp> <small>taka</small> </p>
                                                                                                   

                                                                                                    
                                                                    </div>
                                                                    
                                                        <br>
                                                        <hr>
                                                         <div class="row">
                                                                
                                                                
                                                                
                                                               
                                                                
                                                                   
                                                            
                                                            
                                                                 <p  class="btn ml-5 d-flex justify-content-center text-monospace">Terms and Conditions are applicable for place an order . <a class="text-primary text-underlined" data-toggle="modal" data-target="#myModal">_click here to see all <i class="fa-solid fa-triangle-exclamation"></i>terms & conditions_ </a> for placing an order.</p>

                                                                    
                                                                    <div class="modal fade" id="myModal" role="dialog">
                                                                        <div class="modal-dialog modal-lg"> 
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    
                                                                                        <h4 class="modal-title">Terms & conditions</h4>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                    <p class="lead text-danger font-weight-bolder font-weight-lighter ml-2 mt-3 text-left">
                                                                                        *** Once you place an order you can not cancel your order ... 
                                                                                        <hr>
                                                                                    </p>
                                                                                    <p class="lead text-danger font-weight-bolder font-weight-lighter ml-2 text-left mt-3">
                                                                                        *** You have to pay extra 20 taka for delivery charge when delivery man arrived. 
                                                                                    <hr>
                                                                                    </p>
                                                                                    <p class="lead text-danger font-weight-bolder font-weight-lighter ml-2 text-left mt-3">
                                                                                        *** When you place an order ,an order code will generate automatically.Share your order code with our delivery-man. 
                                                                                    <hr>
                                                                                    </p>
                                                                                    <p class="lead text-danger font-weight-bolder font-weight-lighter ml-2 text-left mt-3">
                                                                                        *** Within 30 minutes our food will be delivered to you by our delivery man.You have to receive phone-call from our delivery-man. 
                                                                                    <hr>
                                                                                    </p>
                                                                                    <p class="lead text-danger font-weight-bolder font-weight-lighter ml-2 text-left mt-3">
                                                                                        *** If you return our product without any reason
                                                                                        we are sorry to say you that, "You will be baned from our site permanent" . 
                                                                                    
                                                                                    </p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-success" data-dismiss="modal">ok</button>
                                                                                    </div>
                                                                                </div>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                         </div>
                                                                     
                                                            
                                                            
                                                            <hr>
                                                        
                                        



                                        <?php //quantity update kortesi....
                                                                if(isset($_POST['change'])){
                                                                    $id =$_POST['id'] ;
                                                                    $price =$_POST['item_price'] ;
                                                                    $quantityy =$_POST['quantityy'] ;

                                                                    $total =$price * $quantityy;
                                                                    $change_q ="UPDATE order_list set quantity ='$quantityy',total_price='$total' WHERE order_id=$id " ;
                                                                    $admin =mysqli_query($connect,$change_q);
                                                                    header("Location: ./cart.php");
                                                                    
                                                                }
                                                                
                                                                
                                                            }  
                                                            else{ ?>


                                                                    <h2 class="text-center mt-3 text-monospace">NO item on the cart
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        
                                                                        <hr>
                                                                    </h2>



                                                                
                                                    <?php    }    } ?>





                                                    
                                                            
                                                            
                                                            
                                                            




                                    
                                    

                                    

                                                            </div>
                                                            <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                

                        
                                            
                                           
                                            
                            </div>  
                            <br>
                            



                        </div>
                        <br>
                        <br>
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->
            

    </div>





  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>



            