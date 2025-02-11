<?php INCLUDE "include/db.php"; ?>

<?php INCLUDE "./include/header.php" ; ?>


<?php INCLUDE "include/function.php"; ?>

<?php INCLUDE "include/navigation.php"; ?>

<br>


<style>
    

    
    hr {
                        -webkit-filter: brightness(200%) blur(1px);
                        filter: brightness(200%) blur(1px);
                    }
                    

                    h1,h3,h4,.okay {
                        -webkit-filter: brightness(200%) ;
                        filter: brightness(200%) ;
                    }
                    .okk {
                        -webkit-filter: brightness(140%) ;
                        filter: brightness(140%) ;
                    }

</style>

<div class="container-fluid pt-2 float-left ml-1 mr-2 pr-2 background mt-2 border">
    <div class="container-fluid bg-transparent mt-2">
        <h3 class="font-italic text-center card-header font-width-bolder"><strong class="okk">Food Price List</strong></h3>
    </div>
 <br>

        
            
        
            <div class='row container-fluid  bg-transparent ml-2'>
            <div class="container-fluid d-flex  justify-content-center  ">
                <div class="   container-fluid">
                    
                    
                        
                    
                
                
            
                </div>
            </div>       
                         

                
           <div class='card container-fluid  col-lg-6 col-md-6 col-sm-12  bg-transparent pt-3 pl-3 pr-3  pb-5  d-flex justify-content-center'>
            
            
            
                <div class='table-responsive table-responsive-sm pl-3 ml-5 mr-3 pr-5 justify-content-center'> 
               

                          <table class='table table-sm bg-transparent justify-content-center table-hover'> 
                              <thead class=""> 
                                        <tr>
                                        
                                            <th scope='col'>Item Name</th>
                                            <th scope='col'>Item Price</th>                       
                                        </tr>
                                    </thead>
                                    <tbody class="justify-content-center">
                                        
                                        <?php   


                                    if(isset($_POST['submit'])){
                                        $side = true;
                                        $cate_id =$_POST['cat_id'] ;
                                        $category_name_ber_korbo ="SELECT * FROM categories WHERE id= $cate_id";
                                        $connectting =mysqli_query($connect,$category_name_ber_korbo);
                                        while($naam =mysqli_fetch_array( $connectting)) {
                                            $category_er_naam_hoilo =$naam['category_name'];
                                            $category_er_cobi_hoilo =$naam['category_image'];

                                        
                                        }

                                    echo "<h5 class='text-center border border-primary bg-transparent pb-2'>  <strong class='text-success'><samp>  {$category_er_naam_hoilo} </kbd></samp></strong></kbd></h5>";








                    $cate_query ="SELECT * FROM post WHERE item_category_id=$cate_id";
    
                    $cate_query_connect =connection($cate_query); 
                    while($cate_name_ber_kori=mysqli_fetch_array($cate_query_connect)){
            
                        $items_id =$cate_name_ber_kori['item_id'];
                        $items_name =$cate_name_ber_kori['item_name'];
                        $items_price =$cate_name_ber_kori['item_price'];
                       

                        

                                        
                       
   
                                    echo   "<tr'> <td><a class='btn btn-info' href='./view_individual_post.php?item_id=$items_id'>$items_name </a></td>  
                                            <td>$items_price </td> </tr>" ;

                                              }


}
                    
           else  {  
            $category_name_ber ="SELECT * FROM categories WHERE id= 1";
            $connecttingg =mysqli_query($connect,$category_name_ber);
            while($naamm =mysqli_fetch_array( $connecttingg)) {
                $category_er_naamm =$naamm['category_name'];
                $category_er_cobi_hoilo =$naamm['category_image'];
               
            }      
            echo "<h5 class='text-center border border-primary bg-transparent pb-2'>  <strong class='text-success'><samp>  {$category_er_naamm} </samp></strong></kbd></h5>";
   
                   
                    $item_query ="SELECT * FROM post where item_category_id= 1";
                    $item_query_connect =connection($item_query); 
                    while($item_name_ber_kori=mysqli_fetch_array($item_query_connect)){
                        $item_id =$item_name_ber_kori['item_id'];
                        
                        $item_name =$item_name_ber_kori['item_name'];
                        $item_price =$item_name_ber_kori['item_price'];
                       

                       

                                        
                                        
                                    echo   "<tr> <td><a class='btn btn-info' href='./view_individual_post.php?item_id=$item_id'>$item_name </a></td>  
                                            <td>$item_price </td> </tr>" ;

                                              }
                                            }?> 

                                        
                                    </tbody>
                                </table>
               </div>
           
                                        


            

            </div>
            <div class="col-lg-6  bg-transparent"><div class="container-fluid bg-transparent "><div class="card bg-transparent ">
                
            <h5 class="btn btn-lg text-center">
                        <form action="price_list.php" class="form min-vw-100" method="POST">
                                    <div class="form-group  container-fluid">
                                        
                                                <select name="cat_id" id="">







                                                        <option value="1" class="font-italic mt-2 pt-2">Select Desire Food Category</option>

                                                        <?php 
                                                        
                                                        $category_query ="SELECT * FROM categories";
                                                        $category_connect =connection($category_query); 
                                                        while($category_ber_kori=mysqli_fetch_array($category_connect)){
                                                            $category_id =$category_ber_kori['id'];
                                                            
                                                            $category=$category_ber_kori['category_name'];

                                                            echo "<option  value='$category_id'>$category</option>";
                                                        }
                                                        
                                                        ?>

                                                        
                                                    </select>
                                                    <input type="submit" class="btn  btn-success pb-2 mb-1" name="submit" value="search">

                                        </div> 
                   
                        </form>
                    </h5>
            <img class="img-fluid bg-transparent  bg-light" src="./include/item_img/category/<?php echo $category_er_cobi_hoilo; ?>" alt="" srcset=""></div>
            </div> 
           

            </div>
               
           
            
               
            
        
       

    </div>

    <br>
            <br>
            <br>
            <br>
            <br>
            <br>
             

 









    <?php INCLUDE "./include/footer.php"; ?>