<?php INCLUDE "include/function.php"; ?>

<?php
global $connect;
function make_query($connect)
{
 $query = "SELECT * FROM post WHERE item_category_id='149' LIMIT 8";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ""; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= "<li data-target='#carouselExampleIndicators' data-slide-to='".$count."' class='active'></li>";
  }
  else{
      $output .= "<li data-target='#carouselExampleIndicators' data-slide-to='".$count."'></li>";
   

  }
  $count = $count + 1;
}
return $output;
}






?>

<?php

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .='<div class="carousel-item active">';
  }
  else{
      $output .='<div class="carousel-item">';
  }

  $output.=       
                  '<img class="d-block w-100 rounded bhai-maf-koren img-fluid" src="./include/item_img/'.$row["item_image"].'" alt="'.$row["item_name"].'">
                        <div class="carousel-caption d-none d-md-block bg-transaprent b">
                              <h4 class="font-weight-bolder fs-1 color"><b class="okk">'.$row["item_name"].'</b></h4>
                              <p class="text-white font-weight-bolder okay h-10 fs-2 okk">'.$row["item_description"].'</p>
                              <p class="okk">
                                    
                            
                                    
                              <a class="btn btn-warning btn-sm "  href="view_individual_post.php?item_id='.$row["item_id"].'">View This Item</a>
                                          
                              </p>
                              <p class="okk">
                                     <a class="btn btn-success" href="/item_category.php?item_category_id=149">View all h-ii-5 Offer</a> <br>
                              </p>
                        </div>
            </div>';


            $count = $count + 1;
      }
      return $output;
     }
   

?>
















<?php INCLUDE "./include/header.php" ; 
 ?>




      <?php INCLUDE "./include/navigation.php" ; ?>
      
      <style>
            marquee{
                  color: #ff00bf;
            }
      </style>

 <br>

 <hr>
 <div class="container-fluid   background  rounded-bottom rounded-left rounded-right mb-1  pt-1 pl-2  mr-1">
            <div class="container-fluid row  pl-1  pt-1   mb-3 mb-2 ml-1 bg-transparent rounded-top rounded-bottom rounded-left rounded-right">
           <!--      
            <marquee class="background font-weight-bolder ml-3 mb-1 text-colors card-header  okk" behavior="" direction="left">Hello Dhaka !!! Welcome to our food service</marquee>
            -->     
                  
                        <hr>    
                  <div class="col-lg-8 bg-transparent container-fluid   rounded-top rounded-bottom rounded-left rounded-right">  
                  

                  
                       



                                  <!-- ekta

                                  thirdparty website er help nisi ,date time dekhanor jnno 
                                  sekhane embeded link create kore dise time ta,
                               source =   'https://24timezones.com/clock-widget/text#widget-code'

                                                            
                              <h1 class="card-header container-fluid background">
                                    <a  href="//24timezones.com/Dhaka/time" style="text-decoration: none" class="clock24" id="tz24-1655415032-c173-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMSIsInNob3dzZWNvbmRzIjoiMSIsInNob3d0aW1lem9uZSI6IjEiLCJ0eXBlIjoiZCIsImxhbmciOiJlbiJ9" title="Dhaka current time" target="_blank" rel="nofollow">
                                                                                          
                                    </a ><script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
                              </h1>  -->
                               <div class="bg-transparent">
                                     <video id="sampleMovie" src="hlw.mp4" class="video-fluid z-depth-1 bg-transparent rounded" height="480px" width="920px" autoplay loop muted></video>

                               </div>  
                               <br>
                               <div class="bg-transparent">
            <hr>
                                    <div class="container-fluid bg-transparent">
                                          
                                          <h2 class="font-weight-bold bg-transparent text-danger ml-5 okk"><strong>Nothing Brings People Together Like Good Foods </strong></h2>
                                    </div> 
                                    <hr>
                                                                               
                              
                  </div>
                  
                       
                               
                        <br>
                        <br>


                  <div class="container-fluid bg-transparent ">
                      <img class="img-fluid ml-3" height="120" width="700" src="./img/YOOO.png" alt="pic">

                                          
                  </div>

                  <br>
                  <br>
                  
                  

                 

                                          
            </div>
                                                


                              <hr>
                        <div class="col-lg-4  container-fluid bg-transparent rounded-left text-center  rounded-right rounded-top rounded-bottom ">
                        
                              <!--  form rakhsilam kete disi 
                        :::::::::::::::::::::::::::::::::::::::::::::::::::::
                        ::::::::::::::::::::::::::::::::::::::::::::::::
                        
                        
                        
                        
                        
                        -->
                        <?php // if(!isLoggedIn()): ?>
                          <!--    <div class="justify-content-center background text-center border rounded-left border-secondary border-2 rounded-right rounded-top rounded-bottom mr-2">
                                                      <h3 class="font-italic font-weight-bold text-white  text-center mr-5 ml-5  pl-1 mt-4 pr-3 pl-2"><samp><strong><bold><kbd>Log In</kbd></bold></strong></samp></h3>
                                    <div class="justify-content-center align-items-center text-center ml-3 pt-3">
                                          <form action="./include/log_in.php" method="POST" class="form d-block justify-content-center w-70 ml-3" id="">
                                                <div class="form-group pt-3 ml-5 text-center justify-content-center">
                                                      <label class="mr-5 pr-5" for="email"><samp>Enter your email :</samp></label>
                                                      <input type="email" name="email" class="form-control text-center form-control-sm ml-5 pl-3 pl-3 pr-4 w-50 " placeholder="someone@email.com" id="email">
                                                </div>
                                                <div class="form-group ml-5">
                                                      <label class="mr-5 pr-5" for="password"><samp>Enter your password :</samp></label>
                                                      <input type="password" name="password" class="form-control form-control-sm ml-5 pl-5 pr-5 w-50 " placeholder="Password" id="password">
                                                </div>
                                                <div class="form-group text-left ml-5 w-50 pl-5">
                                                      <button type="submit" class="btn btn-sm btn-success ml-5  mr-5 w-50 " name="login">Log In</button>
                                                      
                                                     
                                                </div>
                                                <p class="text-center  mr-5 pr-5 ml-4 pl-3 badge  ">Don't have an account ? <a class="card-link stretched-link" href="./sign_up.php"> click here for signup</a></p>
                                          

                                                

                                          </form>
                                          
                                          
                                          
                                    </div>
                                    
                             </div>

                        -->
                             <?php // endif ; ?>   









                                            
                                                <form action="./search.php" class='form-inline  justify-content-center ml-1 pl-1   mb-1  card-header  border border-2 row' method='POST'>
                                                
                                                      <div class='form-group col-lg-8 mx-sm-3 mb-2 mt-2 ml-5 pl-5 container-fluid'>
                                                            <h3 class="font-italic font-weight-bold text-success text-justify pl-2 ml-4 okk">Search Item</h3> 
                                                            <br>
                                                      
                                                            <input type='text' class='form-control' name='tags' placeholder='type a food name....'>
                                                      </div>
                                                      <div class='form-group col-lg-4 mx-sm-3 mb-2 mt-1 ml-5 pl-5sss container-fluid'>
                                                            <button type='submit' class='btn  btn-primary pt-1 mb-1 ml-4' name='search'>Search</button>
                                                      </div>
                              
                                                </form>
                                                      
                   
                                          
                                          <hr>

                                          <br>   
                                          

                        


                                          
                <style>
                   
                        
                     

                    .color-deei:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        letter-spacing: 4px;
                        border: 2px solid green;
                        border-radius: 5px;
                        padding: 5px;
                        
 
                                            
                        
                    }
                    .color-deei{
                        background-color: transparent;
                        background: #cfcfcf;
                    }

                    .color-deei-button:hover{
                        color: black;
                        background: #f2f3f4;
                        background-color: #b3ecff;
                        
                        
                        border: 2px solid green;
                        border-radius: 5px;
                        padding: 5px;
                    }


                    .color{
                        color: #ff0080;
                    }
                    .carosol-heading-color{
                        color: #ff4000;
                    }

                    hr,h1,h3,h5,.okay {
                        -webkit-filter: brightness(200%) blur(1px);
                        filter: brightness(200%) blur(1px);
                    }
                    .okk {
                        -webkit-filter: brightness(130%) ;
                        filter: brightness(130%) ;
                    }
                    .edit-kori{
                        max-width: auto;
                        max-height:330 px;

                    }

                    
                    </style>











                               
                                   <hr><hr> <div class="container-fluid bg-transparent rounded-left rounded-right rounded-top mb-3 ml-2 pl-2 mb-5 pb-5 rounded-bottom border">
                                          <h3 class="text-dark font-weight-bold text-center mt-2 ml-5 mr-5  okk"><b class="text-success">Popular items</b></h3>
                                          <br>
                                                <?php   
                                                //category table theke item gulo ber kore antesi 
                                                                  $new = "SELECT * FROM categories";
                                                                  $fetchi =mysqli_query($connect,$new);
                                                                  while($select =mysqli_fetch_assoc($fetchi)) { 
                                                                  $id =$select['id'];
                                                                  $rayhan=$select['category_name'];  //nicher a class a bb chilo.kete disi.....
                                                                        echo "
                                                                              <a class='font-width-bolder border  text-center mt-2 mb-3 mb-2 ml-5 pl-5 pr-5 mr-5 d-block justify-content-center  border-right-3 btn-sm color-deei  mr-1 text-dark  ' href='./item_category.php?item_category_id={$id}'>
                                                                                    
                                                                                    <i><b class=''> $rayhan </b> </i>
                                                                                          
                                                                              </a>
                                                                        " ;
                                                                        } 

                                                                  
                                                      ?>
                                    </div>        
                             
                        
            
        


            
      </div>
                        
                  <div class="container-fluid  mb-3  bg-transparent ml-5 bg-transparent edit-kori">
                             <div class="container-fluid row  mb-3  bg-transparent ml-2"> 
                                                                                                                                          <!--     <hr>
                                    <h1 style="color:#800000;" class="text-center  font-weight-bold font-italic  rounded-top rounded-bottom mt-5 pt-5 rounded-right rounded-left"><strong><bold>Food Quotes by Famous peoples</bold></strong></h1>
                                    <hr>
                                    <br>
                              

                        

                                    
                              

                              

                                    <div class="col-lg-4 container-fluid  ml-5 border rounded bg-primary border-dark border-1">
                                          <p class=""><samp>People who love to eat are always the best people.</samp> <br><small class="mt-3 pt-3"> – Julia Child</small> </p><hr>
                                          <div class="clearfix-top"></div>
                                          <p><samp>Tasty food and good things are always complex to prepare but give more happiness afterward, so be in patience, and just do your job. </samp><br> <small>–SumithRawal</small> </p>
                                          <hr>
                                          <p><samp>You don’t need a silver fork to eat good food.</samp> <br><small> –Paul Prudhomme</small> </p>
                                    </div>
                                    <div class="col-lg-4  container-fluid border mr-5 rounded bg-info  border-dark border-1">
                                          <p class=""><samp>Hard work should be rewarded by good food.</samp> <br><small class="mt-3 pt-3">– Ken Follett</small> </p><hr>
                                          <div class="clearfix-top"></div>
                                          <p><samp>The food you eat can be either the safest and most powerful form of medicine or the slowest form of poison .</samp> <br> <small> –Ann Wigmor</small> </p>
                                          <hr>
                                          <p><samp>There is no sincere love than the love of food.</samp> <br><small>– George Bernard Shaw</small> </p>
                                    </div>
                                    <div class="col-lg-4  container-fluid border rounded bg-success  border-dark border-1">
                                          <p class=""><samp>The doctor of the future will no longer treat the human frame with drugs, but rather will cure and prevent disease with nutrition. </samp> <br><small class="mt-3 pt-3"> –Thomas Edison</small> </p><hr>
                                          <div class="clearfix-top"></div>
                                          <p><samp>I love fresh fruit and vegetables. I’m not a strict dieter. I don’t think that anything in life should be so regimented that you’re not having fun or can’t enjoy it like everybody else. Just know that fresh food is always going to be better for you. </samp><br> <small> –Carrie Ann Inaba</small> </p>
                                          <hr>
                                          <p><samp>Desserts are like mistresses. They are bad for you. So if you are having one, you might as well have two.</samp><br><small> –Alain Ducass. </small> </p>
                                    </div> -->

                              
                              
                                








                                    
                              <div id="carouselExampleIndicators" class="carousel slide bg-transparent" data-ride="carousel">
                                    <h4 class="text-center  font-weight-bolder  carosol-heading-color  okk bg-transparent"><b class="okk"><hr> (  RT hii5 Offer !!!  )<hr></b></h4>
                                    
                                      <ol class="carousel-indicators">
                                          <?php echo make_slide_indicators($connect); ?>
                                    </ol>
                                    
                                    <div class="carousel-inner  bg-transparent">
                                          <?php echo  make_slides($connect); ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                    </a>
                              </div>
                              <br>
                              

                              
                              <div class="container-fluid"><br>
                              <br>
                              <br>
                              
                                    <h4 class="text-center font-italic mr-3 okk">Eat good foods and be healthy</h4>
                                    <br>

                              </div>      

                              <div class="container-fluid float-center ml-5 pl-5">
                                    <br>
                                    
                                    <img class="img-fluid float-center ml-5 pl-5" height="120" width="700" src="./img/juice.png" alt="pic">
                              
                              </div>



                        </div> 



















                              
                              <div class="container-fluid  d-block justify-content-right ml-5 pl-5">
                                 <!--   <img class="img-fluid float-right" height="70" width="400" src="./img/bg.png" alt="pic">
                                    <br>
                                                                  -->
                              
                              </div>
                             
            </div>
             <hr>
                  <!--<div class="container-fluid text-right">
                    <a href="./"><small class="d-block justify-content-right font-weight-bold text-dark">&copy; 2022  RT Food Delivery   </small></a>
                    <br>
            <br>
            <br>
      
            <br>         
                  </div> -->
             
         
                
            </div>
            
            
                  


 </div>
 





                        
                            
   
            


        
    






 <?php INCLUDE "./include/footer.php" ; ?>    