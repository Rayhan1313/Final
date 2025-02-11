<?php INCLUDE "./include/function.php"; ?>
<?php INCLUDE "./include/header.php" ; 


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
    
 

 }







?>


<!-- 
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

       add to cart korle (get reguest ta paile aita kaj korbe ,"get request nicchi add-to-cart button theke") aita database a pathabo akhn 
                              
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::---->

       <?php 


if(ifItIsMethod("Post")){
    $tags= $_POST['tags']; ?>



<?php 

//navigation aitar 

INCLUDE "./include/navigation.php" ; ?>




<?php

if(($connectll)){

// header("Location: ./item_category.php?item_category_id=$ordered_item_caatid");


echo"

<div class='alert alert-warning alert-dismissible fade show w-50 float-left mt-3' role='alert'>
<strong>item carted successfully!</strong> <a href='./admin/cart.php'>see in card</a>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div> 

";
//header( 'refresh: 2; url=./item_category.php?item_category_id={$ordered_item_caatid}' );    
}  ?>
           
<div class="container-fluid background border mt-1 border rounded-top rounded-left rounded-right rounded-bottom">


<!-- ai porjnto ^| ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
 <!--              ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->










<!--  ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;

                            index page theke navbar er item gula theke get request aikhane catch korsi   
                               
                             ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->




                             <div class="container-fluid  bg-transparent  pt-2 mb-1">
                                    
                                            <form action="./search.php?tags" class='form-inline d-flex justify-content-center pt-2 bg-transparent' method='POST'>
                                                <div class='form-group mx-sm-3 mb-2 mr-4'>
                                                    <h1><strong>Search Item <?php echo " "."  : "." " ; ?></strong></h1>
                                                    <input type='text' class='form-control' name='tags' placeholder='search item' value='<?php echo isset($_POST['tags'])? $_POST['tags'] : '' ; ?>'>
                                                </div>
                                                <button type='submit' class='btn btn-sm  btn-primary pb-2 mb-2' name='search'>Search</button>
                                            </form>
                                        


                             </div>
 
                             <hr>
    






    <?php
  // ai page er category name ber korteesi  uporey use korsi first a h1 class er vitore   ......
    $category_nitesi = "SELECT * FROM post WHERE  item_tags like '%$tags%' " ;
    $connectting =mysqli_query($connect,$category_nitesi);
    $counttt=mysqli_num_rows($connectting); ?>










<?php
if($counttt <1){
    echo "<div class='container-fluid col-lg-12'> <h3 class='text-center'>no item found
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

    
    </h3> </div>" ;
}
    else{
        
    
   

  
// jeita "GET" korsi seita dia akhn database er post table a search korbo      ::::::::::::::::::::::::::::::::::::::::::: 




//-- ---------------------------------------       --------      ------------------------------------------------- --  //

//

$new_row =true ; // row  true kortesi if case er jnne nicher 
$count =0 ; //collam vag er jnno count kortesi max 3 porjnto jbe 0 theke start 


// post page er data gulo ber kore antesi --------------------------------

while($datagula =mysqli_fetch_array( $connectting)) {
    
   


 $item_id=$datagula['item_id'];
 $item_category_id=$datagula['item_category_id'];
 $item_name=$datagula['item_name']; 
 $item_image=$datagula['item_image']; 
 $item_description=$datagula['item_description'];
 $item_price=$datagula['item_price'];
 $item_status=$datagula['status'];
 $item_tags=$datagula['item_tags'];
 $item_creation_date=$datagula['item_created_date'];
 $item_creator=$datagula['item_creator'];

 //  ------------------------------------------------------------------------


 if($new_row){




    //new card er kaj
    
//echo "<div class='border-success pt-2 pb-3 pl-2 pr-2 justify-content-start col-lg-9'>";

echo "<div class='card-deck border-success  pt-2 pb-3 ml-1 pl-1 justify-content-center container-fluid'>";

$new_row = false ;
}

//----------------------------------------card suru

echo "<div class='card container-fluid text-center bg-transparent col-lg-4 pt-2 pl-3'>";

echo  "<div class='card-body'>" ;


echo "<img class='card-img-top' src='./include/item_img/{$item_image}' alt='picture dibo pore' height='250px'> "  ;

echo "<p class='card-text'><strong><bold>Item Name : <samp> $item_name </samp></bold></strong></p>"  ;

echo "<p class='card-text'><strong><bold>Price: <strong>   &#2547;   </strong> <samp>  $item_price </samp>  </bold>  </strong>  </p>"  ; 

echo  "</div>" ;    



echo  "<div class='card-footer row pl-1'>" ;



//// akhane item_id namm a get request create korsi ,then view_individual_post page a seita received kormu  \\\\\
echo  "<div class='col-lg-6 pt-1 btn'>

    <a class='font-weight-bold card-link text-warning btn btn-secondary stretched-link text-center pr-3 text-left border-success' href='./view_individual_post.php?item_id={$item_id}'>
       <strong><samp>View Details</samp></strong>  
    </a>
    
</div> ";  ?>


<?php

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
<?php } }

else { ?>

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



<!-- 
<div class='col-lg-6 container-fluid btn'> 
        <a class='card-link btn btn-warning' href='./item_category.php?item_category_id=$item_category_id&cart_item_id=$item_id'> <strong><samp>add to cart</samp></strong>  
        </a>
</div> ";
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

}














}


?>


<!-- ::::::::::::::::::::::::::::::    :::::::::::::::::::::::::::::::::::::::::::::::::::;   -->





</div>

</div>



                      
                            
<br>
<br>
<br>

            


        
    






 <?php INCLUDE "./include/footer.php" ; ?>    