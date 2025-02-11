<?php ob_start(); ?>

<?php header("Refresh: 30"); ?>




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
                                                                                    <li><a class="text-dark" href="./all_delivered_order_customer_side.php"><i class="fa-solid fa-box ">  <small> Total Ordered Items</small></i></a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            

                                                    <?php 
                                                        
                                                    if(!isset($_GET['source'])){
                                                               

                                                                         
                                                                $rul ="SELECT * FROM confirm_order WHERE  order_status='delivered' AND user_id='".$_SESSION['user_id']."'";
                                                                $iko =mysqli_query($connect,$rul) ;
                                                                $numberta=mysqli_num_rows($iko);
                                                                if($numberta > 0){?>
                                                                <div class="card container-fluid bg-transparent">
                                                                                <h5 class="text-center">Total Ordered List (<?php echo $total_order_by_a_customer ; ?>)</h5>          
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                        <tr class="text-dark">

                                                                       
                                                                        <th>Sl no.</th>
                                                                        <th>Order Id</th>
                                                                        
                                                                        <th>Customer Name</th>
                                                                        <th>Order Code</th>
                                                                        <th>Order Status</th>
                                                                        
                                                                        <th>View  ordered details</th>
                                                                        <th>Order Date</th>

                                                                        
                                                                        
                                                                        </tr>
                                                                        <tbody>



                                                                    <?php   
                                                                        $count =1;
                                                                            while($okkty=mysqli_fetch_assoc($iko)){
                                                                            $cconfirm_order_id =  $okkty['confirm_order_id'];
                                                                                
                                                                            $oorder_code =  $okkty['order_code'];
                                                                            $ddelivery_man_id =  $okkty['delivery_man_id'];
                                                                            
                                                                            $oorder_status =  $okkty['order_status'];
                                                                            $uuserr_id =  $okkty['user_id'];
                                                                            $oorder_date=$okkty['order_date'];

                                                                            $lll="SELECT * FROM users WHERE user_id='$uuserr_id'";
                                                                            $kkk=connection($lll);

                                                                            while($jjj=mysqli_fetch_assoc($kkk)){
                                                                                $usernamee =$jjj['username'];

                                                                            }
                                                                                            
                                                                            
                                                                        
                                                        
                                                                        

                                                                        echo "<tr>" ;
                                                                            
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$count}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$cconfirm_order_id}</button></td>"; 
                                              
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>$usernamee</button></td>";  
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$oorder_code}</button></td>"; 
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-light pt-2' >{$oorder_status}</a></td>";
                                                                        
                                                                        echo "<td class=' mt-5 pt-3'><a class='mt-3 btn btn-warning btn-md' href='./all_delivered_order_customer_side.php?source=view_details&order_code={$oorder_code}'><i class='fa-solid fa-eye'> </i> View</a></td>";
                                                                             
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-light pt-2' >{$oorder_date}</a></td>";    
                                 
                                                                        echo "</tr>";

                                                                        ?>

                                                                        
                                                                                <?php  $count++;    } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
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
                                                                            <br>
                                                                            <br>
                                                                            <br>

                                                                            <hr></div>
                                                                            <?php }

                                                                            


                                                            // ai page a last aikhaney change korsi..r er if class eo last chng korsi
                                                                            else{     ?>



                                                                    <div class="card container-fluid bg-transparent">
                                                                            <h2 class="text-monospace text-center">
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
                                                                            </h2></div>


                                    </div>  
                                    <?php }} else{
                                        $source = $_GET['source'] ;
                                    
                                
                                    switch($source){
                                        case 'view_details' ;
                                        include "./admin_page/order_details_user.php";
                                        break ;


                                    

                                        default ;
                                        include "./all_delivered_order_customer_side.php" ;
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
