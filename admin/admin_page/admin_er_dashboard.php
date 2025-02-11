<div class="row  bg-transparent">
                    <div class="col-lg-12 background">
                       
                       <style>
                            .oooo{
                                color: #ff0080;
                            }
                       </style>
                        <h1 class="page-header">
                            Welcome   
                            <?php if($_SESSION['user_role']=='admin'){
                                echo "Admin" ;
                            }
                            elseif($_SESSION['user_role']=='moderator'){
                                echo " ";
                            } ?>  <small class="font-weight-bolder oooo"><?php echo $_SESSION['username']; ?></small>
                          
                        </h1>


     
                    </div>
</div>
<div class="row ">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-hammer  fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                    //count korsi just
                                $query = "SELECT * FROM categories";
                                $select_all_post = mysqli_query($connect,$query);
                                $category_count = mysqli_num_rows($select_all_post);

                            echo  "<div class='huge badge badge-info'><h5 class='mt-1'><samp>{$category_count}</samp></h5></div>";

                                ?>


                                <div><samp>Categories</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-jar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                                        //same count korsi just
                                $query = "SELECT * FROM post";
                                $select_all_post = mysqli_query($connect,$query);
                                $post_count = mysqli_num_rows($select_all_post);

                            echo  "<div class='huge badge badge-success'><h5 class='mt-1'><samp>{$post_count}</samp></h5></div>";

                                ?>


                                <div><samp>Items</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="item_post.php">
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
                               
                            echo  "<div class='huge badge badge-success'><h5 class='mt-1'><samp>{$taile_kotogula_order_joma_hoise}</samp></h5></div>";

                                ?>


                                <div><samp>Total Active Order</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./total_active_order.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>



    



            <!-- pending total order -->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-hourglass-start fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                               
                            echo  "<div class='huge badge badge-success'><h5 class='mt-1'><samp>{$taile_kotogula_Pending}</samp></h5></div>";

                                ?>


                                <div><samp>Total Pending Order</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./total_pending_order.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

</div>

<div class="row">


            <!-- handover orders by delivery man -->

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-clipboard-check fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                            $rul ="SELECT * FROM confirm_order WHERE  order_status='placed_successfully'";
                            $iko =mysqli_query($connect,$rul) ;
                            $numberta=mysqli_num_rows($iko);
                               
                            echo  "<div class='huge badge badge-success'><h5 class='mt-1'><samp>{$numberta}</samp></h5></div>";

                                ?>


                                <div><samp>Placed-order by Delivery-man</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./hanover_order_by_d_man.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>










            <!--  Processed Order By You -->
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fa-solid fa-microchip fa-5x"> </i> 
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 

                                    
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp>{$total_processed_order_by_admin_moderator}</samp></h5></div>";

                                    ?>


                                    <div><samp>Completed Order By You</samp></div>
                                </div>
                            </div>
                        </div>
                        <a href="./total_processed_order_by_moderator.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>











        
            <!-- total delivered ordergulo -->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-plate-wheat fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                               
                            echo  "<div class='huge badge badge-success'><h5 class='mt-1'><samp>{$total_delivered_order_list_admin_er_oikhane_count}</samp></h5></div>";

                                ?>


                                <div><samp>Total Delivered Order</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./total_delivered_order.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>









        


















            <?php if( $_SESSION['user_role']=='admin'){ ?>

       
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-muted">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-people-group fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 
                                            //count korsi just
                                $query = "SELECT * FROM users WHERE status='verified'";
                                $select_all_post = mysqli_query($connect,$query);
                                $users_count = mysqli_num_rows($select_all_post);

                            echo  "<div class='huge badge badge-info'><h5 class='mt-1'><samp>{$users_count}</samp></h5></div>";

                                ?>


                                <div><samp>Total Users</samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <?php } ?>


        

</div>



<?php if( $_SESSION['user_role']=='admin'){ ?>
    <br>

<div class="row">




                <!-- kotojon admin -->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa-solid fa-user-secret fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            
                            <?php 

                                $jjjj=mysqli_query($connect,"SELECT * FROM users WHERE user_role='admin'");
                                $hhhh=mysqli_num_rows($jjjj);
                                echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp>{$hhhh}</samp></h5></div>";

                                ?>


                                <div><samp>Admin </samp></div>
                            </div>
                        </div>
                    </div>
                    <a href="./users.php?source=admin">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>










            <!-- kotojon moderator -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fa-solid fa-users-gear fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 

                                    $lpol=mysqli_query($connect,"SELECT * FROM users WHERE user_role='moderator'");
                                    $poiuy=mysqli_num_rows($lpol);
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp>{$poiuy}</samp></h5></div>";

                                    ?>


                                    <div><samp>Moderator </samp></div>
                                </div>
                            </div>
                        </div>
                        <a href="./users.php?source=moderator">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>






            <!-- kotojon deliveryman -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fa-solid fa-people-carry-box fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 

                                    $opli=mysqli_query($connect,"SELECT * FROM users WHERE user_role='delivery_man' AND status='verified'");
                                    $rtyui=mysqli_num_rows($opli);
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp>{$rtyui}</samp></h5></div>";

                                    ?>


                                    <div><samp>Delivery Man</samp></div>
                                </div>
                            </div>
                        </div>
                        <a href="./users.php?source=delivery_man">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!--  Customers -->
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fa-solid fa-users-line  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 

                                    $oplpp=mysqli_query($connect,"SELECT * FROM users WHERE user_role='customer' AND status='verified'");
                                    $huigu=mysqli_num_rows($oplpp);
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp>{$huigu}</samp></h5></div>";

                                    ?>


                                    <div><samp>Customers</samp></div>
                                </div>
                            </div>
                        </div>
                        <a href="./users.php?source=customer">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>


               





</div>
<?php } ?>


<div class="row">
     <!-- ajker income -->
     <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fa-solid fa-filter-circle-dollar fa-5x"> </i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 
                                
                                $date=date('y-m-d');
                               // echo $date;

                                $taka = "SELECT SUM(total_money) AS total_taka FROM confirm_order WHERE  order_status='delivered' AND order_date=date(now())";
                                $koto =mysqli_query($connect,$taka);
                                while ($values=mysqli_fetch_assoc($koto)) {
                                    $total_money_today = $values['total_taka'];
                                    if(empty($total_money_today)){
                                        $total_money_today = 0 ;
                                    }
                                    } 
                                    
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp class=' mr-1'>{$total_money_today}</samp> &#2547; Taka</h5></div>";

                                    
                                    
                                    
                                    ?>
                                    


                                    <div><samp>Today's Earning</samp> (<?php echo  date('l'); ?>)</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>





                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-file-invoice-dollar fa-5x "> </i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 

                                $qull = "SELECT SUM(total_money) as total_taka_this_month FROM `confirm_order` WHERE order_status='delivered'  AND MONTH(order_date)=MONTH(now());";
                                $lplp =mysqli_query($connect,$qull);
                                while ($values=mysqli_fetch_assoc($lplp)) {
                                    $total_money_of_the_month = $values['total_taka_this_month'];
                                    if(empty($total_money_of_the_month)){
                                        $total_money_of_the_month = 0 ;
                                    }
                                    
                                    } 
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp class='mr-1'>{$total_money_of_the_month}</samp>  &#2547; Taka</h5></div>";

                                    ?>


                                    <div><samp>Earning in this (<?php echo date('F') ; ?>)</samp></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>


                <!--  Customers -->
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-dark">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-cash-register fa-5x "> </i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 

                                $queryyy = "SELECT SUM(total_money) AS total_taka FROM confirm_order WHERE  order_status='delivered' ORDER BY confirm_order_id ASC";
                                $M =mysqli_query($connect,$queryyy);
                                while ($values=mysqli_fetch_assoc($M)) {
                                    $total_money = $values['total_taka'];
                                    if(empty($total_money)){
                                        $total_money = 0 ;
                                    }
                                    
                                    } 
                                    echo  "<div class='huge badge badge-dark'><h5 class='mt-1'><samp class='mr-1'>{$total_money}</samp>  &#2547; Taka</h5></div>";

                                    ?>


                                    <div><samp>Total Earning</samp></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>

            
</div>

<hr>