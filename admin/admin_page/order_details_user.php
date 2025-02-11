<?php 
ob_start();

if(isset($_GET['order_code'])){
    $order_code = $_GET['order_code'] ;
    $rules ="SELECT * FROM confirm_order WHERE   order_code='$order_code'";
    $new =mysqli_query($connect,$rules) ; 
    while($views=mysqli_fetch_assoc($new)){
        $confirm_id =  $views['confirm_order_id'];  
        $order_date=$views['order_date'];
        $delivery_man_id=$views['delivery_man_id'];
        $order_time=$views['order_time'];
        $status=$views['order_status']  ;
        $user_id =$views['user_id'] ;
        $order_processed_by=$views['order_processed_by'];
        $delivered_time =$views['delivered_time'] ;

        if($status=='sent'){
            $status='pending';
        }
        if($status=='Received'){
            $status='Received & processing';
        }
        if($_SESSION['user_role'] == 'customer'){
        if($status == 'placed_successfully'){
            
            $status ='delivered';
            }
           }

        
         
        
        
    

     $rule ="SELECT * FROM `order_list` WHERE  order_code='$order_code' ";
     $nnews =mysqli_query($connect,$rule) ;?>



                                    
                                    <?php  //experiment ...
                                  //  $address=" #H-".$_SESSION['house_no'].", " .$_SESSION['street']."," .$_SESSION['city']."."  ;
                                  //  echo $address; ?>

                                


<div class="container-fluid card border bg-light mr-5 pr-5">
    
        <div class="card-header bg-light">
     <?php   if($status =='delivered' || $status == 'placed_successfully' || $_SESSION['user_role'] =='admin' || $_SESSION['user_role'] =='moderator'): ?>
                    
        <div> 
            <p class="text-right"><a class="btn btn-success" target="_blank" href="./money_receipt.php?order_code=<?php echo $order_code ; ?>">print</a></p>
        </div> 

        <?php endif ; ?>
        
            <div class="row">
                <hr>
                <div class="col-lg-12 mt-1">
                <?php 
                           if($status =='delivered' || $_SESSION['user_role'] !=='admin' || $_SESSION['user_role'] =='moderator'): ?>
                    
                    <p class="text-center text-sm" style="font-size: xx-small">বিসমিল্লাহির রাহমানির রাহিম</p>
                    
                    <h3 class="font-italic text-monospace text-center">RT Food Delivery</h3>
                    <p class="text-center"><small class="justify-content-center">163, Malibagh Bazar Road,Dhaka-1217</small></p>
                    <p class="text-center"><small >Cell 01724117757 ,01778700365</small></p>

                                <?php endif; ?>

                    <?php 
                           if($status =='delivered' || $status == 'placed_successfully' || $_SESSION['user_role'] =='admin' || $_SESSION['user_role'] =='moderator'): ?>
                    
                    

                    <p class="text-center">( Money Receipt )</p>
                    <?php endif; ?>
                    <hr>
                </div>
            
            </div>
            <?php 
                            if(($status =='Received & processing' || $status =='ON_THE_WAY') &&  $_SESSION['user_role'] =='customer'): ?>

                            <p class="text-center mt-2 text-danger text-monospace">Please be sure to tell the delivery man your order code when he comes to deliver the order to you</p>
                            <hr>
                            <?php endif; ?>
                                                                
        
            <div class="row">
                <div class="col-lg-4">


            <?php    if($status =='delivered'  ||  $_SESSION['user_role'] =='admin'  || $_SESSION['user_role'] =='moderator'): ?>

                    <p class="text-left ml-5 pl-5">Bill No. : <samp><?php echo $confirm_id ;?></p></samp>


                    <?php endif; ?>

                    <p class="text-left ml-5 pl-5"><small>Date:<?php echo $order_date ." ".$order_time; ?></small></p>
                    <p class="text-left ml-5 pl-5"> Order Code : <b class="font-weight-bolder" style="font-size: 14px">  <?php echo $order_code ;?></b></p>

                    <?php 
                    
                    $ll="SELECT * FROM users WHERE user_id='$user_id'";
                                 $kk=connection($ll);

                                while($jj=mysqli_fetch_assoc($kk)){
                                $username =$jj['username'];
                                $c_mobile_number =$jj['mobile_number'];
                                $MAIL=$jj['email'];
                                $house =$jj['house_no'];
                                 $street =$jj['street'];
                                $city =$jj['city'];
                                $addresses = $house . ",". $street . ", ".$city ; ?>

                            <p class="text-left ml-5 pl-5">Customer Name :<samp><?php echo $username ; ?></samp></p>

                             <?php   } ?>

                    





                    <p class="text-left ml-5 pl-5">Email :<samp><?php echo $MAIL; ?></samp></p>
                    <p class="text-left ml-5 pl-5">Cell :<samp><?php echo " 0".$c_mobile_number; ?></samp></p>
                    <p class="text-left ml-5 pl-5">Address :<samp><?php echo " ".$addresses ; ?></samp></p>

                </div>
                <div class="col-lg-4 container-fluid display-5">
                    <p class="text-center">Order Status </p>
                    <h5 class="text-center  "><button class="btn-success text-warning font-weight-bolder"><samp><?php echo $status; ?></samp></button></h5>
                </div> 


               <?php if(($status == 'ON_THE_WAY' || $status == 'placed_successfully'  || $status == 'delivered') || $_SESSION['user_role'] =='customer' ||  $_SESSION['user_role'] =='admin'  || $_SESSION['user_role'] =='moderator'){  ?>
            
      
                <div class="col-lg-4">
                     <?php   $delivery="SELECT * FROM users WHERE user_id='$delivery_man_id'";
                     $ok=connection($delivery);
                     while($details=mysqli_fetch_assoc($ok)){
                        $d_man_name=$details['username'];
                        $d_man_email=$details['email'];
                        $d_man_mobile_number=$details['mobile_number']
                     ?>
                    
                    <p class="text-right mr-5 pr-5">Delivery-Man Name :<samp><?php echo $d_man_name; ?></samp></p>
                    <p class="text-right mr-5 pr-5">Email :<samp><?php echo $d_man_email; ?></samp></p>
                    <p class="text-right mr-5 pr-5">Cell :<samp>0<?php echo $d_man_mobile_number;?></samp></p>
                

                            <?php } }
                            if(( $status == 'delivered')){ 
                                $process_by="SELECT * FROM users WHERE user_id='$order_processed_by'";
                                $okkk=connection($process_by);
                                while($_doone=mysqli_fetch_assoc($okkk)){
                                   $Process_man_name=$_doone['username'];
                                   $Process_man_email=$_doone['email'];
                                   $role=$_doone['user_role'];
                                   $Process_man_mobile_number=$_doone['mobile_number'] ;
                                ?>
                            <br>
                            <p class="text-right mr-5 pr-5">Order Completed By :<samp><?php echo $Process_man_name ." (".$role.") "; ?></samp></p>
                            <p class="text-right mr-5 pr-5">Email :<samp><?php echo $Process_man_email; ?></samp></p>
                            <p class="text-right mr-5 pr-5">Time:<samp><?php echo $delivered_time; ?></samp></p>
                               
                        <?php } } ?>
                </div>
            </div>
        </div>
            <hr>


        <?php // 2nd if er order code er while sesh hoilo sesh hoilo --> 
            }?>

            
            
                                <div class="card-body bg-light">                        
                                                
                                            <div class="">
                                                <h4 class="font-italic font-weight-bolder text-monospace text-center ">Ordered Items
                                                    
                                                </h4>
                                                <br>
                                                <hr>
                                                        <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                <tr class="text-dark">
                                                                <th>Item Name</th>
                                                                
                                                                <th>Quantity</th>
                                                                <th>Sub Total Price</th>
                                                                <th class="text-right">Total Price</th>
                                                                </tr>
                                                                <tbody><samp> 

                                                                <?php 
                                                                
                                                            
                                                    
                                                                while($view=mysqli_fetch_assoc($nnews)){
                                                                    $order_id =  $view['order_id'];     
                                                                    $item_name =  $view['ordered_item_name'];
                                                                    
                                                                    $ordered_item_price =  $view['ordered_item_price'];
                                                                    $Quantity =  $view['quantity'];
                                                                    $Total_price =  $view['total_price'];
                                                                
                                                
                                                                

                                                                echo "<tr class=' border-bottom-3'>" ;
                                                            
                                                                echo "<td class='mt-3 pt-3'>{$item_name}</td>";
                                                                echo "<td class='mt-3 pt-3'>{$Quantity}</td>";
                                                                echo "<td class='mt-3 pt-3 '>{$Total_price}</td>"; ?>

                                                                

                                                                    





                                    
                                                            
                                                                
                                                                </tr> 


                                                                
                                                                <?php         } ?> 
                                                                
                                                                
                                                            
                                                                
                                                                </tbody>
                                                               

                                                                
                                                        
                                                                
                                                    </table>


                                                    
                                                    
                                                    <?php 
                                                                $queryyy = "SELECT SUM(total_price) AS total_money FROM order_list WHERE order_code='$order_code'";
                                                                    $M =mysqli_query($connect,$queryyy);
                                                                    while ($values=mysqli_fetch_assoc($M)) {
                                                                        $total_money = $values['total_money'];
                                                                        
                                                                    }
                                                            ?>
                                                                <hr>
                                                                <div class="row pt-auto">
                                                                    <div class="col-lg-10">
                                                    
                                                                            
                                                                    <br>
                                                                                                    <p  class="text-right mt-3 pt-1 ml-3 pl-3">Delivery charge: </p>
                                                                                                    <p  class="text-right mt-3 pt-1 ml-3 pl-3">Amount to pay: </p>

                                                                                                </div>
                                                                                                <div class="col-lg-2">
                                                                                                    <p  class="text-right mr-3 pr-3"><samp class=" font-weight-bolder"><b><?php echo " ".$total_money; ?></b></samp> <small>taka</small> </p>
                                                                                                    <p  class="text-right mr-3 pr-3"> + <samp class=" font-weight-bolder"> <b>20</b> </samp> <small>taka</small> </p><hr>
                                                                                                    <p  class="text-right mr-3 pr-3"><samp class=" font-weight-bolder"><b><?php echo " ".$total_money +20; ?></b></samp> <small>taka</small> 

                                                                                                    <?php 
                                                                                                              if(($status == 'placed_successfully'  || $status == 'delivered')){  ?>
            
                                                                                                               <br> <b class="text-right ml-5" >( paid )</b>
                                                                                                            
                                                                                                            <?php } ?>


                                                                                                </p>
                                                                                                

                                                                                                    
                                                                    </div>
                                                                    <br>***Payment-method :Cash On Delivery 
                                                                    </samp>
                                                                    

                                                                    
                                                                    
                                                                </div>
                                                                <?php if($_SESSION['user_role'] == 'customer') :?>
                                                                <hr>
                                                                <p class="text-center mt-2 text-monospace">Thanks for ordering!</p>

                                                                <?php endif; ?>
                                                               
                                                                        </div>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                 <br>
                                                                 <br>
                                                                 <br>
                                                                 <br>
                                                                 

                                                                        
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-lg-4 mt-4 pt-4 mb-3"><br>
                                                                    <a class="btn" href="../help.php"><i class="fa fa-info-circle" aria-hidden="true"> </i> help?</a>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <p class="text-center mt-5"><b>
                                                                            RT Food Delivery
                                                                        </b><br>
                                                                        Cell: 01724117757 & 01778700365
                                                                    </p>
                                                                    </div>    
                                                                    <div class="col-lg-4 mb-2 mt-5">
                                                                        <p  class="text-right text-monospace mt-3"><a class="text-primary btn text-right" data-toggle="modal" data-target="#myModal"> <i class="fa-solid fa-triangle-exclamation"></i>terms & conditions</a></p>

                                                                            
                                                                            <div class="modal fade" id="myModal" role="dialog">
                                                                                <div class="modal-dialog modal-lg"> 
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                            
                                                                                                <h4 class="modal-title">Terms & conditions</h4>
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                    
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
                                                                </div>
                                                                
                                                



                                                        


                                                                        





                                                            
                                                                    
                                                                    
                                                                    
                                                                    




                                            
                                            

                                            

                                                </div>


        </div>
    </div>    

<?php }?>
