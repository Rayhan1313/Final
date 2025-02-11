<?php ob_start(); ?>

<?php header("Refresh: 20"); ?>




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
                                                                                    <li><a class="text-dark" href="./hanover_order_by_d_man.php"><i class="fa-solid fa-clipboard-check">    <small>Handover Order By Delivery Man</small> </i></a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            

                                                    <?php 
                                                        
                                                    if(!isset($_GET['source'])){ ?>
                                                                
                                                               

                                                                    




                                                            
                                                                

                                                                         <?php 
                                                                $rul ="SELECT * FROM confirm_order WHERE  order_status='placed_successfully'";
                                                                $iko =mysqli_query($connect,$rul) ;
                                                                $numberta=mysqli_num_rows($iko);
                                                                if($numberta > 0){?>
                                                                                <h5 class="text-center">Handover Orders by Delivery-man  to customers (<?php echo $numberta; ?>) </h5>          
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                        <tr class="text-dark">

                                                                       
                                                                        <th>Sl no.</th>
                                                                        <th>Order Id</th>
                                                                        <th>Customer Id</th>
                                                                        <th>Customer Name</th>
                                                                        <th>Order Code</th>
                                                                        <th>Order Status</th>
                                                                        <th>Delivery man ID</th>
                                                                        <th>D. Man Name</th>
                                                                        <th>View  ordered details</th>
                                                                        <th class="">Set Status Delivered</th>
                                                                        
                                                                        </tr>
                                                                        <tbody>



                                                                    <?php   $count =1;
                                                                            while($okkty=mysqli_fetch_assoc($iko)){
                                                                            $cconfirm_order_id =  $okkty['confirm_order_id'];
                                                                                
                                                                            $oorder_code =  $okkty['order_code'];
                                                                            $ddelivery_man_id =  $okkty['delivery_man_id'];
                                                                            
                                                                            $oorder_status =  $okkty['order_status'];
                                                                            $uuserr_id =  $okkty['user_id'];

                                                                            $lll="SELECT * FROM users WHERE user_id='$uuserr_id'";
                                                                            $kkk=connection($lll);

                                                                            while($jjj=mysqli_fetch_assoc($kkk)){
                                                                                $usernamee =$jjj['username'];

                                                                            }
                                                                                            
                                                                            
                                                                        
                                                        
                                                                        

                                                                        echo "<tr>" ;
                                                                            
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$count}</button></td>"; 
                                                                       
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$cconfirm_order_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$uuserr_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>$usernamee</button></td>";  
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$oorder_code}</button></td>"; 
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2' href=''>{$oorder_status}</a></td>";
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2' href=''>{$ddelivery_man_id }</a></td>";


                                                                        $dd="SELECT * FROM users WHERE user_id='$ddelivery_man_id'";
                                                                            $okkk=connection($dd);

                                                                            while($hmm=mysqli_fetch_assoc($okkk)){
                                                                                $d_man_name =$hmm['username'];

                                                                            }

                                                                            echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2' href=''>{$d_man_name }</a></td>";







                                                                        echo "<td class=' mt-5 pt-3'><a class='mt-3 btn btn-warning btn-lg' href='./hanover_order_by_d_man.php?source=view_details&order_code={$oorder_code}'><i class='fa-solid fa-eye'> </i> View</a></td>";
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-success btn-lg pt-2' href='./hanover_order_by_d_man.php?order_code={$oorder_code}' >Delivered</a></td>";     
                                                                             
                                                                             ?>
                                                                         
                                                                            
                                                                        
                                                                          
                                                                       

                                                                             
                                                                             
                                                                             
                                                                             
                                                                   <?php      if(isset($_GET['order_code'])){
                                                                            $coddee =$_GET['order_code'] ;
                                                                            
                                                                            $Object = new DateTime();  
                                                                            $Object->setTimezone(new DateTimeZone('Asia/Dhaka'));
                                                                            $delivered_time= $Object->format("h:i:s a");
                                                                            
        
                                                                            
                                                                            $change_qyii ="UPDATE confirm_order set order_status ='delivered',delivered_time='$delivered_time',order_processed_by='".$_SESSION['user_id']."' WHERE order_code='$coddee' " ;
                                                                            $admikk =mysqli_query($connect,$change_qyii);
                                                                            if(isset($admikk)){
                                                                            $change_orderer_taaa ="UPDATE order_list set order_status ='delivered' WHERE order_code='$coddee'" ;
                                                                            $order_list_status_chngg =mysqli_query($connect,$change_orderer_taaa);
                                                                            header("Location: ./hanover_order_by_d_man.php");
                                                                            }
                                                                            
                                                                        }?>







                                            
                                                                    
                                                                        
                                                                        </tr>

                                                                        
                                                                                <?php  $count++ ;    } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
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
                                                                            <br>
                                                                            <hr>
                                                                            <?php } else { ?>
                                                                                <div class="container-fluid bg-transparent">
                                                                                    <h2 class=" text-monospace">Currently no handover order found 
                                                                                    </h2>
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
                                                                                </div>
                                                                                <?php } ?>


                                    </div>  
                                    <?php } else{
                                        $source = $_GET['source'] ;
                                    
                                
                                    switch($source){
                                        case 'view_details' ;
                                        include "./admin_page/order_details_user.php";
                                        break ;


                                    

                                        default ;
                                        include "./hanover_order_by_d_man.php" ;
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
