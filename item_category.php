<?php INCLUDE "./include/function.php"; ?>
<?php INCLUDE "./include/header.php" ; 

global $connect;

?>


<!-- 
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

       add to cart korle (get reguest ta paile aita kaj korbe ,"get request nicchi add-to-cart button theke") aita database a pathabo akhn 
                              
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::---->

<?php 
/*

 if(isset($_GET['item_category_id']) && isset($_GET['cart_item_id'])){
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

   
   
   
   

       
   }  */
 
   




?>





<?php


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
       // header("Location: ./item_category.php?item_category_id=$ordered_item_caatid");
      
    }
 

 }

 ?>
<?php 

//navigation aitar 

INCLUDE "./include/navigation.php" ; ?>

           
<div class="container-fluid background border  border  rounded-top rounded-left rounded-right rounded-bottom mt-5 pt-4">



<?php


/* 
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

       add to cart korle (get reguest ta paile aita kaj korbe ,"get request nicchi add-to-cart button theke") aita database a pathabo akhn 
                              
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::---->   */
//add to cart update version ------------

 
?>





<?php


//-----------------------add to cart korle je notification ta dibe tar kaj kortesi   --------------------------  ::::::::::::::::::::: \\

if(isset($connectll)){
   
  // echo $idd = $_GET['cart_item_id'] ;

   $newquery = "SELECT order_status,ordered_item_price FROM order_list WHERE order_status = 'pending'";
   $connn = mysqli_query($connect,$newquery);
   $total = mysqli_num_rows($connn);
   $count =0 ;
   while($data =mysqli_fetch_assoc($connn)){
    $tktotal[$total] =$data['ordered_item_price'];
  
}


//total koto taka seita dekha jabe .....
$queryyy = "SELECT SUM(total_price) AS total_money FROM order_list WHERE order_status='pending'";
$M =mysqli_query($connect,$queryyy);
while ($values=mysqli_fetch_assoc($M)) {
    $total_value = $values['total_money'];
}
//$num_item = $values['total']; 

//echo "Number of Records Found # ".$num_item;
echo "Total Money ".$total_value ;

echo"

<div class='alert alert-warning alert-dismissible fade show w-50 float-left mt-5 mb-3' role='alert'>
   <strong>item carted successfully!</strong> <a href='./admin/cart.php'>see in card</a>
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
       <span aria-hidden='true'>&times;</span>
   </button>
</div> 

";



} 
 
   
 
?>

<!-- ai porjnto ^| ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
 <!--              ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->










<!--  ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;

                            index page theke navbar er item gula theke get request aikhane catch korsi   
                               
                             ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->



<?php 


if(isset($_GET['item_category_id'])){
    $single_id= $_GET['item_category_id'];
}
  // ai page er category name ber korteesi  uporey use korsi first a h1 class er vitore   ......
    $category_name_ber_korbo ="SELECT * FROM categories WHERE id=$single_id";
    $connectting =mysqli_query($connect,$category_name_ber_korbo);
    while($naam =mysqli_fetch_array( $connectting)) {
        $category_er_naam_hoilo =$naam['category_name'];
       
    }




?>
<div class="container-fluid  bg-transparent  pt-3   mb-1">
    
        <form action="./search.php?tags" class='form-inline d-flex justify-content-center pt-3 bg-transparent mt-1' method='POST'>
            <div class='form-group mx-sm-3 mb-2 mt-2 mr-4'>
                <h1><strong>Search Item <?php echo " "."  : "." " ; ?></strong></h1>
                <input type='text' class='form-control' name='tags' placeholder='search item'><?php echo " " ; ?>
            </div>
            <button type='submit' class='btn  btn-primary btn-sm pb-2' name='search'>Search</button>
        </form>
        </div>



 
<hr>   

<style>
                       hr {
                        -webkit-filter: brightness(200%) blur(1px);
                        filter: brightness(200%) blur(1px);
                    }
                    

                    h1,h3,h4,.okay {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }
                    .okk {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }


</style>







<?php


//category name hide korsi nicher echo te  


 //  echo "<h1 class='text-center border border-primary rounded-left rounded-right bg-transparent ml-7 ml-5 pr-1 mr-5 pl-1 pb-2 mt-2'> <kbd>Category: <strong class='text-warning '><samp><kbd>  {$category_er_naam_hoilo} </kbd></samp></strong></kbd></h1>";

// jeita "GET" korsi seita dia akhn database er post table a search korbo      ::::::::::::::::::::::::::::::::::::::::::: 


$category_nitesi = "SELECT * FROM post WHERE item_category_id='$single_id'" ;
$new=connection($category_nitesi);

//-- ---------------------------------------       --------      ------------------------------------------------- --  //

//

$new_row =true ; // row  true kortesi if case er jnne nicher 
$count =0 ; //collam vag er jnno count kortesi max 3 porjnto jbe 0 theke start 


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

 //  ------------------------------------------------------------------------


 if($new_row){




    //new card er kaj
    
//echo "<div class='border-success pt-2 pb-3 pl-2 pr-2 justify-content-start col-lg-9'>";

echo "<div class='card-deck border-success  pb-3 pl-5 pr-3 justify-content-center container-fluid'>";
?>



<?php
$new_row = false ;
}

//----------------------------------------card suru

echo "<div class='card container-fluid text-center bg-transparent col-lg-4 pt-2 pl-1'>";

echo  "<div class='card-body'>" ;


echo "<img class='card-img-top' src='./include/item_img/{$item_image}' alt='picture dibo pore' height='250px'> "  ;

echo "<p class='card-text'><strong><bold>Item Name : <samp> $item_name </samp></bold></strong></p>"  ;

echo "<p class='card-text'><strong><bold>Price: <strong>   &#2547;   </strong> <samp>  $item_price </samp>  </bold>  </strong>  </p>"  ; 

echo  "</div>" ;    



echo  "<div class='card-footer row ml-1 container-fluid'>" ;



//// akhane item_id namm a get request create korsi ,then view_individual_post page a seita received kormu  \\\\\
echo  "<div class='col-lg-6 pt-1 btn'>

    <a class='font-weight-bold card-link text-warning btn btn-secondary stretched-link text-center pr-3 text-left border-success' href='./view_individual_post.php?item_id={$item_id}'>
       <strong><samp>View details</samp></strong>  
    </a>
    
</div>    " ;

 if(isLoggedIn()){
    if($item_status=='Available'){
    if(check_customer($_SESSION['username'])){ ?>
<div class='col-lg-6 container-fluid  row'>




<samp><form class='form-inline' method='POST' action=''>
    <input type='number' class='form-control form-control-sm' min='1' name='quantity'  id='number' placeholder='Quantity'>  
    <input type='hidden' class='form-control' name='item_name' value='<?php echo $item_name; ?>' id='number'>  
    <input type='hidden' class='form-control' name='item_id' value='<?php echo $item_id; ?>' id='number'> 
    <input type='hidden' class='form-control' name='item_price' value='<?php echo $item_price; ?>' id='number'> 
    <input type='hidden' class='form-control' name='category_id' value='<?php echo $item_cat_id; ?>' id='category_id'>
    <button type='submit' class='btn btn-primary btn-sm w-100' name='Cart'>Add To Cart</button>
</form>
</samp>
     
</div>  

<?php } else{ ?>
<div class='col-lg-6 container-fluid btn '> 
        <small class="border border-sm-2 border-dark ">Only Customer can cart an item</small>
    </div>
<?php }}

else{ ?>

    <div class='col-lg-6 container-fluid btn '> 
        <small class="border border-sm-2 border-dark ">Item is stock out</small>
    </div>


<?php }





} 
else{ ?>
    
    <div class='col-lg-6 container-fluid btn '> 
        <small class="border border-sm-2 border-dark ">You need to <a href="./log_in.php">login</a> to cart this item</small>
    </div>


 <?php } ?> 


<!--aita main uporeer class er jnne korsi
//<a class='card-link btn btn-warning' href='./item_category.php?item_category_id={$single_id}&cart_item_id={$item_id}'> <strong><samp>add to cart</samp></strong>  </a>

/*   */ 






//uporer 'a 'class a "add to cart" button er link korsi ...  item_category_id={$single_id}&cart_item_id={$item_id} aitay duita parameter dia variable pass korsi ...\\\
//ai page ey get korbe ....

 -->
 <?php

echo   "</div>"  ; 


echo "</div>" ;

//sesh card-deck -------------------------



$count ++ ;

if($count ==3){



echo "</div>" ;



//----------------frst jekhane new row false hoichio seta sesh korlam




$new_row = true;
$count =0;
}


}

?>

<!-- ::::::::::::::::::::::::::::::    :::::::::::::::::::::::::::::::::::::::::::::::::::;   -->






</div>


<br>
<br>
<br>



                      
                            
   
            


        
    






 <?php INCLUDE "./include/footer.php" ; ?>    