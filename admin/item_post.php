<?php 
INCLUDE "admin_page/db.php" ;

ob_start();


global $connect; ?>
<?php include "admin_page/header.php" ;?>

<?php 
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
            
              
          <?php 
          if(isset($_GET['source'])){
            $source = $_GET['source'] ;
          }
          else{
            $source ='' ;
          }
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
            include "view_post.php" ;
            break;
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
          









<?php include "admin_page/footer.php" ;?>