 

<table class="table  card-body  table-hover table-borderless   border rounded-top rounded-bottom"><hr>
  <h5 class="text-center">Admin List</h5>
                <tr class="text-dark bg-white   rounded-top rounded-bottom">
                  <th>Id</th>
                  
                 
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <!--  <th>Image</th> -->
                  
                  <th>Role</th>
                  <th>Set  as admin</th>
                  <th>Set  as moderator</th>
                  <th>Set  as customer</th>
                  <th>Set  as delivery man</th>
                  
                  
                  <th>Edit profile</th>
                  <th>Delete</th>
                </tr>
                <tbody>

                <?php 
                
                    
                 $rules ="SELECT  *   FROM users  WHERE user_role='admin' ORDER BY user_id DESC";
                 
                $news =mysqli_query($connect,$rules) ;
                while($view=mysqli_fetch_assoc($news)){
                    $db_id =  $view['user_id'];       
                    $db_user_firstname =  $view['first_name'];
                    $db_user_lastname =  $view['last_name'];
                    $db_username =  $view['username'];
                    $db_user_mobile_number =  $view['mobile_number'];
                    $db_user_email =  $view['email'];      
                    $db_user_image =  $view['user_image'];
                 /*   $db_user_house_no =  $view['house_no'];
                    $db_user_street =  $view['street'];
                    $db_user_city =  $view['city'];
                    */
                    $db_user_password =  $view['password'];
                   
                    $db_user_role =  $view['user_role'];
                    $db_user_status =  $view['status'];
                  
                  

                  echo "<tr>" ;
                  echo "<td>{$db_id }</td>";
                 
                  echo "<td>{$db_username}</td>";
                  echo "<td>{$db_user_email}</td>";
                  echo "<td>0{$db_user_mobile_number}</td>";
                //  echo "<td><img class='img-thumbnail' width='60' height='40' src='../img/{$db_user_image}' alt='img'></td>";
             //     echo "<td>{$db_user_addresses}</td>";
                  echo "<td><a  class='btn btn-success text-white font-weight-bolder'>{$db_user_role}</a></td>";


                
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_admin={$db_id}'> Admin</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_moderator={$db_id}'>Moderator</a></td>";
                  echo "<td><a  class='btn btn-secondary' href='users.php?change_role_customer={$db_id}'>Customer</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_delivery_man={$db_id}'>Delivery man</a></td>";
                  echo "<td><a class='btn btn-warning' target='_blank' href='users.php?source=edit_users&edit_user={$db_id}'><i class='fa-solid fa-user-pen'> </i> Edit </a></td>";
                  /* nicher line a javascript er onclick class use hoise  */
                  echo "<td><a  class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure to delete?');  \" href='users.php?delete={$db_id}'><i class='fa-solid fa-trash-can'></i></a></td>";
                  echo "</tr>";

                  
                }
                
                
                
                
                
                
                
                ?>
                 
                </tbody>
</table>

              <!-- //approved -->
              <?php 
              if(isset($_GET['change_role_admin'])){
                $users_id =$_GET['change_role_admin'] ;
                $change_role ="UPDATE users set user_role ='admin' WHERE user_id=$users_id " ;
                $admin =mysqli_query($connect,$change_role);
                header("Location: ./users.php");
                  
              }
              
              
              ?>

<?php 
              if(isset($_GET['change_role_moderator'])){
                $users_idd =$_GET['change_role_moderator'] ;
                $changee_role ="UPDATE users set user_role ='moderator' WHERE user_id=$users_idd " ;
                $moderator =mysqli_query($connect,$changee_role);
                header("Location: ./users.php");
                  
              }

              if(isset($_GET['change_role_delivery_man'])){
                $users_iidd =$_GET['change_role_delivery_man'] ;
                $changee_roleee ="UPDATE users set user_role ='delivery_man' WHERE user_id=$users_iidd " ;
                $change_role_delivery_man =mysqli_query($connect,$changee_roleee);
                header("Location: ./users.php");
                  
              }
              
              
              ?>
             <!-- //unapproved -->
              <?php 
              if(isset($_GET['change_role_customer'])){
                $users_id =$_GET['change_role_customer'] ;
                $change_role ="UPDATE users set user_role ='customer' WHERE user_id=$users_id " ;
                $subscriber =mysqli_query($connect, $change_role);
                header("Location: ./users.php");
                  
              }
              
              
              ?>

              <?php 
              if(isset($_GET['delete'])){
                $users_id =$_GET['delete'] ;
                $del_query ="DELETE FROM users WHERE user_id=$users_id " ;
                $delete =mysqli_query($connect,$del_query);
                header("Location: ./users.php");
                  
              }
              
              
              ?>


<br>
<br>

<table class="table  card-body  table-hover table-borderless  mt-2 border rounded-top rounded-bottom">
  <hr>
  <h5 class="text-center">Moderator List</h5>
                <tr class="text-dark bg-white   rounded-top rounded-bottom">
                  <th>Id</th>
                  
                 
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                 <!--  <th>Image</th> -->
                  
                  <th>Role</th>
                  <th>Set  as admin</th>
                  <th>Set  as moderator</th>
                  <th>Set  as customer</th>
                  <th>Set  as delivery man</th>
                  
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <tbody>

                <?php 
                
                    
                 $cus ="SELECT  *   FROM users WHERE user_role='moderator' ORDER BY user_id DESC";
                 
                $newws =mysqli_query($connect,$cus) ;
                while($viewss=mysqli_fetch_assoc($newws)){
                    $db_idd =  $viewss['user_id'];       
                    $db_user_firstname =  $viewss['first_name'];
                    $db_user_lastname =  $viewss['last_name'];
                    $db_username =  $viewss['username'];
                    $db_user_mobile_number =  $viewss['mobile_number'];
                    $db_user_email =  $viewss['email'];      
                    $db_user_image =  $viewss['user_image'];
                 /*   $db_user_house_no =  $viewss['house_no'];
                    $db_user_street =  $viewss['street'];
                    $db_user_city =  $viewss['city'];
                    */
                    $db_user_password =  $viewss['password'];
                   
                    $db_user_role =  $viewss['user_role'];
                    $db_user_status =  $viewss['status'];
                  
                  

                  echo "<tr>" ;
                  echo "<td>{$db_idd }</td>";
                  
                  echo "<td>{$db_username}</td>";
                  echo "<td>{$db_user_email}</td>";
                  echo "<td>0{$db_user_mobile_number}</td>";
                //  echo "<td><img class='img-thumbnail' width='60' height='40' src='../img/{$db_user_image}' alt='img'></td>";
             //     echo "<td>{$db_user_addresses}</td>";
                  echo "<td><a  class='btn btn-success text-white font-weight-bolder'>{$db_user_role}</a></td>";


                
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_admin={$db_idd}'> Admin</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_moderator={$db_idd}'>Moderator</a></td>";
                  echo "<td><a  class='btn btn-secondary' href='users.php?change_role_customer={$db_idd}'>Customer</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_delivery_man={$db_idd}'>Delivery man</a></td>";
                  echo "<td><a class='btn btn-warning'  target='_blank' href='users.php?source=edit_users&edit_user={$db_idd}'><i class='fa-solid fa-user-pen'> </i>  Edit </a></td>";
                  /* nicher line a javascript er onclick class use hoise  */
                  echo "<td><a  class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure to delete?');  \" href='users.php?delete={$db_idd}'><i class='fa-solid fa-trash-can'> </i></a></td>";
                  echo "</tr>";

                  
                }
                
                
                
                
                
                
                
                ?>
                 
                </tbody>
</table>




<br>
<br>

<table class="table  card-body  table-hover table-borderless  mt-2 border rounded-top rounded-bottom">
  <hr>
  <h5 class="text-center">Delivery Man List</h5>
                <tr class="text-dark bg-white   rounded-top rounded-bottom">
                  <th>Id</th>
                  
                  
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <!--  <th>Image</th> -->
                  
                  <th>Role</th>
                  <th>Set  as admin</th>
                  <th>Set  as moderator</th>
                  <th>Set  as customer</th>
                  <th>Set  as delivery man</th>
                  
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <tbody>

                <?php 
                
                    
                 $cll ="SELECT  *   FROM users WHERE user_role='delivery_man' AND status='verified' ORDER BY user_id DESC";
                 
                $ne =mysqli_query($connect,$cll) ;
                while($vio=mysqli_fetch_assoc($ne)){
                    $db_idddok =  $vio['user_id'];       
                    $db_user_firstname =  $vio['first_name'];
                    $db_user_lastname =  $vio['last_name'];
                    $db_username =  $vio['username'];
                    $db_user_mobile_number =  $vio['mobile_number'];
                    $db_user_email =  $vio['email'];      
                    $db_user_image =  $vio['user_image'];
                 /*   $db_user_house_no =  $vio['house_no'];
                    $db_user_street =  $vio['street'];
                    $db_user_city =  $vio['city'];
                    */
                    $db_user_password =  $vio['password'];
                   
                    $db_user_role =  $vio['user_role'];
                    $db_user_status =  $vio['status'];
                  
                  

                  echo "<tr>" ;
                  echo "<td>{$db_idddok }</td>";
                  
                  echo "<td>{$db_username}</td>";
                  echo "<td>{$db_user_email}</td>";
                  echo "<td>0{$db_user_mobile_number}</td>";
               //   echo "<td><img class='img-thumbnail' width='60' height='40' src='../img/{$db_user_image}' alt='img'></td>";
             //     echo "<td>{$db_user_addresses}</td>";
                  echo "<td><a  class='btn btn-success text-white font-weight-bolder'>{$db_user_role}</a></td>";


                
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_admin={$db_idddok}'> Admin</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_moderator={$db_idddok}'>Moderator</a></td>";
                  echo "<td><a  class='btn btn-secondary' href='users.php?change_role_customer={$db_idddok}'>Customer</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_delivery_man={$db_idddok}'>Delivery man</a></td>";
                  echo "<td><a class='btn btn-warning' target='_blank' href='users.php?source=edit_users&edit_user={$db_idddok}'><i class='fa-solid fa-user-pen'> </i>  Edit </a></td>";
                  /* nicher line a javascript er onclick class use hoise  */
                  echo "<td><a  class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure to delete?');  \" href='users.php?delete={$db_idddok}'><i class='fa-solid fa-trash-can'> </i></a></td>";
                  echo "</tr>";

                  
                }
                
                
                
                
                
                
                
                ?>
                 
                </tbody>
</table>





<br>
<br>

<table class="table  card-body  table-hover table-borderless  mt-2 border rounded-top rounded-bottom">
  <hr>
  <h5 class="text-center">Customer List</h5>
                <tr class="text-dark bg-white   rounded-top rounded-bottom">
                  <th>Id</th>
                  
                  
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                <!--  <th>Image</th> -->
                  
                  <th>Role</th>
                  <th>Set  as admin</th>
                  <th>Set  as moderator</th>
                  <th>Set  as customer</th>
                  <th>Set  as delivery man</th>
                  
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <tbody>

                <?php 
                
                    
                 $cusk ="SELECT  *   FROM users WHERE user_role='customer' AND status='verified' ORDER BY user_id DESC";
                 
                $newwsl =mysqli_query($connect,$cusk) ;
                while($vi=mysqli_fetch_assoc($newwsl)){
                    $db_iddd =  $vi['user_id'];       
                    $db_user_firstname =  $vi['first_name'];
                    $db_user_lastname =  $vi['last_name'];
                    $db_username =  $vi['username'];
                    $db_user_mobile_number =  $vi['mobile_number'];
                    $db_user_email =  $vi['email'];      
                    $db_user_image =  $vi['user_image'];
                 /*   $db_user_house_no =  $vi['house_no'];
                    $db_user_street =  $vi['street'];
                    $db_user_city =  $vi['city'];
                    */
                    $db_user_password =  $vi['password'];
                   
                    $db_user_role =  $vi['user_role'];
                    $db_user_status =  $vi['status'];
                  
                  

                  echo "<tr>" ;
                  echo "<td>{$db_iddd }</td>";
               
                  echo "<td>{$db_username}</td>";
                  echo "<td>{$db_user_email}</td>";
                  echo "<td>0{$db_user_mobile_number}</td>";
                 // echo "<td><img class='img-thumbnail' width='60' height='40' src='../img/{$db_user_image}' alt='img'></td>";
             //     echo "<td>{$db_user_addresses}</td>";
                  echo "<td><a  class='btn btn-success text-white font-weight-bolder'>{$db_user_role}</a></td>";


                
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_admin={$db_iddd}'> Admin</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_moderator={$db_iddd}'>Moderator</a></td>";
                  echo "<td><a  class='btn btn-secondary' href='users.php?change_role_customer={$db_iddd}'>Customer</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?change_role_delivery_man={$db_iddd}'>Delivery man</a></td>";
                  echo "<td><a class='btn btn-warning' target='_blank' href='users.php?source=edit_users&edit_user={$db_iddd}'><i class='fa-solid fa-user-pen'> </i>  Edit </a></td>";
                  /* nicher line a javascript er onclick class use hoise  */
                  echo "<td><a  class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure to delete?');  \" href='users.php?delete={$db_iddd}'><i class='fa-solid fa-trash-can'> </i></a></td>";
                  echo "</tr>";

                  
                }
                
                
                
                
                
                
                
                ?>
                 
                </tbody>
</table>