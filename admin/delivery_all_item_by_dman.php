<?php header("Refresh: 20"); ?>

<?php ob_start(); ?>

<?php // header("Refresh: 8"); ?>




<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    


    <?php 
?>











    <div id="wrapper" class="background ">
       

        

  

        <!-- Navigation -->
 
       
        
        
    

        <div id="page-wrapper" class="background">
                <?php include "./admin_page/navigation.php" ?>

                <div class="container-fluid  background">
                    

                        <!-- Page Heading -->
                        <div class="row bg-transparent">
                            <div class="col-lg-12 card bg-transparent">

                                   
                                            <div class="card container-fluid bg-transparent">
                                                                                <ol class="breadcrumb pl-auto bg-transparent mt-3">
                                                                                    <li><a class="text-dark" href="./index.php"><i class="fab fa-ubuntu"> System</i></a></li>
                                                                                    <li><a class="text-dark" href="./delivery_all_item_by_dman.php"><i class="fa-solid fa-truck-ramp-box"> <small> Total Delivered Orders</small></i> </a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            

                                                    <?php 
                                                        
                                                   
                                                                $rules ="SELECT * FROM confirm_order WHERE  order_status='placed_successfully' OR order_status='delivered'  AND delivery_man_id='".$_SESSION['user_id']."'";
                                                                
                                                                
                                                                $news =mysqli_query($connect,$rules) ;
                                                                $c=mysqli_num_rows($news);
                                                                if($c<1){?>

                                                                    <div class="card bg-transparent">
                                                                        <h2 class="card-header text-center text-monospace">No task found

                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br><br>
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
                                                                                <br><br>
                                                                                <br>
                                                                                
                                                                                
                                                                    
                                                                                

                                                                                <hr>
                                                                        </h2>
                                                                    </div>




                                                            
                                                                    <?php  }
                                                                    else{ ?>
                                                                         
                                                  
                                                        <div class="container-fluid card-body border bg-transparent"> 
                                                                    <h5 class="text-center">Total Completed Task (<?php echo  $total_delivered_order_by_d_man ; ?>)</h5>          
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                            
                                                                        <tr class="text-dark">
                                                                        
                                                                        <th>Sl no.</th>
                                                                        <th>Bill no.</th>
                                                                        <th>Customer Name</th>
                                                                        <th>Mobile Number</th>
                                                                        
                                                                       
                                                                        <th>Customer Address</th>
                                                                        <th>Ordered Status</th>
                                                                        <th>Date</th>

                                                                        
                                                                        
                                                                        
                                                                        
                                                                        </tr>
                                                                        <tbody>



                                                                    <?php   
                                                                            $sl_no= 0 ;
                                                                            while($view=mysqli_fetch_assoc($news)){
                                                                            $confirm_order_id =  $view['confirm_order_id'];
                                                                                
                                                                            $order_code =  $view['order_code'];
                                                                            $delivery_man_id =  $view['delivery_man_id'];
                                                                            
                                                                            $order_status =  $view['order_status'];
                                                                            $userr_id =  $view['user_id'];
                                                                            $date =  $view['order_date'];

                                                                            $ll="SELECT * FROM users WHERE user_id='$userr_id'";
                                                                            $kk=connection($ll);

                                                                            while($jj=mysqli_fetch_assoc($kk)){
                                                                                $username =$jj['username'];
                                                                                $mobile_number =$jj['mobile_number'];
                                                                                $house =$jj['house_no'];
                                                                                $street =$jj['street'];
                                                                                $city =$jj['city'];
                                                                                $address = $house . ",". $street . ", ".$city ;

                                                                                $sl_no ++ ;


                                                                            }
                                                                                            
                                                                            
                                                                        
                                                        
                                                                        

                                                                        echo "<tr>" ;
                                                                            
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$sl_no}</button></td>";
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$confirm_order_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$username}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>0{$mobile_number}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 20px'><button class='btn btn-lg'>$address</button></td>";  
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 20px'><button class='btn btn-lg'>$order_status</button></td>";  
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 20px'><button class='btn btn-lg'>$date</button></td>";  
                                                                       
                                                                       ?>
                                                                         
                                                                            
                                                                        
                                                                         

                                                                             
                                                                             
                                                                             
                                                                   






                                            
                                                                    
                                                                        
                                                                        </tr>

                                                                        
                                                                                <?php      } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
                                                                        </tbody><hr>
                                                                        
                                                                       
                                                                        
                                                                        
                                                                        
                                                                            </table>
                                                                                <?php  } ?> 
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br><br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br><br>
                                                                                
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br><br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br><br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <hr>
                                    </div>  
                                                                      

         
                                


                                

                        
                                            
                                           
                                            
                            </div>        


                        </div>
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->
  



    </div>






  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>
