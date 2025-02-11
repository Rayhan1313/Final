 

<table class="table  card-body  table-hover table-borderless  border rounded-top rounded-bottom"><hr>
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
                 // echo "<td><img class='img-thumbnail' width='60' height='40' src='../img/{$db_user_image}' alt='img'></td>";
             //     echo "<td>{$db_user_addresses}</td>";
                  echo "<td><a  class='btn btn-success text-white font-weight-bolder'>{$db_user_role}</a></td>";


                
                  echo "<td><a class='btn btn-primary' href='users.php?source=admin&change_role_admin={$db_id}'> Admin</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?source=admin&change_role_moderator={$db_id}'>Moderator</a></td>";
                  echo "<td><a  class='btn btn-secondary' href='users.php?source=admin&change_role_customer={$db_id}'>Customer</a></td>";
                  echo "<td><a class='btn btn-primary' href='users.php?source=admin&change_role_delivery_man={$db_id}'>Delivery man</a></td>";
                  echo "<td><a class='btn btn-warning' target='_blank' href='users.php?source=edit_users&edit_user={$db_id}'><i class='fa-solid fa-user-pen'> </i> Edit </a></td>";
                  /* nicher line a javascript er onclick class use hoise  */
                  echo "<td><a  class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure to delete?');  \" href='users.php?source=admin&delete={$db_id}'><i class='fa-solid fa-trash-can'></i></a></td>";
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
                header("Location: ./users.php?source=admin");
                  
              }
              
              
              ?>

<?php 
              if(isset($_GET['change_role_moderator'])){
                $users_idd =$_GET['change_role_moderator'] ;
                $changee_role ="UPDATE users set user_role ='moderator' WHERE user_id=$users_idd " ;
                $moderator =mysqli_query($connect,$changee_role);
                header("Location: ./users.php?source=admin");
                  
              }

              if(isset($_GET['change_role_delivery_man'])){
                $users_iidd =$_GET['change_role_delivery_man'] ;
                $changee_roleee ="UPDATE users set user_role ='delivery_man' WHERE user_id=$users_iidd " ;
                $change_role_delivery_man =mysqli_query($connect,$changee_roleee);
                header("Location: ./users.php?source=admin");
                  
              }
              
              
              ?>
             <!-- //unapproved -->
              <?php 
              if(isset($_GET['change_role_customer'])){
                $users_id =$_GET['change_role_customer'] ;
                $change_role ="UPDATE users set user_role ='customer' WHERE user_id=$users_id " ;
                $subscriber =mysqli_query($connect, $change_role);
                header("Location: ./users.php?source=admin");
                  
              }
              
              
              ?>

              <?php 
              if(isset($_GET['delete'])){
                $users_id =$_GET['delete'] ;
                $del_query ="DELETE FROM users WHERE user_id=$users_id " ;
                $delete =mysqli_query($connect,$del_query);
                header("Location: ./users.php?source=admin");
                  
              }
              
              
              ?>


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
<br>
<br>
<br>
<br>



