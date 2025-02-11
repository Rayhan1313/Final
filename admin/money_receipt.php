<?php  include "./admin_page/db.php";
 ?>




<?php  ob_start();

session_start();
?>
<?php  INCLUDE "../include/function.php"  ; ?>
<?php if(!isLoggedIn()) {
        link_kori("../index.php");
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RT Food Delivery</title>
    
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon"/>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

 <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- font awesome cdmn -->
     <script src="https://kit.fontawesome.com/c8bee5c707.js" crossorigin="anonymous"></script>
    




            <style>
                .background{
                background-image: url('../img/background.png');
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            

            </style>





</head>




<body

class="container-fluid background rounded-left rounded-right min-vw-100">
<style>
    @media print{
                body * {
                    visibility: hidden;
                }
                .print-data, .print-data * {
                    visibility: visible;
                }
            }
</style>















<?php

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

                                

<p class="text-right">
    <button class="btn btn-success"  onclick=" window.print(); " >print</button>
              
    </p>



<div class="container-fluid card border  ml-3  print-data">
    
    
        <div class="card-header bg-light">
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
                            if(($status =='Received' || $status =='ON_THE_WAY') &&  $_SESSION['user_role'] =='customer'): ?>

                            <p class="text-center mt-2 text-danger text-monospace">Please share your order code with our delivery-man</p>
                            <hr>
                            <?php endif; ?>
                                                                
        
            <div class="row">
                <div class="col-lg-4">


            <?php    if($status =='delivered'  ||   $_SESSION['user_role'] =='admin'  || $_SESSION['user_role'] =='moderator'): ?>

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
                                while($doone=mysqli_fetch_assoc($okkk)){
                                   $Process_man_name=$doone['username'];
                                   $Process_man_email=$doone['email'];
                                   $role=$doone['user_role'];
                                   $Process_man_mobile_number=$doone['mobile_number'] 
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

            
            
                                <div class="card-body">                        
                                                
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
                                                                        
                                                                    ?>
                                                           
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                    
                                                                            
                                                                    <br>                             <p  class="text-right  ml-3 pl-3">  <b> <?php echo " ".$total_money; ?></b></samp> <small>taka</small></p>
                                                                                                    <p  class="text-right mt-3 pt-1 ml-3 pl-3">Delivery charge:       <samp class=" font-weight-bolder ml-5"> + <b>20</b> </samp> <small>taka</small> </p><hr>
                                                                                                    <p  class="text-right mt-3 pt-1 ml-3 pl-3">Amount to pay:     <b><?php echo " ".$total_money +20; ?></b></samp> <small>taka</small> 

                                                                                                            <?php 
                                                                                                              if(($status == 'placed_successfully'  || $status == 'delivered')){  ?>
            
                                                                                                               <br> <b>( paid )</b>
                                                                                                            
                                                                                                            <?php } ?>
                                                                                                    
                                                                                                    </p>

                                                                                                </div>
                                                                                                
                                                                    </samp>
                                                                    
                                                                        <?php } ?>
                                                                    
                                                                        <br>***Payment-method :Cash On Delivery    
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
                                                                 

                                                                        
                                                            <div class="card-footer d-flex justify-content-center">
                                                                <div class="row">
                                                                    
                                                                        <p class="text-center mt-5"><b>
                                                                            RT Food Delivery
                                                                        </b><br>
                                                                        Cell: 01724117757 & 01778700365
                                                                    </p>
                                                                </div>    
                                                                    
                                                                
                                                



                                                        


                                                                        





                                                            
                                                                    
                                                                    
                                                                    
                                                                    




                                            
                                            

                                            

                                                            </div>


        </div>
    </div>    

<?php }?>



    
</body>