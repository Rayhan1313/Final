<?php ?>





<div class="container-fluid bg-light border mt-2 border rounded-top rounded-left rounded-right rounded-bottom">



<?php


//-----------------------add to cart korle je notification ta dibe tar kaj kortesi   --------------------------  ::::::::::::::::::::: \\

if(isset($connectll)){
   echo "
   <div class='alert alert-warning alert-dismissible fade show w-40' role='alert'>
      <strong>item carted successfully!</strong> <a href='#'>see in card</a>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
   </div> "; 
  // echo $idd = $_GET['cart_item_id'] ;

   $newquery = "SELECT order_status,ordered_item_price FROM order_list WHERE order_status = 'pending'";
   $connn = mysqli_query($connect,$newquery);
   $total = mysqli_num_rows($connn);
   $count =0 ;
   while($data =mysqli_fetch_assoc($connn)){
    $tktotal[$total] =$data['ordered_item_price'];
  
}


//total koto taka seita dekha jabe .....
$queryyy = "SELECT SUM(ordered_item_price) AS total_money FROM order_list WHERE order_status='pending'";
$M =mysqli_query($connect,$queryyy);
while ($values=mysqli_fetch_assoc($M)) {
    $total_value = $values['total_money'];
}
//$num_item = $values['total']; 

//echo "Number of Records Found # ".$num_item;
echo "Total Money ".$total_value ;






} 




 
   
 
?>

<!-- ai porjnto ^| ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
 <!--              ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->










<!--  ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;

                            index page theke navbar er item gula theke get request aikhane catch korsi   
                               
                             ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::  -->




<div class="container-fluid">
    <form action="./search.php" class='form-inline d-flex justify-content-end pt-3' method='POST'>
        <div class='form-group mx-sm-3 mb-2'>
        <input type='text' class='form-control' name='tags' placeholder='search item'>
        </div>
        <button type='submit' class='btn btn-primary mb-2' name='search'>Search</button>
    </form>

</div>
    




<?php 


if(isset($connectll)){
    $newqueryy = "SELECT * FROM post WHERE item_category_id = $category_id";
   $connnt = mysqli_query($connect,$newqueryy);
   
   

    
    












  
// jeita "GET" korsi seita dia akhn database er post table a search korbo      ::::::::::::::::::::::::::::::::::::::::::: 




//-- ---------------------------------------       --------      ------------------------------------------------- --  //

//

$new_row =true ; // row  true kortesi if case er jnne nicher 
$count =0 ; //collam vag er jnno count kortesi max 3 porjnto jbe 0 theke start 


// post page er data gulo ber kore antesi --------------------------------

while($dataa =mysqli_fetch_array($conn)){
    $iddsss = $dataa['item_id'];
    $titless =$dataa['item_name'];
    $category_idss =$dataa['item_category_id'];
    $item_imagess=$dataa['item_image']; 
    $item_descriptionss=$dataa['item_description'];
    $item_pricess=$dataa['item_price'];
    $item_creation_datess=$dataa['item_created_date'];
    $item_creatorss=$dataa['item_creator'];



 //  ------------------------------------------------------------------------


 if($new_row){




    //new card er kaj
    
//echo "<div class='border-success pt-2 pb-3 pl-2 pr-2 justify-content-start col-lg-9'>";

echo "<div class='card-deck border-success ml-1 pt-2 pb-3 pl-4 pr-1 justify-content-center container-fluid'>";

$new_row = false ;
}

//----------------------------------------card suru

echo "<div class='card container-fluid text-center bg-light col-lg-4 pt-2 pl-3'>";

echo  "<div class='card-body'>" ;


echo "<img class='card-img-top' src='./include/item_img/{$item_imagess}' alt='picture dibo pore' height='250px'> "  ;

echo "<p class='card-text'><strong><bold>Item Name : <samp> $item_namess </samp></bold></strong></p>"  ;

echo "<p class='card-text'><strong><bold>Price: <strong>   &#2547;   </strong> <samp>  $item_pricess </samp>  </bold>  </strong>  </p>"  ; 

echo  "</div>" ;    



echo  "<div class='card-footer row pl-1'>" ;



//// akhane item_id namm a get request create korsi ,then view_individual_post page a seita received kormu  \\\\\
echo  "<div class='col-lg-6 pt-1 btn'>

    <a class='font-weight-bold card-link text-warning btn btn-secondary stretched-link text-center pr-3 text-left border-success' href='./view_individual_post.php?item_id={$item_iddsss}'>
       <strong><samp>View details</samp></strong>  
    </a>
    
</div>    
<div class='col-lg-6 container-fluid btn'>



        <a class='card-link btn btn-warning' href='./search.php?cart_item_id={$item_iddsss}'> <strong><samp>add to cart</samp></strong>  

       

        </a>
</div> ";
//uporer 'a 'class a "add to cart" button er link korsi ...  item_category_id={$single_id}&cart_item_id={$item_id} aitay duita parameter dia variable pass korsi ...\\\
//ai page ey get korbe ....



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



?>

<!-- ::::::::::::::::::::::::::::::    :::::::::::::::::::::::::::::::::::::::::::::::::::;   -->





</div>