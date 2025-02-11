<?php 
INCLUDE "admin_page/db.php" ;

ob_start();

global $connect;

if(isset($_POST['hahaa'])){
  $akhon_item_er_id=$_POST['item_er_id'];
  $staat=$_POST['staat'];

  $QQQ=mysqli_query($connect,"UPDATE post SET status='$staat' WHERE item_id='$akhon_item_er_id'");
  header("Location: item_post.php");

}






global $connect; ?>
<?php include "admin_page/header.php" ;?>

<?php 

if(isset($_POST['search'])){
    $tags= $_POST['tags']; 


if(!isset($_GET['source'])){
?>

<div id="wrapper" class="background ">






  <div class="container-fluid justify-content-md-center background mb-5" id=page-wrapper>
    
<?php include "admin_page/navigation.php" ;?>
  
  
        <div class="container-fluid bg-transparent row align-items-start  pl-2  ">
          <div class="container-fluid col-lg-12 ml-auto pl-2 bg-transparent">
          <div class="card container-fluid  ml-4 mr-5 bg-transparent">
              <ol class="breadcrumb  pl-auto bg-transparent">
                <li class="mt-2 text-dark pt-2"><a class="text-dark" href="./index.php"> <i class="fab fa-ubuntu"> <small> System</small> </i></a></li>
                <li class="mt-2 text-dark pt-2"> <a class="text-dark" href="item_post.php"><i class="fa-solid fa-jar">  <small>  Items</small>  </i></a></li>
                <div class="ml-5 mt-2 text-dark pt-2 float-right text-right d-block justify-content-right">
                  <li class="ml-5 pt-1 text-dark pl-5 "> <a class="ml-5 pl-5 text-dark" href="./item_post.php?source=add_posts"><i class="fa-solid fa-circle-plus">  <small>  add item</small></i> </a></li>
                </div>
                
              </ol>
            </div>
           
                <div class="container-fluid bg-transparent ml-3 border">
                    <div class="ml-5 mt-2 text-dark pt-2 d-block justify-content-center " >
                        <form action="item_search_admin.php?tags" method="post" class='form d-block justify-content-center'>
                            <div class='form-group row d-block justify-content-center'>
                                
                                <input type='text' class='form-control col-lg-6' name='tags' placeholder='search item'><?php echo " " ; ?>
                            
                                <button type='submit' class='btn  btn-primary btn-md pb-2 col-lg-2' name='search'>Search</button>
                            </div>
                        </form>
                    </div>
            <div class="container-fluid card col-md-12 mt-4 bg-transparent">




    

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


               $rules ="SELECT * FROM post WHERE item_tags LIKE '%$tags%'"; 
               
                $news =mysqli_query($connect,$rules) ;
                while($view=mysqli_fetch_assoc($news)){
                  $item_id =$view['item_id'];
                  $item_category_id=$view['item_category_id'];
                  
                  
                  $item_name =$view['item_name'];
               
                  $item_image =$view['item_image'];

                  $item_price=$view['item_price'];
             
                  $status=$view['status'];
                  $item_creator=$view['item_creator'];
                  
                  
                 

                  echo "<tr class='container-fluid'>" ;
?>

            
<?php


                  echo "<td><samp>{$item_id}</samp></td>";


                  echo "<td class='btn-copy-code'><samp>{$item_name}</samp></td>";
                  $ruled =mysqli_query($connect,"SELECT * FROM categories WHERE id='$item_category_id'"); 
                  while($cate=mysqli_fetch_assoc($ruled)){
                    $cat_id =$cate['id'];
                    $category_name =$cate['category_name']; 
                  }
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
              
            
              
           }
         else {
            $source = $_GET['source'] ;
          
          
          switch($source){
            case 'add_posts' ;
            include "item_add_post.php";
            break ;

            case 'edit_posts' ;
            include "edit_item_post.php";
            break ;
            case 'delete' ;
            include "view_post.php";
            break ;

            

            default :
            include "item_search_admin.php" ;
            break;
          }
        }
          ?>
          
          


            </div>
        </div>
          </div>
        </div>  
        
        
      
  </div>
  <br>
          <br>
          <br>
          <br>
          









<?php 
}
include "admin_page/footer.php" ;?>