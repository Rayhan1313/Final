<?php header("Refresh: 30"); ?>

                                    
<br>

                                <?php 
                                                        
                                                    
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='Received'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c>=1){
                                                            
                                                            ?>
                                                            
                                                            
                                                      <div class="container-fluid card-body bg-transparent border"> 
                                                    <h5 class="text-center">Latest Active Orders (<?php echo $ordered_item_by_customer_active_receive_countt; ?>)</h5>          
                                                      
                                                      <table class="table table-hover border-bottom-3 table-borderless  bg-transparent">
                                                        <tr class="text-dark">
                                                        
                                                        
                                                        <th>Order Code</th>
                                                        <th>Order Status</th>
                                                        <th>Order Date</th>
                                                        <th>View Order Details</th>
                                                        
                                                        </tr>
                                                        <tbody>



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            
                                                            $order_status =  $view['order_status'];
                                                            $order_date =  $view['order_date'];
                                                            $order_time =  $view['order_time'];

                                                           $date=$order_date. " " .$order_time ;

                                                            if($order_status=='Received'){
                                                                $order_status='Received & Processing';
                                                            }
                                                            
                                                        
                                        
                                                        

                                                        echo "<tr>" ;
                                                    
                                                        
                                                        echo "<td class='mt-3 pt-3 font-weight-bolder btn-lg  text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$order_code}</button></td>"; 
                                                        echo "<td class='text-left'><a class='mt-1 btn text-warning btn-lg  btn-light pt-2 href=''>{$order_status}</a></td>"; 
                                                        echo "<td class='text-left'><a class='mt-1 btn text-warning  btn-light pt-2 href=''>{$date}</a></td>"; ?>

                                                            <?php echo "<td><a  class='btn btn-lg btn-warning mt-1 mb-2' href='./active_order.php?source=view_details&order_code={$order_code}'><i class='fa-solid fa-eye'> </i> View</a></td>";

                                                                ?>







                            
                                                    
                                                        
                                                        </tr>

                                                        
                                                                <?php      } ?>

                                                                
                                                        
                                                        
                                                       
                                                        
                                                        </tbody>
                                                        <hr>
                                                         
                                                        
                                                        
                                        </table> <hr>    
                                        <samp><p class="text-center mr-5 pr-5 text-monospace" height="720px" width="1280px">your order  successfully received by us .Stay updated with us here  for knowing your further order status <br>
                                        <img class="bg-transparent mt-3 pt-3 mb-" src="../order_gif_images/p2.gif">
                                        </p></samp>
                                                            
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            
                                                            
                                                            <?php
                                                                                                      
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='Placed_successfully'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c>=1){
                                                            
                                                            ?> <br>
                                                            <br>
                                                            <br>
                                                            <hr>
                                                      
                                                    



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            
                                                            $order_status =  $view['order_status'];
                                                            $order_date =  $view['order_date'];
                                                            $order_time =  $view['order_time'];

                                                           $date=$order_date. " " .$order_time ;
                                                         
                                                         ?>

                                                         <h5 class="text-monospace mb-3">Your last order was successfully delivered.<a  class='btn btn-sm  mt-1 mb-2' href='./active_order.php?source=view_details&order_code=<?php echo $order_code;  ?>'>View ordered details</a></h5>

                                                               







                            
                                                    
                                                        
                                                      

                                                        
                                                                <?php      } ?>
                                                                <br>
                                                                <br>
                                                                


                                                                
                                                        
                                                        
                                                       
                                                        
                                                       
                                                       
                                                         
                                                        
                                                        
                                           
                                       
                                                            <?php  } ?> 


                                    </div>                                     

<?php  } ?> 
                                              
                                                                                  

                                                                              

                                <?php 
                                                        
                                                    
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='ON_THE_WAY'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c>=1){
                                                            
                                                            ?>
                                                            
                                                      <div class="container-fluid card-body border bg-transparent"> 
                                                    <h5 class="text-center">Active Orders (<?php echo $ordered_item_by_customer_active_ON_WAY_countt;?>)</h5>          
                                                      
                                                      <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                        <tr class="text-dark">
                                                        
                                                        
                                                        <th>Order Code</th>
                                                        <th>Order Status</th>
                                                        <th>Order Date</th>
                                                        <th>View Order Details</th>
                                                        
                                                        </tr>
                                                        <tbody>



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            
                                                            $order_status =  $view['order_status'];
                                                            $order_date =  $view['order_date'];
                                                            $order_time =  $view['order_time'];

                                                           $date=$order_date. " " .$order_time ;
                                                        
                                        
                                                        

                                                        echo "<tr>" ;
                                                    
                                                        
                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$order_code}</button></td>"; 
                                                        echo "<td class='text-left'><a class='mt-1 btn text-warning btn-light pt-2 href=''>{$order_status}</a></td>"; 
                                                        echo "<td class='text-left'><a class='mt-1 btn text-warning btn-light pt-2 href=''>{$date}</a></td>"; ?>

                                                            <?php echo "<td><a  class='btn btn-warning mt-1 mb-2' href='./active_order.php?source=view_details&order_code={$order_code}'><i class='fa-solid fa-eye'> </i> View</a></td>";

                                                                ?>







                            
                                                    
                                                        
                                                        </tr>

                                                        
                                                                <?php      } ?>

                                                                
                                                        
                                                        
                                                       
                                                        
                                                        </tbody>
                                                        <hr>
                                                         
                                                        
                                                        
                                        </table> <hr>    
                                        <samp><p class="text-center mr-5 pr-5 text-monospace" height="720px" width="1280px">your order  is too near from you .Delivery-man contact with you too soon <br>
                                        <img class="bg-transparent mt-3 pt-3 mb-" src="../order_gif_images/d4up.gif">
                                        </p></samp>
                                        
                                       
                                        <?php
                                                                                                      
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='Placed_successfully'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c>=1){
                                                            
                                                            ?> <br>
                                                            
                                                            
                                                            <hr>
                                                      
                                                    



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            
                                                            $order_status =  $view['order_status'];
                                                            $order_date =  $view['order_date'];
                                                            $order_time =  $view['order_time'];

                                                           $date=$order_date. " " .$order_time ;
                                                         
                                                         ?>

                                                         <h5 class="text-monospace mb-3">Your last order was successfully delivered.<a  class='btn btn-sm  mt-1 mb-2' href='./active_order.php?source=view_details&order_code=<?php echo $order_code;  ?>'>View ordered details</a></h5>

                                                               







                            
                                                    
                                                        
                                                      

                                                        
                                                                <?php      } ?>
                                                                <br>
                                                                <br>
                                                               


                                                                
                                                        
                                                        
                                                       
                                                        
                                                       
                                                       
                                                         
                                                        
                                                        
                                           
                                       
                                                            <?php  } ?> 
                                                            
                                    </div>                                     

<?php  } ?> 











                                                                                  

                                                                              

                                <?php 
                                                        
                                                        
                                                        if($ordered_item_by_customer_active_countt <1 ){
                                                          ?>
                                                        









                                                              <div class="container-fluid card-body bg-transparent"> 
                                                                  

                                                             
                                                                      <h2 class="text-monospace">You have no active order found

                                                                      <?php 
                                                                      
                                                                      $ki ="SELECT * FROM `confirm_order` WHERE user_id='".$_SESSION['user_id']."' ";
                                                                      $ki.="AND order_status='sent'";
                                                                      $connect_korii = connection($ki);
                                                                      $ordered_item_by_customer_pending_countt= mysqli_num_rows($connect_korii); 
                                                                      if($ordered_item_by_customer_pending_countt >0 ){
                                                                        echo "but you have  ".$ordered_item_by_customer_pending_countt." order on pending <a href='./current_order_details.php'> click here</a> to see that order";
                                                                      }
                                                                      
                                                                      ?>
                                                                      
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
                                                                      

                                                                      
                                                                      </h2>

                                                                      <br>
                                                                      <br>
                                                                      <?php
                                                                                                      
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='Placed_successfully'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c>=1){
                                                            
                                                            ?> <br>
                                                            <br>
                                                            <br>
                                                            <hr>
                                                      
                                                    



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            
                                                            $order_status =  $view['order_status'];
                                                            $order_date =  $view['order_date'];
                                                            $order_time =  $view['order_time'];

                                                           $date=$order_date. " " .$order_time ;
                                                         
                                                         ?>

                                                         <h5 class="text-monospace mb-3">Your last order was successfully delivered.<a  class='btn btn-sm  mt-1 mb-2' href='./active_order.php?source=view_details&order_code=<?php echo $order_code;  ?>'>View ordered details</a></h5>

                                                               







                            
                                                    
                                                        
                                                      

                                                        
                                                                <?php      } ?>
                                                                
                                                                
                                                                


                                                                
                                                        
                                                        
                                                       
                                                        
                                                       
                                                       
                                                         
                                                        
                                                        
                                           
                                       
                                                            <?php  } ?> 
                                                                
                                                               

                                                
                                                            


                                                  



                                                            


                                                           
                                                                        

                              </div>

                        

                        <?php        } ?>












