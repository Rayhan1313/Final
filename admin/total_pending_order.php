<?php ob_start(); ?>

<?php header("Refresh: 25"); ?>




<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;



?>
    


    <?php //if(!check_admin($_SESSION['username'])){
   //         header("Location: ./index.php"); 
    //    }
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
                                                                                    <li><a class="text-dark" href="./total_pending_order.php"><i class="fa-solid fa-hourglass-start"> <small> Total Pending Orders</small> </i>   </a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            

                                                    <?php 
                                                        if(!isset($_GET['source'])){
                                                    
                                                                $rules ="SELECT * FROM confirm_order WHERE  order_status='sent'  ";
                                                                
                                                                
                                                                $news =mysqli_query($connect,$rules) ;
                                                                $c=mysqli_num_rows($news);
                                                                if($c<1){?>

                                                                    <div class="card bg-transparent">
                                                                        <h2 class="card-header text-monospace">No pending order found

                                                                        <?php
                                                                        $wait ="SELECT  * FROM `confirm_order` WHERE  order_status='Received' OR order_status='ON_THE_WAY'";
                                                                        $connect_koriiii = connection($wait);
                                                                      
                                                                        $ordered_item_by_customer_active_received_ON_WAY_countt= mysqli_num_rows($connect_koriiii); 
                                                                        
                                                            
                                                                        
                                                                        if($ordered_item_by_customer_active_received_ON_WAY_countt >0){
                                                                            echo "but total "." ". $ordered_item_by_customer_active_received_ON_WAY_countt." " ."active orders found. <a href='./total_active_order.php'>click here</a> to view those order";
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
                                                                    <hr>

                                                                        </h2>
                                                                    </div>




                                                            
                                                                    <?php  }
                                                                    else{?>
                                                                    <div class="container-fluid card-body border bg-transparent"> 
                                                                    <h5 class="text-center">Pending Orders</h5>          
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                        <tr class="text-dark">
                                                                        
                                                                        <th>Sl no.</th>
                                                                        <th>Order Id</th>
                                                                        <th>Customer Id</th>
                                                                        <th>Customer Name</th>
                                                                        <th>Order Code</th>

                                                                        <th>Order Status</th>
                                                                        <th>View Ordered items</th>
                                                                        <th>Accept Order</th>
                                                                        
                                                                        </tr>
                                                                        <tbody>



                                                                    <?php   $count=1 ;
                                                                        while($view=mysqli_fetch_assoc($news)){
                                                                            $confirm_order_id =  $view['confirm_order_id'];
                                                                                
                                                                            $order_code =  $view['order_code'];
                                                                            $delivery_man_id =  $view['delivery_man_id'];
                                                                            
                                                                            $order_status =  $view['order_status'];
                                                                            $userr_id =  $view['user_id'];

                                                                            if($order_status=='sent'){
                                                                                $order_status='pending';
                                                                            }
                                                                            
                                                                            
                                                                           
                                                                            

                                                                            $ll="SELECT * FROM users WHERE user_id='$userr_id'";
                                                                            $kk=connection($ll);

                                                                            while($jj=mysqli_fetch_assoc($kk)){
                                                                                $username =$jj['username'];

                                                                            }

                                                                            
                                                                        
                                                        
                                                                        

                                                                        echo "<tr>" ;
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$count}</button></td>"; 
                                                                        
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$confirm_order_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$userr_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>$username</button></td>";  
                                                                        
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$order_code}</button></td>"; 
                                                                        echo "<td class='text-left mt-5'><a class='mt-3 btn btn-lg text-warning btn-light pt-2 href=''>{$order_status}</a></td>"; ?>
                                                                         <?php echo "<td><a  class='btn btn-warning mt-3 btn-lg mb-2' href='./total_pending_order.php?source=view_details&order_code={$order_code}'><i class='fa-solid fa-eye'> </i> View</a></td>"; 
                                                                        echo "<td class='mt-2'><a  class='btn btn-success btn-lg  mt-3 ' href='total_pending_order.php?accept={$confirm_order_id}'>accept <i class='fa-solid fa-square-check'> </i> </a></td>";

                                                                             
                                                                             
                                                                             
                                                                             
                                                                         if(isset($_GET['accept'])){
                                                                            $id =$_GET['accept'] ;
                                                                            $gg="SELECT * FROM confirm_order WHERE confirm_order_id= '$confirm_order_id'";
                                                                            $ggg=connection($gg);
                                                                            while($rr=mysqli_fetch_assoc($ggg)){
                                                                                $order_codeta=$rr['order_code'];
                                                                            }

                                                                            /* change kore koto taka database a pathaytasi */
                                                                            $kota_takar_bazar = "SELECT SUM(total_price) AS total_money FROM order_list WHERE order_code='$order_codeta'";
                                                                            $data_database_adeei =mysqli_query($connect,$kota_takar_bazar);
                                                                            while ($ber_kori_data=mysqli_fetch_assoc($data_database_adeei)) {
                                                                                $total_money_tahle_koto_hoilo = $ber_kori_data['total_money'];
                                                                                $total_money_tahle_koto_hoilo_tahle= $total_money_tahle_koto_hoilo +20 ;
                                                                
                                                                                }
        
                                                                            
                                                                            $change_q ="UPDATE confirm_order set order_status ='Received',total_money='$total_money_tahle_koto_hoilo_tahle' WHERE confirm_order_id='$id'" ;
                                                                            $admin =mysqli_query($connect,$change_q);
                                                                            $change_orderer_ta ="UPDATE order_list set order_status ='Received' WHERE order_code='$order_codeta'" ;
                                                                            $order_list_status_chng =mysqli_query($connect,$change_orderer_ta);
                                                                            header("Location: ./total_pending_order.php");
                                                                            
                                                                        }?>







                                            
                                                                    
                                                                        
                                                                        </tr>

                                                                        
                                                                                <?php   $count++ ;   } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
                                                                        </tbody>
                                                                        <hr>
                                                                        
                                                                        
                                                                        
                                                                            </table>
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
                                                                    <br><br><br><br><br>
                                                                    <hr>
                                                                                <?php  } ?> 
                                    </div>      
                                    <?php } 
                                    else{
                                        $source = $_GET['source'] ;
                                    
                                
                                    switch($source){
                                        case 'view_details' ;
                                        include "./admin_page/order_details_user.php";
                                        break ;


                                    

                                        default ;
                                        include "./total_pending_order.php" ;
                                    }
                                    } ?>                                 

         
                                


                              <br>
                              <br>
                              <br>


                        
                                            
                                           
                                            
                            </div>    
                            <br>
                              <br>
                              <br>    


                        </div>
                        
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->
     



    </div>






  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>
