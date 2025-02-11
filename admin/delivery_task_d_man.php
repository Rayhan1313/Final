<?php header("Refresh: 22"); ?>

<?php ob_start(); ?>






<?php include "./admin_page/db.php" 
?>
<?php include "./admin_page/header.php" ;


?>
    


    <?php //if(!check_admin($_SESSION['username'])){
   //         header("Location: ./index.php"); 
    //    }
?>











    <div id="wrapper" class="background ">
       

        
<?php

if(isset($_POST['send'])){
    $code =$_POST['code'];
 $confirmed_id =$_POST['confirmed_id'];

   
    $checking_error=[
        'code'=> ''
    
    ];
    
    
    if($code == '')  {
        $checking_error['code'] ='please enter order code.';
     } 

     $nw="SELECT order_code FROM confirm_order WHERE confirm_order_id='$confirmed_id'";
     $neew=connection($nw);
     while($newww=mysqli_fetch_array($neew)){
         $tokenn=$newww['order_code'];}
     
    if($code !==$tokenn){
        $checking_error['code'] ='code not match';
     }  

     foreach($checking_error as $key => $value){   // prottekta $checking_error detect koirar jonno foreach loop use kora hyese
        if(empty($value)){
            unset($checking_error[$key]);
           
        }
        if(empty($checking_error)){
          $new = "UPDATE confirm_order SET order_status='placed_successfully' WHERE confirm_order_id='$confirmed_id' AND order_code='$tokenn'";
          $done =connection($new);
          if(isset($done)){
            $newj = "UPDATE order_list SET order_status='placed_successfully' WHERE order_code='$tokenn'";
            $donee =connection($newj);
            if(isset($donee)){
                // $notification = true;
            }
          }
          
    }
   
        
        

 }}      ?>
  

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
                                                                                    <li><a class="text-dark" href="./delivery_task_d_man.php"> <i class="fa-solid fa-person-through-window"> <small>  Total Task</small></i></a></li>

                                                                                </ol>
                                            </div>
                                                                            <br>
                                                                            

                                                    <?php 
                                                        
                                                   
                                                                $rules ="SELECT * FROM confirm_order WHERE  order_status='ON_THE_WAY' AND delivery_man_id='".$_SESSION['user_id']."'";
                                                                
                                                                
                                                                $news =mysqli_query($connect,$rules) ;
                                                                $c=mysqli_num_rows($news);
                                                                if($c<1){?>

                                                                    <div class="card bg-transparent">
                                                                        <h2 class="card-header text-center text-monospace">No task found
                                                                                
                                                                                
                                                                                
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
                                                                                <br><br>
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
                                                                    <h5 class="text-center">Total Task</h5>          
                                                                    
                                                                    <table class="table table-hover border-bottom-3 table-borderless container-fluid bg-transparent">
                                                                            
                                                                        <tr class="text-dark">
                                                                        
                                                                        <th>Sl no.</th>
                                                                        <th>Bill no.</th>
                                                                        <th>Customer Name</th>
                                                                        <th>Mobile Number</th>
                                                                        
                                                                       
                                                                        <th>Customer Address</th>
                                                                        
                                                                        <th class="ml-5">ENTER Order Code</th>
                                                                        
                                                                        
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
                                                                                $mobile_number =$jj['mobile_number'];
                                                                                $house =$jj['house_no'];
                                                                                $street =$jj['street'];
                                                                                $city =$jj['city'];
                                                                                $address = $house . ",". $street . ", ".$city ;


                                                                            }
                                                                                            
                                                                            
                                                                        
                                                        
                                                                        

                                                                        echo "<tr>" ;
                                                                            
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$count}</button></td>"; 
                                                                      
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$confirm_order_id}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>{$username}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 23px'><button class='btn btn-lg'>0{$mobile_number}</button></td>"; 
                                                                        echo "<td class='mt-3 pt-3 font-weight-bolder text-dark' style='font-size: 20px'><button class='btn btn-lg'>$address</button></td>";  
                                                                             ?>
                                                                         
                                                                            
                                                                        
                                                                          
                                                                        <td class="mt-2  text-left">
                                                                            
                                                                        <form action="" method="post" class="mt-3 row mr-5 form-inline">
                                                                            <div class="form-group col-lg-6">
                                                                            
                                                                                
                                                                                <input type='hidden'  name='confirmed_id' value='<?php echo $confirm_order_id ; ?>' >
                                                                                <input type='text'  name='code' class='form-control form-control-md' placeholder='enter order code here'>
                                                                               
                                                                            </div> 
                                                                            
                                                                                
                                                                            <div class="form-group col-lg-4 text-left">   
                                                                            
                                                                                <input class="btn-success" type="submit" name="send" value="send">
                                                                            </div>
                                                                        
                                                                    </form>
                                                                            

                                                                        </td>

                                                                             
                                                                             
                                                                             
                                                                   






                                            
                                                                    
                                                                        
                                                                        </tr>

                                                                        
                                                                                <?php  $count++ ;    } ?>

                                                                                
                                                                        
                                                                        
                                                                    
                                                                        
                                                                        </tbody><hr>
                                                                        
                                                                        <p class="text-center">
                                                                                <small class="text-danger"><?php  echo isset($checking_error['code']) ? $checking_error['code'] :'' ?></small> 
                                                                        </p>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                            </table>
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
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <?php  } ?> 
                                                                                
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                
                                    </div>  
                                                                      

         
                                


                                

                        
                                            
                                           
                                            
                            </div>    
                            

                        </div>
                </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->





    </div>






  
        
     
        
        
        
    <?php include "admin_page/footer.php" ?>
