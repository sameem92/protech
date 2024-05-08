    <!--/#blog-->
     <section id="testimonial" class="block">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $lang['testi-title'];?> <img src="images/point.png" width="100"></h2>
                <p class="text-center wow fadeInDown"></p>
            </div>

            <div class="row" id="test-div">
                <?php
                $testi = $con->prepare("SELECT  * FROM  testi LIMIT 10");
                // Execute The Statement
                $testi->execute();
                // Assign To Variable 
                $test = $testi->fetchAll();
                foreach($test as $tst) {
                    if($_SESSION['lang']=='en'){
                                    echo '<div class="col-sm-6">
                <div class="panel-one">
                <div class="user-img"><img alt="" src="admin/data/uploads/'.$tst['Image'].'"></div>
                <div class="testi-info">
                <h4>'.$tst['Name'].'</h4>
                <h5>'.$tst['Project'].'</h5>
                <p>'.$tst['testiDesc'].'</p>
                </div>
                </div>
                
                
                </div>';
                                }else{
                                    echo '<div class="col-sm-6">
                <div class="panel-one">
                
                <div class="testi-info" style="text-align:right;margin-right:10px;">
                <h4>'.$tst['arName'].' <img alt="" src="images/quote-customer.png" width="15"></h4>
                <h4>'.$tst['arProject'].' <img alt="" src="images/quote-place.png" width="15"></h5>
                <p><i class="fa fa-quote-right" aria-hidden="true"></i> <br> '.$tst['artestiDesc'].' <br><i class="fa fa-quote-left" style="float:left" aria-hidden="true"></i></p>
                </div>
                <div class="user-img"><img alt="" src="admin/data/uploads/'.$tst['Image'].'"></div>
                </div>
                
                
                </div>';
                                
                                }
                
                }
                ?>

            </div>
            
        </div>

      <nav aria-label="Page navigation" id="p-nav_testi" style="display: flex;justify-content: center;">
        <ul class="pagination" >
              <?php 
              $record_per_page=10;
           $testi = $con->prepare("SELECT  * FROM  testi  ");
            // Execute The Statement
            $testi->execute();
            // Assign To Variable 
            $total_records = $testi->rowCount();
            $page=1;
        
          $total_pages = ceil($total_records/$record_per_page);
          $start_loop = $page;
          $difference = $total_pages - $page;
          if($difference <= 1)
          {
           $start_loop = $total_pages - 1;
          }
          $end_loop = $start_loop + 1;
          if($page > 1)
          {
           
           echo "<li><a class=' btn pagination_link_testi' data-page='".($page - 1)."' ><< السابق</a></li>";
          }
          
          if($page < $total_pages)
          {
           echo "<li><a class=' btn pagination_link_testi' data-page='".($page + 1)."' >التالي >></a></li>";
          
            
          }
           ?>
           
          

         
        </ul>
      </nav>
    </section> <!--/#testimonial-->
    
  
    

  <section id="get-in-touch" class="block">
        <div class="container">
            <div class="section-header" style="margin-bottom: 100px">
                <h2 class="section-title text-center wow fadeInDown" style="color:white"><?php echo $lang['cnct-title'];?> <img src="images/point-w.png" width="100"></h2>
                <p class="text-center wow fadeInDown">نتشرف أخي الزائر بإدخال بريدك الإلكتروني أو رقم هاتفك لتصلك منا الجوائز والعروض</p>
                <form style="width: 350px;margin: auto;">
                  <input type="button" name="submit" id="submit" class="btn btn-primary btn-sm col-sm-2" style="float: <?php  if($_SESSION['lang']=='ar'){
                                    echo 'left';
                                }?>;color:black;width: 100px; margin-right: 15px;background-image: linear-gradient(to right top, #ffffff, #e8e8e8, #d1d1d1, #bababa, #a4a4a4);" value="إدخال"/>
                  <input type="email" name="email" class="form-control col-sm-8" style="width: 200px;">
                   
                </form>
            </div>
            
            <div class="row" >
            <div class="col-sm-12  col-md-6" style="border-right: 2px solid white">
            
            <form  name="contact-form" id="main-contact-form"  >
                                <div class="form-group">
                                    <input type="text" required placeholder="<?php echo $lang['Name'];?>" class="form-control" id="name" style="text-align:  <?php  if($_SESSION['lang']=='ar'){
                                    echo 'right';
                                }?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" required placeholder="<?php echo $lang['Phone'];?>" class="form-control" id="phone" style="text-align:  <?php  if($_SESSION['lang']=='ar'){
                                    echo 'right';
                                }?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" required placeholder="<?php echo $lang['Email'];?>" class="form-control" id="email" style="text-align:  <?php  if($_SESSION['lang']=='ar'){
                                    echo 'right';
                                }?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" required placeholder="<?php echo $lang['Subject'];?>" class="form-control" id="subject" style="text-align:  <?php  if($_SESSION['lang']=='ar'){
                                    echo 'right';
                                }?>">
                                </div>
                                <div class="form-group">
                                    <textarea required placeholder="<?php echo $lang['Message'];?>" rows="8" class="form-control" id="message" style="text-align:  <?php  if($_SESSION['lang']=='ar'){
                                    echo 'right';
                                }?>"></textarea>
                                </div>
                              
                               <input type="button" name="submit" id="submit" class="btn btn-primary btn-sm" style="bottom: 10px;right: 10px" value="<?php echo $lang['submit'];?>"/><br>
                               <span id="error_message" class="text-danger"></span>  
                              <span id="success_message" class="text-success"></span>
                            </form>

            </div>
             
            <div class="col-sm-12 col-md-6" style="height: 355px;">
            
              
            
            <!--<div class="address">
            <h4><?php echo $lang['Adress'];?></h4>
            <p><?php foreach($abot as $abt) { if($_SESSION['lang']=='ar'){echo $abt['arAdress'];}else{echo $abt['Adress'];}}?></p>
            </div>-->
            
            <div class="address row">
            <h4 class="text-right"><?php echo $lang['Phone'];?> </h4>
            
            <div class="col-xs-12 row" style="float:right">
                
                <div class="col-xs-10" >
                   <p class="text-right"><img src="images/phn.png" width="20"> <a href="tel:<?php foreach($abot as $abt) {echo $abt['whatsapp'];}?>"><?php foreach($abot as $abt) {echo $abt['whatsapp'];}?></a></p>
                    <p class="text-right" ><img src="images/wts.png" width="20"> <a href="tel:<?php foreach($abot as $abt) {echo $abt['whatsapp'];}?>"><?php foreach($abot as $abt) {echo $abt['whatsapp'];}?></a></p>  
                </div>
                <div class="col-xs-2">
                    <img src="images/wts.png" width="30" style="float:right;margin-top:13px">
                </div>
               
            </div>

           
      
            
            
            <h4 class="text-right"><?php echo $lang['Email'];?></h4>
            <div class="col-xs-12 row" style="float:right">
                
                <div class="col-xs-10" >
                   <p style="" class="text-right"> <a href="mailto:<?php foreach($abot as $abt) {echo $abt['email'];}?>"><?php foreach($abot as $abt) {echo $abt['email'];}?></a></p> 
                </div>
                <div class="col-xs-2">
                     <img src="images/mail.png" width="30" style="float:right;margin-top:5px">
                </div>
               
            </div>
            
              
              
         
            
            <h4 class="text-right">تابعونا</h4>
            <p class="text-right">
              <?php foreach ($scl as $sl  ){
                echo '<a href="'.$sl['Name'].'"  > <i><img class=" social-media" src="admin/data/uploads/'.$sl['Image'].'"></i></a>&nbsp;';
              } ?>
              </p>
            
            </div>
            
            </div><!-- number + email -->
           
            </div>
            
            
        </div>
    </section><!--/#get-in-touch-->



    <a href="https://wa.me/<?php foreach($abot as $abt) {echo $abt['whatsapp'];}?>/" id="whatsapp"><img class="whatsapp"  src="whatsapp.png" alt="logo"></a>
    <footer id="footer" class="container-fluid">
        <div class="row">
        <div class="col-sm-4"><img class="footer-brand" style="float:left;width:100px" src="images/logo2.png" alt="logo"></div>
        <div class="col-sm-4 text-center"><a href="#about" ><?php echo $lang['right'];?></a></div>
        <div class=" text-center">
            
         
          
        </div>
        </div>
    </footer><!--/#footer-->

    
    <script src="js/bootstrap.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>

    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    
    
  <script src="js/scrolling-nav.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

    $(document).ready(function($) {
      $("#owl-example").owlCarousel();
    });

    $("body").data("page", "frontpage");

$("#owl-example").owlCarousel({ 
        items:3,  
         rtl:true, 
        navigation : true,
        autoPlay: true,
        pagination: false,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true,
            navigationText: [
            '<i class="fa fa-chevron-left" style="float:left;margin-top:-250px;z-index:50000;margin-left:-10px"></i>'+'<i class="fa fa-chevron-right" style="float:right;margin-top:-250px;z-index:50000;margin-right:-10px"></i>'+
            "<ul class='list-inline text-center' style='margin-top:50px'><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['prev'];?></button></li><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['next'];?></button></li><ul>"
            

            ],
});
$("#owl-pricing").owlCarousel({ 
        items:3     ,   
         rtl:true,
         pagination: false,
        navigation : true,
            navigationText: [
           '<i class="fa fa-chevron-left" style="float:left;margin-top:-150px;z-index:50000;margin-left:-10px"></i>'+'<i class="fa fa-chevron-right" style="float:right;margin-top:-150px;z-index:50000;margin-right:-10px"></i>'+
            "<ul class='list-inline text-center' style='margin-top:50px'><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['prev'];?></button></li><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['next'];?></button></li><ul>"
            

            ],
});
$(".pro-carousel").owlCarousel({ 
        autoPlay: true,
        pagination: false,
        autoPlaySpeed: 1000,
        autoplayTimeout: 300,
        autoplayHoverPause: true,
        items:5     ,   
         rtl:false,
         pagination: false,
        navigation : true,
            navigationText: [
             '<i class="fa fa-chevron-left" style="float:left;margin-top:-150px;z-index:50000;margin-left:-10px"></i>'+'<i class="fa fa-chevron-right" style="float:right;margin-top:-150px;z-index:50000;margin-right:-10px"></i>'+
            "<ul class='list-inline text-center' style='margin-top:100px'><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['prev'];?></button></li><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['next'];?></button></li><ul>"
            

            ],
});


    </script>
        <script type="text/javascript">
        $(document).ready(function($){
  // Navigation Scroll
  var winH=$(window).height();
    
    navH=$('#main-menu').height();
  

    $('#main-slider').css('margin-top',navH);
});
    </script>
    <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var name = $('#name').val();  
           var message = $('#message').val(); 
           var subject = $('#subject').val();    
           var email = $('#email').val(); 
           var phone = $('#phone').val();  
           if(name == '' || message == '' || email == '' || phone == '' || subject == '')  
           {  
                $('#error_message').html("All Fields are required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:{name:name, message:message,subject:subject, email:email,phone:phone},  
                     success:function(data){  
                          $("form").trigger("reset");  
                          $('#success_message').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#success_message').fadeOut("Slow");  
                          }, 2000);  
                     }  
                });  
           }  
      });  
 });  
 </script>  



  <script>

 $(document).ready(function(){  
    var $portfolio_selectors = $('.portfolio-filter >li>a');
     $portfolio_selectors.on('click', function(){

      $portfolio_selectors.removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
           
           var action = "cats"; 
           
              
          var cat=selector.substr(4);
           window.history.pushState("", "", 'portfolio.php?catid='+cat);
           $('#prtf-itm').fadeOut();
          
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{cat:cat,action:action},  
                dataType: 'json',
                cache: false,  
            
                success:function(data)  
                {  


                  if(data != '')  
                     {  
                          
                      
                         $('#prtf-itm').html('<img src="images/preloader.gif" style="width:40%;margin-left:30%">');
                          $('#prtf-itm').html(data[0]); 
                          $('#p-nav').html(data[1]);  
                          
                     } 
                       $('#prtf-itm').fadeIn();
                       var width_im=$('.pt-item-image').width();
      
                       $('.pt-item-image').css('height',width_im);
                }  
           });  
      });  
     $(document).on('click', '.pagination_link', function(){  
           var action = "cats"; 
           var page = $(this).attr("data-page");  
           var cat = $(this).attr("catid");  
          window.history.pushState("", "", 'portfolio.php?catid='+cat);
           $('#prtf-itm').fadeOut();
           $('html, body').animate({
          scrollTop: $("#prtf-itm").offset().top-50}, 50);
            $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{cat:cat,action:action,page:page},  
                dataType: 'json',
                cache: false,  
            
                success:function(data)  
                {  


                  if(data != '')  
                     {  
                          
                      
                         $('#prtf-itm').html('<img src="images/preloader.gif" style="width:40%;margin-left:30%">');
                          $('#prtf-itm').html(data[0]); 
                          $('#p-nav').html(data[1]);  
                          
                     } 
                       $('#prtf-itm').fadeIn();
                
                }  
           }); 
            var width_im=$('.pt-item-image').width();
      
              $('.pt-item-image').css('height',width_im);
      });  
     $(document).on('click', '.pagination_link_testi', function(){  
           var action = "testi"; 
           var page = $(this).attr("data-page");  
         
           $('#test-div').fadeOut();
           
            $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{action:action,page:page},  
                dataType: 'json',
                cache: false,  
            
                success:function(data)  
                {  


                  if(data != '')  
                     {  
                          
                      
                         $('#test-div').html('<img src="images/preloader.gif" style="width:40%;margin-left:30%">');
                          $('#test-div').html(data[0]); 
                          $('#p-nav_testi').html(data[1]);  
                          
                     } 
                       $('#test-div').fadeIn();

                }  
           }); 
            var width_im=$('.pt-item-image').width();
      
              $('.pt-item-image').css('height',width_im);
      }); 
 });  
 </script>
</body>
</html>