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
                                                                                    <li><a class="text-dark" href="./total_active_order.php"><i class="fa-solid fa-utensils"> <small> Total Active Orders</small></i> </a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            

                                                    <?php 
                                                        
                                                    if(!isset($_GET['source'])){
                                                                $rules ="SELECT * FROM confirm_order WHERE  order_status='Received' OR order_status='ON_THE_way'";
                                                                
                                                                
                                                                $news =mysqli_query($connect,$rules) ;
                                                                $c=mysqli_num_rows($news);
                                                                if($c<1){?>

                                                                    
                                                                        <h2 class=" text-monospace">No Active order found
                                                                        <?php
                                                                        $wait ="SELECT  * FROM `confirm_order` WHERE  order_status='Received'";
                                                                        $connect_koriiii = connection($wait);
                                                                        $ordered_item_by_customer_pending_receive_countt= mysqli_num_rows($connect_koriiii); 
                                                                        $waitt ="SELECT  * FROM `confirm_order` WHERE  order_status='sent'";
                                                                        $connect_ko = connection($waitt);
                                                                        $ordered_item_by_customer_pending_ON_WAY_countt= mysqli_num_rows($connect_ko); 
                                                                        $ordered_item_by_customer_pending_countt= $ordered_item_by_customer_pending_receive_countt +  $ordered_item_by_customer_pending_ON_WAY_countt;
                                                            
                                                                        
                                                                        if($ordered_item_by_customer_pending_countt >0){
                                                                            echo "but total "." ". $ordered_item_by_customer_pending_countt." " ."pending orders found. <a href='./total_pending_order.php'>click here</a> to view those order";
                                                                        }
                                                                    ?>
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
                                                                    




                                                            
                                                                    <?php  }
                                                                    else{?>
                                                                    <div class="container-fluid card-body border bg-transparent"> 
                                                                    <h5 class="text-center">Active Orders</h5>          
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                        <tr class="text-dark">

                                                                       
                                                                        <th>Sl no.</th>
                                                                        <th>Order Id</th>
                                                                        <th>Customer Id</th>
                                                                        <th>Customer Name</th>
                                                                        <th>Order Code</th>
                                                                        <th>Order Status</th>
                                                                        <th>Delivery man ID</th>
                                                                        <th>Delivery man name</th>
                                                                        <th>View  ordered details</th>
                                                                        <th class="">Set a Delivery Man</th>
                                                                        
                                                                        </tr>
                                                                        <tbody>



                                                                    <?php   $count =1 ;
                                                                        while($view=mysqli_fetch_assoc($news)){
                                                                            $confirm_order_id =  $view['confirm_order_id'];
                                                                                
                                                                            $order_code =  $view['order_code'];
                                                                            $delivery_man_id =  $view['delivery_man_id'];
                                                                            
                                                                            $order_status =  $view['order_status'];
                                                                            $userr_id =  $view['user_id'];

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
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2' href=''>{$order_status}</a></td>";
                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2' href=''>{$delivery_man_id }</a></td>";


                                                                        if($delivery_man_id =='null') {
                                                                            $d_man_name ="--SET Delivery Man--";
                                                                        }
                                                                        else {
                                                                        $dd="SELECT * FROM users WHERE user_id='$delivery_man_id'";
                                                                        $okkk=connection($dd);

                                                                        while($hmm=mysqli_fetch_assoc($okkk)){
                                                                            $d_man_name =$hmm['username'];
                                                                            
                                                                        } }

                                                                        echo "<td class='text-left'><a class='mt-3 btn text-warning btn-lg btn-light pt-2' href=''>{$d_man_name }</a></td>";

                                                                         


                                                                        echo "<td class=' mt-5 pt-3'><a class='mt-3 btn btn-warning btn-lg' href='./total_active_order.php?source=view_details&order_code={$order_code}'><i class='fa-solid fa-eye'> </i> View</a></td>";
                                                                             ?>
                                                                         
                                                                            
                                                                        
                                                                          
                                                                        <td class="mt-2 ml-5 pl-5 text-right">
                                                                            <?php if($delivery_man_id == 'null' || $delivery_man_id == '') { ?>
                                                                        <form action="" method="post" class="mt-3">
                                                                            <div class="form-group row">
                                                                            
                                                                                <select name="delivery_mans_id" class="form-control-lg form-control col-lg-6" id="">
                                                                                    <?php 
                                                                                    echo "<option  value='null'>$delivery_man_id</option>";
                                                                                    $setting ="SELECT * FROM users WHERE user_role='delivery_man' AND status='verified'" ;
                                                                                    $connoo =mysqli_query($connect, $setting);
                                                                                    while ($dataaa=mysqli_fetch_assoc($connoo)) {
                                                                                        $user_id = $dataaa['user_id'] ;
                                                                                        $username = $dataaa['username'] ;

                                                                                        
                                                                                        
                                                                                    echo "<option  value='$user_id'>$username</option>";
                                                                                
                                                                                    }
                                                                                    ?>

                                                                                            
                                                                                </select>
                                                                                <input type='hidden'  name='confirmed_id' value='<?php echo $confirm_order_id ; ?>'>
                                                                                
                                                                            
                                                                                <input class="col-lg-3 btn-success btn-lg" type="submit" name="set" value="Set">
                                                                        </div>
                                                                    </form>
                                                                            <?php } ?>

                                                                        </td>

                                                                             
                                                                             
                                                                             
                                                                             
                                                                   <?php      if(isset($_POST['set'])){
                                                                            $confirmed_id =$_POST['confirmed_id'] ;
                                                                            
                                                                            $delivery_mans_id =$_POST['delivery_mans_id'] ;
                                                                            $gg="SELECT * FROM confirm_order WHERE confirm_order_id= '$confirmed_id'";
                                                                            $ggg=connection($gg);
                                                                            while($rr=mysqli_fetch_assoc($ggg)){
                                                                                $order_codeta=$rr['order_code'];
                                                                            }
        
                                                                            
                                                                            $change_qy ="UPDATE confirm_order set order_status ='ON_THE_WAY',delivery_man_id='$delivery_mans_id' WHERE confirm_order_id=$confirmed_id " ;
                                                                            $adminn =mysqli_query($connect,$change_qy);
                                                                            if(isset($adminn)){
                                                                            $change_orderer_ta ="UPDATE order_list set order_status ='ON_THE_WAY' WHERE order_code='$order_codeta'" ;
                                                                            $order_list_status_chng =mysqli_query($connect,$change_orderer_ta);
                                                                            header("Location: ./total_active_order.php");
                                                                            }
                                                                            
                                                                        }?>







                                            
                                                                    
                                                                        
                                                                        </tr>

                                                                        
                                                                                <?php  $count ++ ;    } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
                                                                        </tbody>
                                                                        <hr>
                                                                        
                                                                        
                                                                        
                                                                            </table>
                                                                                <?php  } ?> 
                                                                                

                                                                        
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
                                    <?php } else{
                                        $source = $_GET['source'] ;
                                    
                                
                                    switch($source){
                                        case 'view_details' ;
                                        include "./admin_page/order_details_user.php";
                                        break ;


                                    

                                        default ;
                                        include "./total_active_order.php" ;
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
