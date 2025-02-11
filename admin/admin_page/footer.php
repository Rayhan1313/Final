<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
     <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 


<!-- font -awesome cdn 
<script src="https://kit.fontawesome.com/0bf0636cf8.js" crossorigin="anonymous"></script> -->




</div>
</body>

<style>
    footer{
        
    background-color: transparent;
   
    background-attachment: fixed;
    background-repeat: no-repeat;
    height: 300px;
    
   
}
.try{
    background-image: url("../img/bg.png");
    background-color: transparent;
    
   
    background-attachment: fixed;
    background-repeat: no-repeat;
    
    height: 300px;
    
}
</style>


    <!-- footer  section nitesi -->
    <footer class="page-footer  background border border-3 border-white  rounded-left rounded-right rounded-top rounded-bottom">




<div class="footer-copyright text-center font-weight-bolder  bg-transparent mt-5 pt-5 try fs-1">
    <h5 class="font-weight-bolder fs-1  pt-5">  <b class=" pt-5">
        Contact us on :<a href="https://www.facebook.com/RTFoodDelivery2022/?ref=pages_you_manage" target="_blank"><i class="fa fa-facebook ml-2  btn-primary btn rounded text-white  "> </i></a>
        <a href="https://www.twitter.com" target="_blank"> <i class="fa-brands fa-twitter btn-info btn text-white rounded-circle fa-1x"> </i></a>
        <a href="http://wa.me/8801778700365" target="_blank"><i class="fa fa-whatsapp  btn text-white rounded-circle fa-1x" style="color: white; background: #00ff00;"> </i></a>
 
        <br><br><br><hr>
        &copy; 2022 all rights reserved :
        <a href="./"> Rt Food Delivery</a>
        </b> </h5>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

</div>




</footer>
</html>





<!-- Daywise data fetch query --



SELECT DAY(order_date),sum(total_money) FROM `confirm_order` GROUP BY order_date;


month wise

SELECT total_money,order_date FROM `confirm_order` WHERE MONTH(order_date)=MONTH(now());




-->