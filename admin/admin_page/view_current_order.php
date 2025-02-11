
<div class="card container-fluid  bg-transparent">
                                   

                                <?php 
                                                        
                                                    
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='sent'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        header("Refresh: 30");
                                                        if($c<1){?>

<?php  






                                                                        
                                                





                                                                        
                                                                        ?> 

                                                            
                                                                <h2 class="text-monospace">Currently you have no order on pending .
                                                                    <?php
                                                                        $wait ="SELECT  * FROM `confirm_order` WHERE  order_status='Received'  AND user_id='".$_SESSION['user_id']."'";
                                                                        $connect_koriiii = connection($wait);
                                                                        $ordered_item_by_customer_active_receive_countt= mysqli_num_rows($connect_koriiii); 
                                                                        $waitt ="SELECT  * FROM `confirm_order` WHERE  order_status='ON_THE_WAY'  AND user_id='".$_SESSION['user_id']."'";
                                                                        $connect_ko = connection($waitt);
                                                                        $ordered_item_by_customer_active_ON_WAY_countt= mysqli_num_rows($connect_ko); 
                                                                        $ordered_item_by_customer_active_countt= $ordered_item_by_customer_active_receive_countt +  $ordered_item_by_customer_active_ON_WAY_countt;
                                                            
                                                                        
                                                                        if($ordered_item_by_customer_active_countt >0){
                                                                            echo "but you have"." ". $ordered_item_by_customer_active_countt." " ."active orders. <a href='./active_order.php'>click here</a> to view that order";
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
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <hr>
                                                               </h2>
                                                           




                                                            
                                                      <?php  }
                                                      else { ?>
                                                       
                                                    <h5 class="text-center">Pending Orders</h5>    
                                                        
                                                      
                                                      <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                        <tr class="text-dark">
                                                        
                                                        
                                                        <th>Order Code</th>
                                                        <th>Order Status</th>
                                                        <th>View Order Details</th>
                                                        
                                                        </tr>
                                                        <tbody>



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            $confirm_order_id=$view['confirm_order_id'];
                                                            
                                                            $order_status =  $view['order_status'];

                                                            if($order_status=='sent'){
                                                                $order_status='pending';
                                                            }
                                                            
                                                        
                                        
                                                        

                                                        echo "<tr>" ;
                                                    
                                                        
                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$order_code}</button></td>"; 
                                                        echo "<td class='text-left'><a class='mt-1 btn text-warning btn-lg btn-light pt-2 href=''>{$order_status}</a></td>"; ?>

                                                            <td class=''>
                                                            <div class="row">
                                                                
                                                                
                                                                
                                                               
                                                                
                                                                        
                                                                    
                                                                    
                                                                        <p  class="btn  d-flex justify-content-center text-monospace"><a  class="text-primary btn btn-lg  btn-warning text-monospace" data-toggle="modal" data-target="#myModal">View</a></p>

                                                                        
                                                                        <div class="modal fade" id="myModal" role="dialog">
                                                                            <div class="modal-dialog modal-lg"> 
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                        
                                                                                            <h4 class="modal-title">Order Details</h4>
                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <?php 
                                                                                            $rule ="SELECT * FROM `order_list` WHERE  order_code='$order_code' ";
                                                                                            $nnews =mysqli_query($connect,$rule) ;?>
                                                                                                <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                                                        <tr class="text-dark">
                                                                                                        <th>Item Name</th>
                                                                                                        
                                                                                                        <th>Quantity</th>
                                                                                                        <th>Sub Total Price</th>
                                                                                                        <th class="text-center">Total Price</th>
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
                                                                                                    <p  class="text-right mt-3 pt-1 ">Delivery charge: </p>
                                                                                                    <p  class="text-right mt-3 pt-3 ">Amount to pay: </p>

                                                                                                </div>
                                                                                                <div class="col-lg-2">
                                                                                                    <p  class="text-right mr-5 pr-5"><samp class=" font-weight-bolder"><b><?php echo " ".$total_money; ?></b></samp> <small>taka</small> </p>
                                                                                                    <p  class="text-right mr-5 pr-5">+ <samp class=" font-weight-bolder mt-2"> <b>20</b></samp> <small>taka</small> </p><hr>
                                                                                                    <p  class="text-right mr-5 pr-5"><samp class=" font-weight-bolder"><b><?php echo " ".$total_money +20; ?></b></samp> <small>taka</small> </p>

                                                                                                    
                                                                                                </div>
                                                                                                </samp>
                                                                                                

                                                                
                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">ok</button>
                                                                                        </div>
                                                                                    </div>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                            </td>







                            
                                                    
                                                        
                                                        </tr>

                                                        
                                                                <?php      } ?>

                                                                
                                                        
                                                        
                                                       
                                                        
                                                        </tbody>
                                                        <hr>
                                                         
                                                        
                                                        
                                        </table> <hr>    
                                        <samp><p class="text-center mr-5 pr-5 text-monospace" height="720px" width="1280px">your order  in pending needs admin approval.Stay updated with us  you will notify within 2 minutes<br>
                                        <img class="bg-transparent" src="../order_gif_images/pending.gif">
                                        </p></samp>
                                                            <?php  } ?> 
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            
                                                                        
</div>