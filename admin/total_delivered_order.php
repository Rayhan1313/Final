<?php ob_start(); ?>

<?php // header("Refresh: 22"); ?>




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
                                                                                    <li><a class="text-dark" href="./total_delivered_order.php"><i class="fa-solid fa-plate-wheat">    <small>Total Delivered Orders</small></i> </a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            <br>

                                                    <?php 
                                                        
                                                    if(!isset($_GET['source'])){
                                                               

                                                                         
                                                                $rul ="SELECT * FROM confirm_order WHERE  order_status='delivered' ORDER BY confirm_order_id ASC";
                                                                $iko =mysqli_query($connect,$rul) ;
                                                                $numberta=mysqli_num_rows($iko);
                                                                if($numberta > 0){?>
                                                                                <h5 class="text-center">Total Delivered Orders  (<?php echo $numberta ; ?>)</h5> 
                                                                                <div class="row">
                                                                                    <div class="card bg-transparent  col-lg-6">
                                                                                    
                                                                                            <div class="card-body ">
                                                                                            
                                                                                                <form action="total_delivered_order_search.php" method="GET" class="form ml-5 pl-5">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="form-group">
                                                                                                                <label>From Date</label>
                                                                                                                <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control"  required>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="form-group">
                                                                                                                <label>To Date</label>
                                                                                                                <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" required>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="form-group">
                                                                                                                <label>Click to Filter</label> <br>
                                                                                                            <button type="submit" class="btn btn-primary">Filter</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                    </div>  
                                                                                    <div class="card bg-transparent col-lg-6">
                                                                                    
                                                                                            <div class="card-body  mr-5">
                                                                                            
                                                                                                <form action="search_by_order_id.php" method="GET" class="form ml-5 pl-5">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="form-group">
                                                                                                                <label>Enter Order Code</label>
                                                                                                                <input type="text" name="order_code" value="<?php if(isset($_GET['order_code'])){ echo $_GET['order_code']; } ?>" class="form-control"  required>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="form-group">
                                                                                                                <label>Click to Filter</label> <br>
                                                                                                            <button type="submit" class="btn btn-primary">Find</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                    </div>  
                                                                                </div>     
                                                                             
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                        <tr class="text-dark">

                                                                       
                                                                        <th>Sl no.</th>
                                                                        <th>Order Id</th>
                                                                        <th>Customer Id</th>
                                                                        <th>Customer Name</th>
                                                                        <th>Order Code</th>
                                                                        <th>Price</th>
                                                                        <th>Order Status</th>
                                                                        <th>D. man ID</th>
                                                                        <th>D. man name</th>
                                                                        <th>Order Date</th>
                                                                        <th>Ordered details</th>
                                                                        
                                                                        
                                                                        </tr>
                                                                        <tbody>



                                                                    <?php   
                                                                            $counnt =1;
                                                                            while($okkty=mysqli_fetch_assoc($iko)){
                                                                            $cconfirm_order_id =  $okkty['confirm_order_id'];
                                                                                
                                                                            $oorder_code =  $okkty['order_code'];
                                                                            $ddelivery_man_id =  $okkty['delivery_man_id'];
                                                                            
                                                                            $oorder_status =  $okkty['order_status'];
                                                                            $uuserr_id =  $okkty['user_id'];
                                                                            $total_money =  $okkty['total_money'];
                                                                            $orderrr_date =  $okkty['order_date'];
                                                                         //   $delivered_time =  $okkty['delivered_time'];
                                                                            


                                                                            $lll="SELECT * FROM users WHERE user_id='$uuserr_id'";
                                                                            $kkk=connection($lll);

                                                                            while($jjj=mysqli_fetch_assoc($kkk)){
                                                                                $usernamee =$jjj['username'];

                                                                            }
                                                                                            
                                                                            
                                                                        
                                                        
                                                                        

                                                                        echo "<tr>" ;
                                                                            
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$counnt}</button></td>"; 
                                                                      
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$cconfirm_order_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$uuserr_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>$usernamee</button></td>";  
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$oorder_code}</button></td>"; 
                                                                        
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$total_money}</button></td>"; 
                                          
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2'>{$oorder_status}</a></td>";
                                                                        

                                                                        $dd="SELECT * FROM users WHERE user_id='$ddelivery_man_id'";
                                                                            $okkk=connection($dd);

                                                                            while($hmm=mysqli_fetch_assoc($okkk)){
                                                                                $d_man_name =$hmm['username'];

                                                                            }
                                                                            echo "<td class='text-left'><a class='mt-3 btn text-dark btn-lg btn-light pt-2'>{$ddelivery_man_id }</a></td>";


                                                                        echo "<td class='text-left'><a class='mt-3 btn text-dark btn-lg btn-light pt-2'>{$d_man_name }</a></td>";

                                                                        echo "<td class='text-left'><a class='mt-3 btn text-dark btn-lg btn-light pt-2'>{$orderrr_date }</a></td>";




                                                                        echo "<td class=' mt-5 pt-3'><a class='mt-3 btn btn-warning btn-lg' href='./total_delivered_order.php?source=view_details&order_code={$oorder_code}'><i class='fa-solid fa-eye'> </i> View</a></td>";
                                                                             
                                                                             
                                 
                                                                        echo "</tr>";

                                                                        ?>

                                                                        
                                                                                <?php $counnt ++ ;      } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
                                                                        </tbody>
                                                                        <hr>
                                                                        
                                                                        
                                                                        
                                                                            </table>
                                                                            <?php   
                                                                            $queryyy = "SELECT SUM(total_money) AS total_taka FROM confirm_order WHERE  order_status='delivered' ORDER BY confirm_order_id ASC";
                                                                                $M =mysqli_query($connect,$queryyy);
                                                                                while ($values=mysqli_fetch_assoc($M)) {
                                                                                    $total_money = $values['total_taka'];
                                                                                    
                                                                                    } ?>

                                                                                <hr>
                                                                        
                                                                        
                                                                        
                                                                            </table>
                                                                            <hr>
                                                                            <div class="container-fluid  card">
                                                                                
                                                                                    <div class="col-lg-12 mt-3">
                                                                                        <p  class="text-center font-weight-bolder">Total Earnings <b class="ml-5"><?php echo  $total_money ;  ?> Taka (only)  </b></p>
                                                                                    </div>
                                                                                    
                                                                                   
                                                                            </div>
                                                                            <hr>
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
                                                                            <br>
                                                                            <br>
                                                                            <br>
                                                                            <br>
                                                                            <br>

                                                                            <?php }




                                                            // ai page a last aikhaney change korsi..r er if class eo last chng korsi
                                                                            else{     ?>




                                                                            <h2 class="text-monospace">
                                                                                Nothing found
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
                                    <?php }} else{
                                        $source = $_GET['source'] ;
                                    
                                
                                    switch($source){
                                        case 'view_details' ;
                                        include "./admin_page/order_details_user.php";
                                        break ;


                                    

                                        default ;
                                        include "./total_delivered_order.php" ;
                                    }
                                    } ?>                                   

         
                                


                                

                        
                                            
                                           
                                            
                            </div>        


                        </div>
                        <br>
                        <br>
                        <br>
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->
           

    </div>






  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>
