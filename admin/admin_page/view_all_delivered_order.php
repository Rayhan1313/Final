
<div class="card container-fluid bg-light">
                                    <ol class="breadcrumb pl-auto bg-light mt-3">
                                        <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                                        <li><a class="text-dark" href="./view_all_delivered_order.php"><i class="fas fa-hat-cowboy"></i> <small>Current Order</small></a></li>

                                    </ol>
</div>
                                <br>
                                <br>

                                <?php 
                                                        
                                                    
                                                        $rules ="SELECT * FROM confirm_order WHERE  user_id='".$_SESSION['user_id']."'  ";
                                                        $rules.="AND order_status='Delivered'";
                                                        
                                                        $news =mysqli_query($connect,$rules) ;
                                                        $c=mysqli_num_rows($news);
                                                        if($c<1){?>

                                                            <div class="card">
                                                                <h4 class="card-header">0. You have not ordered any item yet.</h4>
                                                            </div>




                                                            
                                                      <?php  }
                                                      else{?>
                                                      <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                        <tr class="text-dark">
                                                        
                                                        
                                                        <th>Order Code</th>
                                                        <th>Order Status</th>
                                                        <th>View Ordered Item List</th>
                                                        
                                                        </tr>
                                                        <tbody>



                                                     <?php   while($view=mysqli_fetch_assoc($news)){
                                                                 
                                                            $order_code =  $view['order_code'];
                                                            
                                                            $order_status =  $view['order_status'];

                                                           // if ($order_status=='confirmed'){
                                                              //  $order_status='Received BY Admin';
                                                          //  }
                                                            
                                                        
                                        
                                                        

                                                        echo "<tr>" ;
                                                    
                                                        
                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$order_code}</button></td>"; 
                                                        echo "<td class='text-left'><a class='mt-1 btn text-warning btn-light pt-2 href=''>{$order_status}</a></td>"; ?>

                                                            <?php echo "<td><a  class='btn btn-warning mt-1 mb-2' href='total_delivered_order.php?source=view_details&order_code={$order_code}'>View ordered details</a></td>";

                                                                ?>







                            
                                                    
                                                        
                                                        </tr>

                                                        
                                                                <?php      }   } ?> 
                                                        
                                                        
                                                       
                                                        
                                                        </tbody>
                                                        
                                                        
                                        </table>                                

