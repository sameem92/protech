<?php
$nonav="";
include 'admin/connect.php';

$about = $con->prepare("SELECT  * FROM  about");
      // Execute The Statement
      $about->execute();
      // Assign To Variable 
      $abot = $about->fetchAll();
    //load services
$service = $con->prepare("SELECT  * FROM  services");
      // Execute The Statement
      $service->execute();
      // Assign To Variable 
      $serv = $service->fetchAll();
$slider = $con->prepare("SELECT  * FROM  tbl_images");
      // Execute The Statement
      $slider->execute();
      // Assign To Variable 
      $slide = $slider->fetchAll();
$blogs = $con->prepare("SELECT  * FROM  blogs");
      // Execute The Statement
      $blogs->execute();
      // Assign To Variable 
      $blog = $blogs->fetchAll();
$offers = $con->prepare("SELECT  * FROM  offers ");
      // Execute The Statement
      $offers->execute();
      // Assign To Variable 
      $offer = $offers->fetchAll();
      $offerCount= $offers->rowCount();
$categories = $con->prepare("SELECT  * FROM  categories");
      // Execute The Statement
      $categories->execute();
      // Assign To Variable 
      $cat = $categories->fetchAll();
     
$items = $con->prepare("SELECT  * FROM  items  WHERE Approve=1  ORDER BY Item_ID DESC LIMIT 9");
      // Execute The Statement
      $items->execute();
      // Assign To Variable 
      $itm = $items->fetchAll();
    
$testi = $con->prepare("SELECT  * FROM  testi");
      // Execute The Statement
      $testi->execute();
      // Assign To Variable 
      $test = $testi->fetchAll();
$social = $con->prepare("SELECT  * FROM  social");
      // Execute The Statement
      $social->execute();
      // Assign To Variable 
      $scl = $social->fetchAll();
$clients = $con->prepare("SELECT  * FROM  clients");
      // Execute The Statement
      $clients->execute();
      // Assign To Variable 
      $cl= $clients->fetchAll();
$tools = $con->prepare("SELECT  * FROM  tools");
      // Execute The Statement
      $tools->execute();
      // Assign To Variable 
      $tls = $tools->fetchAll();
include "config.php";
include "includes/header.php";

    
?>


<body id="home" class="homepage lang<?php echo($_SESSION['lang']);?>">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                 
                </div>
        
                <div class="collapse navbar-collapse ">
                    
                      <?php if($_SESSION['lang']=='en'){?>
                        
                        <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home"><?php echo $lang['home'];?> </a></li>
                        <li class="scroll"><a href="#about"><?php echo $lang['about'];?> </a></li>
                        <li class="scroll"><a href="#services"><?php echo $lang['serv'];?> </a></li>
                        <li class="scroll"><a href="#portfolio"><?php echo $lang['prtf'];?></a></li>
                        <li class="scroll"><a href="#pricing"><?php echo $lang['ofr'];?></a></li>
                        <li class="scroll"><a href="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class="scroll"><a href="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
                        <li class="scroll"><a href="#get-in-touch"><?php echo $lang['cntct'];?></a></li>
                        <li ><ul class="list-inline"><li><a href="?lang=ar" >عربي</a></li></ul></li> <?php  } if($_SESSION['lang']=='ar'){?>
                        <ul class="nav navbar-nav arnav navbar-right" style="">
                          
                          <li class="scroll active"><a href="#home" data="#home"><?php echo $lang['home'];?> </a></li>
                        <li class="scroll"><a href="#about" data="#about"><?php echo $lang['about'];?> </a></li>
                        
                        <li class="scroll"><a href="services.php" data="#services"><?php echo $lang['serv'];?></a> </li>
                        <li class="scroll"><a href="portfolio.php" data="#portfolio"><?php echo $lang['prtf'];?></a></li>
                        <li class=""><a href="offer.php" data="#pricing"><?php echo $lang['ofr'];?></a></li>
                        
                        <li class="scroll"><a href="#clients" data="#clients">عملاؤنا</a></li>
                        <li class="scroll"><a href="blog.php" data="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class=""><a href="news.php" data="#news"> المدونة</a></li>
                        <li class="scroll"><a href="#testimonial" data="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
                        <li class="scroll"><a href="#get-in-touch" data="#get-in-touch" ><?php echo $lang['cntct'];?></a></li>
                          
                          
                       <?php } ?>                         
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->


    <section id="main-slider" class="" >
      <div class="col-md-4 col-sm-0 " ></div>
      <div class="col-md-8 col-sm-12 main-info" >
        <h1 class="text-center " style="color:white"> شركة  <span class="pro-tech" style="font-size: 50px">برو تك    </span>للتصميم والبرمجيات </h1>
        <h2 class="text-center" style="color:white">مرحباً بكم في قلعتكم المعطاءة</h2>
        <p class="text-center">شركة  <span class="pro-tech" style="">برو تك    </span>تقدّم لكم العديد من الخدمات والأعمال مثل تصميم وبرمجة مواقع الإنترنت و تطبيقات الهواتف الذكية و لوحات التحكم ،التصميم الجرافيكي بأنواعه ، الموشن جرافيك والفيديوهات والأفلام وخدمات التسويق الإلكتروني وغير ذلك الكثير </p>
        <div class="buttons-main justify-content-center">
        <a href="#get-in-touch" class="btn btn-primary btn-lg" style="    background: none;
    border: 2px solid;">اتصل بنا</a>
        <a href="portfolio.php" class="btn btn-primary btn-lg" style="    border: 2px solid white;
    background: white;
    color: #1f6694;"> أعمالنا</a>  
        </div>
        
      </div>

    </section><!--/#main-slider-->
    <section class="intro">
   <section id="about" class="block" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" style="font-size: 40px"><?php echo $lang['about-title'];?> <img src="images/point.png" width="100"></h2>
             
            </div>

            <div class="row">
                <div class="about-txt col-md-12">
                 
                     <p class="text-center  wow fadeInDown" style="width: 80%;margin: auto;"><span class="pro-tech" style="font-size: 25px">برو تك    </span> هي شركـة متخصصة فـي مجال تكــنولوجـيا المعلومـات تهـدف لتقديم حلول تكنولوجية
فعـالة ومتقدمــة  فـي نطـــاق واسع من الخدمـات التقنـــــية لتصــبح الشـركة الرائـدة فـي مجـــال
تكـنولوجيا المعلومــات</p>
                    <p class="text-center  wow fadeInDown" style="width: 80%;margin: auto;"><span class="pro-tech" style="font-size: 25px">برو تك    </span>تتخذ منهجـا مبتكرا و جديـدا لخدمـات تقنـية المعلومـات حيث أنهـا توفر فريقا على أعلى
 مستـوى من الكفـاءة والمهنـية لتلبي احتياجات عملائنا وتطلعـاتهم</p>
                <h2 class="section-title text-right wow fadeInDown" style="width: 80%"> لكي تنشئ مشروعـاً رائعـاً
 <img src="images/under-point.png" class="under_points"></h2>
  <p class="text-center" style="width: 80%;margin: auto;">عليك أن تخـطط  <span class="section-title  wow fadeInDown" style="color: #509ec2;font-weight: 900;font-size: 18px">كمهنـدس  </span> , وتبني <span style="color: #509ec2;font-weight: 900;font-size: 18px">كفنـان  </span> , وتفكر مثل    <span class="section-title  wow fadeInDown" style="color: #509ec2;font-weight: 900;font-size: 18px" >الـزبـون  </span>, فأنـت في المكـان الصحيـح</p>
   <h2 class="section-title text-center wow fadeInDown col-sm-12" style="font-size: 40px">برو تـك   .....     فكـرتك بيـن يديــك</h2>
                </div>

              
                
            </div>
          <!-- <div class="embed-responsive embed-responsive-16by9 motion-v">
 <?php foreach($abot as $abt) {echo '<iframe src="https://www.youtube.com/embed/'.$abt['Video'].'?rel=0&amp;autoplay=1&mute=1"  width="560" height="315"  frameborder="0" allowfullscreen ></iframe>';}?>

                </div> -->
            
            </div>
        </div>
</section>
<section id="tools" class="block">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" id="tools-title">أدواتـــنـا  </h2>
               
            </div>
       
             <div class="row">
             <div id="" class="pro-carousel owl-carousel"> 
              <?php foreach ($tls as $tl ) {
                echo '<div class="text-center item">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">   
                    <img src="admin/data/uploads/'.$tl['Image'].'" alt="" class="blogimg" width="150"/>       
                    </div>
                </div>';
              } ?>
               
            </div>


            </div>
             
        </div>
    </section> 
      <section id="animated-number" class="">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">حقائق  <img src="images/under-point.png" class="under_points"></h2>
            </div>

            <div class="row text-center">
                <div class="col-sm-12 col-md-6 row">
                  <div class="wow fadeInUp col-sm-6 col-xs-6 col-md-12 " data-wow-duration="400ms" data-wow-delay="100ms">
                       <img src="images/prjct.png" width="50">
                        <div class="animated-number" data-digit="<?php foreach($abot as $abt) {echo $abt['arPoints'];}?>" data-duration="1000"></div>
                        <strong>عدد المشاريع </strong>
                    </div>
                    <div class="wow fadeInUp col-sm-6 col-xs-6 col-md-12 row " data-wow-duration="400ms" data-wow-delay="0ms">
                      <img src="images/ideas.png" width="50">
                      <div class="animated-number" data-digit="<?php foreach($abot as $abt) {echo $abt['Points'];}?>" data-duration="1000"></div>
                        <strong>عدد الأفكار</strong>
                       
                    </div>
                </div>
                
                
                <div class="col-sm-12 col-md-6 row">
                    <div class="wow fadeInUp  col-sm-6 col-xs-6 col-md-12 " data-wow-duration="400ms" data-wow-delay="200ms">
                       <img src="images/hours.png" width="50">
                        <div class="animated-number" data-digit="<?php foreach($abot as $abt) {echo $abt['arAdress'];}?>" data-duration="1000"></div>
                        <strong>عدد ساعات العمل</strong>
                    </div>
                    <div class="wow fadeInUp  col-sm-6 col-xs-6 col-md-12 " data-wow-duration="400ms" data-wow-delay="300ms">
                      <img src="images/clients.png" width="50">
                        <div class="animated-number" data-digit="<?php foreach($abot as $abt) {echo $abt['Adress'];}?>" data-duration="1000"></div>
                        <strong>عدد العملاء</strong>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#animated-number--> 
   
    </section>
  <section id="services" class="block">
        <div class="container container-sv">
            <style>
                @media  only screen and (max-width: 900px) and (min-width: 768px)  {
                    .container-sv{
                        width:600px!important;
                    }
                  }
                  
                
            </style>
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $lang['serv-title'];?> <img src="images/point.png" width="100"></h2>
            </div>

            
                <div class="features row justify-content-center">
             
                     <?php 
        $i=1;
        foreach($serv as $sv) {
          if (($i % 2) == 1 ){
            echo'
                    <div class="col-md-2 col-xs-12 col-sm-6 col-md-4 wow fadeInUp services-item text-center row" data-wow-duration="300ms" data-wow-delay="0ms"    style="margin: 10px;">
                          
                            <div class="col-xs-6 col-sm-12">
                                <img src="admin/data/uploads/'.$sv['Image'].'" alt="img"  >
                            </div>
                            <div class="col-xs-6 col-sm-12">
                                ';if($_SESSION['lang']=='en'){
                                    echo '<h4 class="media-heading text-center">'.$sv['ServName'].'</h4>';
                                }else{
                                    echo '<h4 class="media-heading text-center">'.$sv['arServName'].'</h4>';
                                }
                                
                                echo'
                                </div>
                                
                            
                            
                      
                    </div><!--/.col-md-2--> ';
                  } else {
                    echo'
                    <div class="col-md-2 col-xs-12  col-sm-6  col-md-4 wow fadeInUp services-item text-center row" data-wow-duration="300ms" data-wow-delay="0ms"  style="margin: 10px;float:right">
                          
                            
                            <div class="col-xs-6 col-sm-12">
                                ';if($_SESSION['lang']=='en'){
                                    echo '<h4 class="media-heading media-heading-index text-center">'.$sv['ServName'].'</h4>';
                                }else{
                                    echo '<h4 class="media-heading media-heading-index  text-center">'.$sv['arServName'].'</h4>';
                                }
                                
                                echo'
                             </div>   
                            <div class="col-xs-6 col-sm-12">
                                <img src="admin/data/uploads/'.$sv['Image'].'" alt="img" >
                            </div>
                            
                      
                    </div><!--/.col-md-2--> ';
                  }
          
                    $i+=1;

        }

          ?>





      
                </div>
                 

            </div><!--/.container-->    
     
          <h2 class="section-title text-center wow fadeInDown col-sm-12"><img src="images/under-point2.png" class="under_points  hidden-xs "><a href="services.php" class="btn btn-primary btn-lg " >عرض المزيد</a><img src="images/under-point.png" class="under_points   hidden-xs"></h2>

             <br>
    </section><!--/#services-->
    
<section id="portfolio" class="block">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $lang['prft-title'];?> <img src="images/point.png" width="100"></h2>
            </div>

            <div class="text-center">
                <ul class="portfolio-filter text-center row ">
                    <li class=" col-lg-3 col-md-3 col-sm-4 col-xs-12" <?php if($_SESSION['lang']=='ar'){ echo' style="float:right"';}?>> <a class="active" data-id="all" href="#" data-filter="*" id="allcat"><?php echo $lang['All'];?></a> </li>
                    <?php foreach($cat as $ct) {
                        if($_SESSION['lang']=='en'){
                                    echo '<li class=" col-lg-3 col-md-3 col-sm-4 col-xs-12"> <a href="#" class="cat-filter" data-id="'.$ct['ID'].'" data-filter=".cat'.$ct['ID'].'">'.$ct['Name'].'</a> </li>';
                                }else{
                                    echo '<li class=" col-lg-3 col-md-3 col-sm-4 col-xs-12" style="float:right"> <a href="portfolio.php?catid='.$ct['ID'].'">'.$ct['Description'].'</a> </li>';
                                
                                }
   
                   
            }?>
                    
                    
                </ul><!--/#portfolio-filter-->
            </div>
            <input type="hidden" id="cathidden" value="all">
            
            <div id="prtf-itm" class="portfolio-items " >
                <?php foreach($itm as $it) {
   
                   
                   if($it['Type']=='video'){
                        echo '<div class="portfolio-item  cat'.$it['Cat_ID'].' col-md-4 col-sm-6" >
                    <div class="portfolio-item-inner">';
                        echo '<div class="video">
                       
                        <video  controls muted autoplay="off" style="">
                              <source src="admin/data/uploads/'.$it['Image'].'" >
                              
                              Your browser does not support the video tag.
                            </video>
                          
                        </div>';
                    }
                    elseif($it['Type']=='image'){
                        echo '<div class="portfolio-item cat'.$it['Cat_ID'].' col-md-4 col-sm-6">
                    <div class="portfolio-item-inner">';
                        echo'<img class="" src="admin/data/uploads/'.$it['Image'].'" alt="">
                        <div class="portfolio-info">
                            <div class="p-info">
                            <h3 class="text-center">'.$it['Name'].'</h3>
                            <p class="text-center">
                            '.$it['Description'].'
                            </p>
                            </div>
                        </div>';
                    }
                        
                        
                    echo '
                    </div>
                </div><!--/.portfolio-item-->';
                 $last = $it["Item_ID"];
            }?>
                
            </div>
            
            <h2 class="section-title text-center wow fadeInDown col-sm-12 "><img src="images/under-point2.png" class="under_points  hidden-xs"><a href="portfolio.php" class="btn btn-primary btn-lg " >عرض المزيد</a><img src="images/under-point.png" class="under_points  hidden-xs"></h2>

             <br>
                 
               

        </div><!--/.container-->
    </section><!--/#portfolio-->
    <style type="text/css">
      #remove_row{
        position: relative;

      }
    </style>

    
      
    
    
    
   <section id="pricing" class="block">
    <?php if($offerCount>0){?>
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" style="color: white"><?php echo $lang['ofr-title'];?><img src="images/point-w.png" width="100"></h2>
               
            </div>

            <div class="row">
<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <ol class='carousel-indicators '>
        <?php $i=0;foreach($offer as $ofr) {
            if ($i<1) {
                echo "<li data-target='#carousel-custom' data-slide-to='".$i."' class='active '><p>";
                if($_SESSION['lang']=='en'){
                                    echo $ofr['offerName'];
                                }else{
                                    echo $ofr['arofferName'];
                                
                                }
                echo"</p></li>";$i+=1;
            }else{
                echo "<li data-target='#carousel-custom' data-slide-to='".$i."' class=''><p>";
                if($_SESSION['lang']=='en'){
                                    echo $ofr['offerName'];
                                }else{
                                    echo $ofr['arofferName'];
                                
                                }
                echo"</p></li>";$i+=1;
            }

    }?>

    </ol>
    <div class='carousel-outer'>
        <!-- Indicators -->
    
        <!-- Wrapper for slides -->
        <div class='carousel-inner'>
            <?php  $i=0; foreach($offer as $ofr) {
            if ($i<1) {
                $i+=1;
                echo '<div class="item  row active">
                <div class="col-md-6 row text-center"><img src="admin/data/uploads/'.$ofr['Image'].'" alt="" class="col-md-11 offrimg" /></div>
                <div class="col-md-3 row details-offer">
                    <div class=" col-md-12 ">
                       ';
                if($_SESSION['lang']=='en'){
                                    echo  '<h2 class="">'.$ofr['offerName'];
                                }else{
                                    echo '<h2 style="text-align:center;color:white">'.$ofr['arofferName'];
                                
                                }
                echo'</h2>
                        ';
                if($_SESSION['lang']=='en'){
                                    echo '<p class="wow fadeInDown">'.$ofr['offerDesc'];
                                }else{
                                    echo '<p class="wow fadeInDown" style="text-align:center">'.$ofr['arofferDesc'];
                                
                                }
                echo'</p> 
                    </div>
                   
                    
                </div>
                
            </div>';
            }else{
                echo '<div class="item  row ">
                <div class="col-md-6 row text-center"><img src="admin/data/uploads/'.$ofr['Image'].'" alt="" class="col-md-11 offrimg" /></div>
                <div class="col-md-3 row details-offer">
                    <div class="col-sm-8 col-md-12  ">
                        <h2 class="">';
                if($_SESSION['lang']=='en'){
                                    echo $ofr['offerName'];

                                }else{
                                    echo '<h2 style="text-align:center;color:white">'.$ofr['arofferName'];
                                
                                }
                echo'</h2>
                        <p class="">';
                if($_SESSION['lang']=='en'){
                                    echo $ofr['offerDesc'];
                                }else{
                                    echo '<p class="" style="text-align:center">'.$ofr['arofferDesc'];
                                
                                }
                echo'</p> 
                    </div>
                   
                    
                </div>
                
            </div>';$i+=1;
            }

            }?>

            




           
        </div>
            
        <!-- Controls -->
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>
    
    
</div><!--/#end carousel-->
    
    
</div>
        </div>
        </div>
    <?php }?>
    <h2 class="section-title text-center wow fadeInDown col-sm-12 "><img src="images/under-point2.png" class="under_points  hidden-xs"><a href="offer.php" class="btn btn-primary btn-lg " >عرض المزيد</a><img src="images/under-point.png" class="under_points  hidden-xs"></h2>
    </section><!--/#pricing-->

  
   
    <section id="clients" class="block">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">عملاؤنا <img src="images/point.png" width="100"></h2>
              
            </div>
       
             <div class="row">
             <div id="" class="pro-carousel owl-carousel"> 
               <?php foreach ($cl as $tsl ) {
                echo '<div class="text-center item">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">   
                    <img src="admin/data/uploads/'.$tsl['Image'].'" alt="" class="blogimg" width="150"/>       
                    </div>
                </div>';
              } ?>
               
            </div>
              

                

                
                
                

            </div>


            </div>
             
        </div>
    </section> 
    
    
    <section id="blog" class="block">

        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" style="font-size: 40px"><?php echo $lang['blg-title'];?> <img src="images/point.png" width="100"></h2>
            </div>
       
             <div class="row">
            
               <?php foreach($blog as $blg) {
                echo '
                    <div class="text-center blog-post blog-large wow fadeInLeft col-md-4" data-wow-duration="300ms" data-wow-delay="0ms" style="float:right">
                        <article>
                            <header class="entry-header">
                                <div class="entry-thumbnail">
                                    <img src="admin/data/uploads/'.$blg["Image"].'" alt="" class="blogimg" />
                                   
                                </div>
                                
                            </header>

                            <div class="entry-content media-body">
                                ';
                   echo' <div class="entry-date"></div>
                                <h2 class="entry-title"><a href="blog.php?do=Single&blogID='.$blg['blogID'].'"  >';
                if($_SESSION['lang']=='en'){
                                    echo $blg['blogName'];
                                }else{
                                    echo $blg['arblogName'];
                                
                                }
                echo'</a></h2>
                
                               
                            </div>

                            
                        </article>
                    </div>
              
                    ';
            }?>

                

                
                
                

            </div>


            </div>
             <?php foreach($blog as $blg) {echo'
            <div class="modal fade bs-example-modal-blg'.$blg['blogID'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">';
                if($_SESSION['lang']=='en'){
                                    echo $blg['blogName'];
                                }else{
                                    echo $blg['arblogName'];
                                
                                }
                echo'</h4>
                          </div>
                          <div class="modal-body">
                             <img src="admin/data/uploads/'.$blg['Image'].'" alt="img" class="modal-img">
                             ';
                if($_SESSION['lang']=='en'){
                                    echo '<p class="modaldesc">' .$blg['blogDesc'];
                                }else{
                                    echo '<p class="modaldesc" style="text-align:right">'.$blg['arblogDesc'];
                                
                                }
                echo'</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">'.$lang['close'].'</button>
                             
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!--/end modal-->';}?>
        </div>


        <h2 class="section-title text-center wow fadeInDown col-sm-12 "><img src="images/under-point2.png" class="under_points  hidden-xs"><a href="blog.php" class="btn btn-primary btn-lg " >عرض المزيد</a><img src="images/under-point.png" class="under_points  hidden-xs"></h2>
    </section> 
    
    
    
    
    
  <?php include 'includes/footer.php'; ?>