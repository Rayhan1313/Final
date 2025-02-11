<?php INCLUDE "./include/db.php"; ?>
<?php INCLUDE "./include/header.php" ;  ?>
<?php INCLUDE "./include/function.php"; 

global $connect;

?>

<?php 

//navigation aitar    update er karon a baad pora ongsho

//INCLUDE "./include/navigation.php" ; ?>
<!-- 
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

       add to cart korle (get reguest ta paile aita kaj korbe ,"get request nicchi add-to-cart button theke") aita database a pathabo akhn 
                              
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::---->

<?php /*

 if(isset($_GET['item_id']) && isset($_GET['cart_item_id'])){
    $idd = $_GET['cart_item_id'] ;
   $query = "SELECT * FROM post WHERE item_id = {$idd}";
   $conn = mysqli_query($connect,$query);
   $counntt = mysqli_num_rows($conn);
  

// data search kortesi  ------------------------------------------------------

   while($data =mysqli_fetch_array($conn)){
       $idds = $data['item_id'];
       $title =$data['item_name'];
       $item_image=$data['item_image']; 
       $item_description=$data['item_description'];
       $item_price=$data['item_price'];
       $item_creation_date=$data['item_created_date'];
       $item_creator=$data['item_creator'];

   }
   $kk ="INSERT INTO order_list(order_item_id,ordered_item_name,ordered_item_price,order_status) VALUES($idds,'$title',$item_price,'pending')";
   $connectll= mysqli_query($connect,$kk);

   
   
   
   

       
   }
   */


  if(isset($_POST['Cart'])){
    $ordered_item_id= $_POST['item_id'] ;
   $quantity= $_POST['quantity'];
   $ordered_item_name= $_POST['item_name'];
   $ordered_item_caatid= $_POST['category_id'];
    $ordered_item_price=$_POST['item_price'];

    if($quantity== '' || empty($quantity)){
        $quantity = 1 ; 
    }
    
   $item_prices = $ordered_item_price * $quantity ;

     
   $kk ="INSERT INTO order_list(order_item_id,ordered_item_name,ordered_item_price,order_status,user_id,quantity,total_price) VALUES($ordered_item_id,'$ordered_item_name',$ordered_item_price,'pending','".$_SESSION['user_id']."','$quantity',$item_prices)";
    $connectll= mysqli_query($connect,$kk);
    if($connectll){
       // header("Location: ./view_individual_post.php?item_id=$ordered_item_caatid");
         
    }
 

 }
 
   




?>


<?php INCLUDE "./include/navigation.php"; ?>






<br>

           
<div class="container-fluid background rounded-left rounded-right">

<?php


//-----------------------add to cart korle je notification ta dibe   --------------------------  ::::::::::::::::::::: \\

if(isset($connectll)){
    
  // echo $idd = $_GET['cart_item_id'] ;

 


//total koto taka seita dekha jabe ..... pore onno table a shift kore dibo   \\\\
$queryyy = "SELECT SUM(ordered_item_price) AS total_money FROM order_list WHERE order_status='pending'";
$M =mysqli_query($connect,$queryyy);
while ($values=mysqli_fetch_assoc($M)) {
    $total_value = $values['total_money'];
}

echo "Total Money ".$total_value ;
echo "
   <div class='alert alert-warning alert-dismissible fade show w-50' role='alert'>
   <strong>item carted successfully!</strong> <a href='./admin/cart.php'>see in card</a>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
   </div> ";


} 
 
   
 
?>

<!-- ai porjnto ^| ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
 <!--              ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->










<!--  ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;

                            item_category page theke navbar er item gula theke get request aikhane catch korsi   
                               
                             ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->



<?php 

if(isset($_GET['item_id'])){
    $single_id= $_GET['item_id'];



// jeita "GET" korsi seita dia akhn database a search korbo      ::::::::::::::::::::::::::::::::::::::::::: 


$category_nitesi = "SELECT * FROM post WHERE item_id='$single_id'" ;
$new=connection($category_nitesi);

//-- ---------------------------------------       --------      ------------------------------------------------- --  //

//


 






// post page er data gulo ber kore antesi --------------------------------

 while($datagula =mysqli_fetch_assoc($new)){
 $item_id=$datagula['item_id'];
 $item_cat_id=$datagula['item_category_id'];
 $item_name=$datagula['item_name']; 
 $item_image=$datagula['item_image']; 
 $item_description=$datagula['item_description'];
 $item_price=$datagula['item_price'];
 $item_status=$datagula['status'];
 $item_creation_date=$datagula['item_created_date'];
 $item_creator=$datagula['item_creator'];

 //  ------------------------------------------------------------------------card deck nisi

echo "<hr>";
 echo "<div class='card-deck bg-transparent  rounded-left  rounded-right ml-1 pb-2 pl-4 pr-1 justify-content-center row'>";//  aikhane ggs css cl korchilam



//----------------------------------------card suru

echo "<div class='card container-fluid text-center pl-3 col-lg-9 border bg-transparent rounded-left rounded-right'>";




            echo  "<div class='card-header bg-transparent'>" ;
                
                echo "<h5 class='card-text'><strong><bold>Item Name :<samp> $item_name </samp></bold></strong></h5>"  ; 

            




            echo  "<div class='card-body  bg-transparent'>" ;


                    echo "<img class='img-thumbnail' src='./include/item_img/{$item_image}' alt='picture dibo pore' height='70px' width='660px'> "  ;
                    echo "<p class='card-text pt-2'><strong><bold>Item Description : <samp>$item_description </samp></bold></strong></p>"  ;

                    echo "<p class='card-text'><strong><bold>Price: <strong>   &#2547;   </strong><samp>   $item_price  </samp></bold>  </strong>  </p>"  ; 
                    echo "<p class='card-text'><strong>Item Created Date:</strong><bold> <strong><samp>     $item_creation_date  </samp></bold></strong>    </p> "  ; 
                  
            echo  "</div>" ;



        echo  "<div class='card-footer row pl-1'>" ;
        

                echo  "<div class='col-lg-6 pt-2 text-left'>"; ?>
                            
                           <?php  /*  if(isLoggedIn()){
                            if(check_customer($_SESSION['username'])){  ?>
                                <a class='font-weight-bold card-link  text-center pr-3 text-left border-success' href='./view_individual_post.php?item_id={$single_id}&like' data-toggle='tooltip' data-placement='top' title='click here to like this'>
                                    <i class='fa-solid fa-heart fa-1x btn pt-1'> Like</i>
                                </a> 
                                <?php } else{ ?>
                                    
                                    <div class='col-lg-6 container-fluid btn'> 
                                        <small class="border border-sm-2 border-dark ">Only customer can like this</small>
                                    </div>
                                    
                                    <?php } } else{ ?>
                                    <div class='col-lg-6 container-fluid btn'> 
                                        <small class="border border-sm-2 border-dark ">You need to <a href="./log_in.php">login</a> to like this item</small>
                                    </div>

                                <?php } ?>  
                                
                           <?php    echo "<samp>  10 </samp>
                                      people liked this  */

                                      echo "<p class='card-text'><strong><bold>Posted By: <samp>   $item_creator </samp> </bold>  </strong> </p> "  ; 
                              

                       echo "</div>"; ?> 
                      <?php  if(isLoggedIn()){ 
                        if($item_status=='Available'){
                        if(check_customer($_SESSION['username'])){ ?>    
                        <div class='col-lg-6 container-fluid pt-1 text-right'>
                             
                            <form class='form-inline' method='POST' role='form'>
                            <input type='number' class='form-control form-control-sm' min='1' name='quantity'  id='number' placeholder='Quantity'>  
                            <input type='hidden' class='form-control' name='item_name' value='<?php echo $item_name;?>' id='number'>  
                            <input type='hidden' class='form-control' name='item_id' value='<?php echo $item_id; ?>' id='number'> 
                            <input type='hidden' class='form-control' name='item_price' value='<?php echo $item_price; ?>' id='number'> 
                            <input type='hidden' class='form-control' name='category_id' value='<?php echo $item_cat_id; ?>' id='category_id'>
                            <button type='submit' class='btn btn-primary btn-sm w-10 ml-2' name='Cart'>Add To Cart</button>
                        </form>



                                
                            
                        </div> 

                        <?php }  else{ ?>
                            <div class='col-lg-6 container-fluid pt-1 text-right'> 
                                <small class="border border-sm-2 border-dark ">Only customer can cart an item</small>
                            </div>
                    
                    <?php } }
                    
                    else { ?>

                        <div class='col-lg-6 container-fluid btn '> 
                            <small class="border border-sm-2 border-dark ">Item is stock out</small>
                        </div>
                    
                    
                    <?php }
                
                
                
                }
                    
                    
                    
                    
                    
                    else{ ?>
                            <div class='col-lg-6 container-fluid pt-1 text-right'> 
                                <small class="border border-sm-2 border-dark ">You need to <a href="./log_in.php">login</a> to cart this item</small>
                            </div>

                        <?php } ?>

                   <?php  echo "<br><br><br>";  
                      //upore <a class='card-link  pt-2 font-weight-bold btn btn-success text-white' href='./view_individual_post.php?item_id={$single_id}&cart_item_id={$item_id}'>
                 //    add to cart
           //  </a>   aita clo  button chng korlam
                    

                     
        echo   "</div>"  ;

        echo  "</div>" ;






?>

<br>




<style>
                   
                        
                     

                    .color-deei:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        letter-spacing: 1px;
                        border: 2px solid green;
                        border-radius: 5px;
                        padding: 5px;
                        
 
                                            
                        
                    }
                    .color-deei{
                        background-color: transparent;
                        background: #cfcfcf;
                    }
                    </style>
                    <style>
                       
                    
                    hr {
                        -webkit-filter: brightness(200%) blur(1px);
                        filter: brightness(200%) blur(1px);
                    }
                    

                    h1,h2,h3,h4,h5,p,.okay {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }
                    .okk {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }


</style>



<?php echo "</div>" ;

echo '<div class="col-lg-3 card text-center bg-transparent text-success font-weight-bold">';
echo '<div class="bg-transparent container-fluid  bg-transparent">';
echo' <h5>Similar Foods</h5> ';
    
    
    $cate = "SELECT post.item_category_id,post.item_id FROM post  WHERE item_id=$item_id" ;
    $newrr=connection($cate);
   

    while($data_next_er_ta =mysqli_fetch_assoc($newrr)){
      
       $item_ccat_id=$data_next_er_ta['item_category_id'];
        
        $cateee = "SELECT * FROM post WHERE item_category_id='$item_ccat_id'  EXCEPT SELECT * FROM post  WHERE item_id=$item_id" ;
        $newrrr=connection($cateee);
        while($data_next_er_ta =mysqli_fetch_assoc($newrrr)){
             $item_iiid=$data_next_er_ta['item_id'];
             $item_ccat_iid=$data_next_er_ta['item_category_id'];
             $item_nnname=$data_next_er_ta['item_name']; 


        echo  "<a class='font-width-bolder text-dark border color-deei  text-center mt-2 mb-2 ml-5 pl-5 pr-5 mr-5 d-block justify-content-center  border-right-3 btn-sm btn-success  mr-1' href='./view_individual_post.php?item_id={$item_iiid}'>
                                                                                    
        <strong> $item_nnname </strong> 
              
  </a>";
    }
    }
      
    echo "<br><br><br>";

    echo '
    <div class="mt-2 bg-transparent">
    
        <form action="./search.php?tags" class="justify-content-center pt-3 card-header" method="POST">
            <div class="form-group mx-sm-3 mb-2 mt-2">
                <h5><strong>Search Another Food <?php echo " "."  : "." " ; ?></strong></h5>
                <input type="text" class="form-control" name="tags" placeholder="search item"><?php echo " " ; ?>
            </div>
            <button type="submit" class="btn  btn-primary pt-1 mb-1" name="search">Search</button>
        </form>
    

    </div>"';


    echo   '</div>'; 

 echo   '</div>
</div>';



    echo "</div>" ;

 }
 }

//sesh card-deck -------------------------



?>




<!-- ::::::::::::::::::::::::::::::    :::::::::::::::::::::::::::::::::::::::::::::::::::;   -->

<br>
<br>
<br>





<!--    Review er kaj kete dissii  -->
<!--
<?php /* if(isLoggedIn()){
    if(check_customer($_SESSION['username'])){  ?>  
<div class="container-fluid pr-5 pl-5">
    <div class="col-lg-10 container-fluid bg-light pl-2   rounded-left rounded-right">
        
            <hr>
            <H1 class='text-center font-italic  border  rounded-left rounded-right'><samp>We are always interested in knowing how our customers feel about our products. Let us know your opinion about this item.</samp></H1>
            <hr>
    </div>
</div>


        <div class="container-fluid justify-content-center">
                <hr>
                <br>  -->

                <!-- review us form er kaj korchi -->

            <!--    <div class="col-lg-7 container-fluid card border border-warning rounded-left rounded-right">
                        <form action="" method="post" class="font-weight-bold text-center">
                            <div class="form-group">
                                
                                <label for="Review" class="display-6 pt-2"><kbd> Review Us: </kbd> </label>
                                <hr>
                                <textarea name="review" class="form-control" id="Review" placeholder="How was the food?" rows="3"></textarea>
                                
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit_review" class="form-control btn btn-primary" value="Send">
                            </div>
                        </form>
 
                </div>

                    <hr>
        </div>
    </div>  -->

    <?php } }  */?>



 <?php INCLUDE "./include/footer.php" ; ?>    