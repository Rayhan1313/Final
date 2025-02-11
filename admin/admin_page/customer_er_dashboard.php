<div class="row  bg-transparent">
                    <div class="col-lg-12 background">
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
<div class="row ">
           
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-cart-arrow-down fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                                        //same count korsi just
                                $query = "SELECT * FROM order_list WHERE order_status='pending' AND user_id='".$_SESSION['user_id']."'";
                                $select_all_post = mysqli_query($connect,$query);
                                $cart_count = mysqli_num_rows($select_all_post);

                            echo  "<div class='huge badge badge-success'><h5 class='mt-1'><samp>{$cart_count}</samp></h5></div>";

                                ?>


                                <div><samp>Cart</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./cart.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>



            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-utensils fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                    //count korsi just
                                $queryyy = "SELECT * FROM confirm_order  WHERE order_status='Received' OR order_status='ON_THE_WAY' AND user_id='".$_SESSION['user_id']."' ";
                                
                                $select_all_active_order = mysqli_query($connect,$queryyy);
                                $active_order_count_user = mysqli_num_rows($select_all_active_order);

                            echo  "<div class='huge badge badge-info'><h5  class='mt-1'><samp>{$ordered_item_by_customer_active_countt}</samp></h5></div>";

                                ?>


                                <div><samp>Active Orders</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./active_order.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <!-- total pending by user  --->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-hourglass-start fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                    //count korsi just
                                $que = "SELECT * FROM confirm_order  WHERE order_status='sent' AND user_id='".$_SESSION['user_id']."' ";
                                
                                $select_all_pending_order = mysqli_query($connect,$que);
                                $pending_order_count_user = mysqli_num_rows($select_all_pending_order);

                            echo  "<div class='huge badge badge-info'><h5 class='mt-1'><samp>{$pending_order_count_user}</samp></h5></div>";

                                ?>


                                <div><samp>Pending Orders</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./current_order_details.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>





            <!-- total ordered_items by user  --->
            

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-plate-wheat fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            
                            <div class='huge badge badge-info'><h5  class='mt-1'><samp><?php echo $total_order_by_a_customer ; ?></samp></h5></div>


                                <div><samp>All Delivered Orders</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./all_delivered_order_customer_side.php">
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





