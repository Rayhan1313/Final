<?php 
include "include/db.php" ;
global $connect;


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

     
    $kk ="INSERT INTO order_list(order_item_id,ordered_item_name,ordered_item_price,order_status) VALUES($ordered_item_id,'$ordered_item_name',$item_prices,'pending')";
    $connectll= mysqli_query($connect,$kk);
    if($connectll){
        header("Location: ./item_category.php?item_category_id=$ordered_item_caatid");
    }
 

 }