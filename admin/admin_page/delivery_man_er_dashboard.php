<div class="row  bg-transparent">
                    <div class="col-lg-12 bg-transparent">
                       
                    <style>
                            .oooo{
                                color: #ff0080;
                            }
                       </style>
                        <h1 class="page-header">
                            Welcome Dear,  <small class="font-weight-bolder oooo"><?php echo $_SESSION['username']; ?></small>
                          
                        </h1>


     
                    </div>
</div>
<div class="row bg-transparent">
           
            


            <!-- total delivery j koyta joma  by dman  --->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-person-through-window   fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                    //count korsi just
                                    $rules ="SELECT * FROM confirm_order WHERE  order_status='ON_THE_WAY' AND delivery_man_id='".$_SESSION['user_id']."'";
                                                                
                                                                
                                    $news =mysqli_query($connect,$rules) ;
                                    $Task=mysqli_num_rows($news);

                            echo  "<div class='huge badge badge-info'><h5 class='mt-1'><samp>{$Task}</samp></h5></div>";

                                ?>


                                <div><samp>Task</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./delivery_task_d_man.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>





            <!-- total delivered_items by dman  --->
            

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-truck-ramp-box  fa-5x"></i> 
                            </div>
                            <div class="col-xs-9 text-right">
                            <?php

                                            $ru ="SELECT * FROM confirm_order WHERE  order_status='placed_successfully' OR order_status='delivered'  AND delivery_man_id='".$_SESSION['user_id']."'";
                                            $ne =mysqli_query($connect,$ru) ;
                                            $total_delivered_items_by_dman=mysqli_num_rows($ne);


                            ?>
                            
                            <div class='huge badge badge-info'><h5  class='mt-1'><samp><?php echo $total_delivered_items_by_dman ; ?></samp></h5></div>


                                <div><samp>All Delivered Orders</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./delivery_all_item_by_dman.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
            
</div>


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
                                                                                <br><br>
                                                                                




