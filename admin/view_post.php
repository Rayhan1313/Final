<?php
global $connect;

if(isset($_POST['hahaa'])){
  $akhon_item_er_id=$_POST['item_er_id'];
  $staat=$_POST['staat'];

  $QQQ=mysqli_query($connect,"UPDATE post SET status='$staat' WHERE item_id='$akhon_item_er_id'");
}

?>

<div class="container-fluid background mt-1 mb-2">
        
             
             
<table class="table table-hover table-borderless card-body container-fluid mt-2 border rounded-top rounded-bottom">    
                <tr class="text-danger bg-white container-fluid  rounded-top rounded-bottom">
                 
                  <th>Id</th>
                  
                  <th>Item Name</th>
                  <th>Category_name</th>
                  <th>Item Image</th>
                  <th>Item Price</th>
                  <th>Status</th>
                  <th>Item Creator</th>
                  
                  <th>View Item</th>
                  <th>Set Status</th>
                  
                  <th>Edit</th>
                  <th>Delete</th>
                
                </tr>
                <tbody>

                <?php 


               $rules ="SELECT post.item_id,post.item_category_id,post.item_name,post.item_image,post.item_price,post.status,post.item_created_date,post.item_creator, "; //DUITA TABLE CONNECT KORSI LEFT JOIN DIA. 1ST A TABLE NAME THEN DOT THEN OITABLE ER COLUMN NAME

               $rules .="categories.id, categories.category_name ";
               $rules .=" FROM post "; 
               $rules .=" LEFT JOIN categories ON post.item_category_id = categories.id"; // LEFT JOIN CATEGORIES A KARON AMADER MAIN TABLE HOITASE POST ,POST AGA THN CAT.
              
                $news =mysqli_query($connect,$rules) ;
                while($view=mysqli_fetch_assoc($news)){
                  $item_id =$view['item_id'];
                  $item_category_id=$view['item_category_id'];
                  
                  
                  $item_name =$view['item_name'];
               
                  $item_image =$view['item_image'];

                  $item_price=$view['item_price'];
             
                  $status=$view['status'];
                  $item_creator=$view['item_creator'];
                  
                  $category_name =$view['category_name'];
                  $cat_id =$view['id'];

                  echo "<tr class='container-fluid'>" ;
?>

            
<?php


                  echo "<td><samp>{$item_id}</samp></td>";


                  echo "<td class='btn-copy-code'><samp>{$item_name}</samp></td>";
                  echo "<td><samp>$category_name</samp></td>" ;
      


                 
                  
                  
                  
                




                 
                  
                 
                  
                  
                  echo "<td><img class='img-thumbnail' width='60' height='40' src='../include/item_img/{$item_image}' alt='img'></td>";
                  echo "<td><samp>{$item_price}</samp></td>";
                  echo "<td><samp>{$status}</samp></td>";
                  echo "<td><samp>{$item_creator}</samp></td>";
                 
                  echo "<td><a class='btn btn-sm btn-warning mt-1' target='_blank' href='../view_individual_post.php?item_id={$item_id}'><i class='fa-solid fa-eye'> </i> View Post</a></td>";
               

                  echo "<td>
                  
                  <form role='form' method='POST' class='form'>
                    <div class='form-group row'>
                    <input type='hidden' name='item_er_id' value='$item_id'>
                      <select name='staat' id='' class='col-lg-8'>
                          <option value='$status'>$status</option>
                          <option value='Available'>Available</option>
                          <option value='Unavailable'>Unavailable</option>
                      </select>
                      <button type='submit' name='hahaa' class='col-lg-4 btn btn-secondary'>submit</button>
                    </div>
                    
                  </form>
                  
                  
                  
                  </td>";


                 
                  echo "<td ><a class='btn btn-sm btn-info mt-1' target='_blank'  href='item_post.php?source=edit_posts&p_id={$item_id}'><i class='fa-solid fa-pen-to-square'> </i> Edit</a></td>";

                   echo"<td><a onClick=\"javascript: return confirm('Are you sure to delete?') \";  class='btn btn-sm btn-danger text-center mt-1'  href='item_post.php?delete={$item_id}'><i class='fa-solid fa-trash-can'></i></a></td>"

                   
                ?>
                

                <?php




                  
                  
                  
                  echo "</tr>";

                  
                
                
                  }
                
                
                
                
                
                ?>
                 
                </tbody>
              </table>
                           

                           </div>         

              <?php global $connect; ///delete
              if(isset($_GET['delete'])){
                $item_id =$_GET['delete'] ;
                $del_query ="DELETE FROM post WHERE item_id=$item_id" ;
                $delete =mysqli_query($connect,$del_query);
                if(!$delete){
                  die("Connection Failed ". mysqli_error($connect));
                }  
                else{
                  header("Location: item_post.php");
                }
                  
            }
              