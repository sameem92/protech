<?php
$nonav="";
include 'admin/connect.php';

$about = $con->prepare("SELECT  * FROM  about");
      // Execute The Statement
      $about->execute();
      // Assign To Variable 
      $abot = $about->fetchAll();
$service = $con->prepare("SELECT  * FROM  services");
      // Execute The Statement
      $service->execute();
      // Assign To Variable 
      $serv = $service->fetchAll();
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
        
                <div class="collapse navbar-collapse navbar-right">
                    
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
                       
                        <ul class="nav navbar-nav arnav" style="">
                          
                          <li class=" "><a href="index.php" data="#home"><?php echo $lang['home'];?> </a></li>
                        <li class=""><a href="index.php#about" data="#about"><?php echo $lang['about'];?> </a></li>
                    
                        <li class="scroll active"><a href="services.php" data="#services"><?php echo $lang['serv'];?></a> </li>
                        <li class=""><a href="portfolio.php" data="#portfolio"><?php echo $lang['prtf'];?></a></li>
                        <li class=""><a href="offer.php" data="#pricing"><?php echo $lang['ofr'];?></a></li>
                        
                        <li class=""><a href="index.php#clients" data="#clients">عملاؤنا</a></li>
                        <li class=""><a href="blog.php" data="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class=""><a href="news.php" data="#blog"> المدونة</a></li>
                        <li class="scroll"><a href="index.php#testimonial" data="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
                        <li class="scroll"><a href="#get-in-touch" data="#get-in-touch" ><?php echo $lang['cntct'];?></a></li>
                          
                          
                       <?php } ?>                         
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
  <section id="main-slider" class="" style="min-height:100vh;width=100%">
      <div class="row" >
      <div class="col-md-4 col-sm-0 " ></div>
      <div class="col-md-8 col-sm-12 main-info" >
        <h1 class="text-center " style="color:white"> شركة  <span class="pro-tech" style="font-size: 50px">برو تك    </span>للتصميم والبرمجيات </h1>
       
        <p class="text-center">نقدم لكم خدمات تكنولوجية متكاملة باستخدام أحدث تقنيات البرمجة
 والتصميم لتقديم الخدمة بأفضل جودة ترضي عملائنا
 وتنافس المشاريع الأخرى من نفس المجال   </p>
       
        
      </div>
    </div>
    </section><!--/#main-slider-->
<section id="services" class="block">
       <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" style="padding-top: 50px"><?php echo $lang['serv-title'];?> <img src="images/point.png" width="100"></h2>
        </div>
           
        <div class="container">
           
          <div class="row services">
              <?php 
        $i=1;
        foreach($serv as $sv) {
          if (($i % 2) == 1 ){
            echo'
                    <div class="col-md-8 col-sm-6 col-xs-12 wow fadeInUp services-item text-center row" data-wow-duration="300ms" data-wow-delay="0ms" style="float:left" >
                          
                            <div class="col-md-3 col-sm-12 col-xs-12" style="float:right">
                                <img src="admin/data/uploads/'.$sv['Image'].'" alt="img"  width="150" style="float:right">
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12" style="float:right">
                                ';if($_SESSION['lang']=='en'){
                                    echo '<h4 class="media-heading text-right">'.$sv['ServName'].'</h4>';
                                }else{
                                    echo '<h4 class="media-heading text-right">'.$sv['arServName'].'</h4>
                                  <p class="text-right">'.$sv['arServDesc'].'</p><a class="btn btn-services" style="border-radius: 30px;font-weight: 900;border: 2px solid;float:right" href="https://api.whatsapp.com/send?phone=00970569660770">إحجز الآن <i class="fa fa-chevron-circle-right" style="font-size:15px"></i></a>';
                                }
                                
                                echo
                                '</div>
                                
                                
                            
                            
                      
                    </div><!--/.col-md-8--> ';
                  } else {
                   echo'

                    <div class="col-md-8 col-sm-6 col-xs-12 wow fadeInUp services-item text-center row" data-wow-duration="300ms" data-wow-delay="0ms" style="float:right" >
                          
                            <div class="col-md-3 col-sm-12 col-xs-12" style="float:right">
                                <img src="admin/data/uploads/'.$sv['Image'].'" alt="img"  width="150" style="float:right">
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12" style="float:right">
                                ';if($_SESSION['lang']=='en'){
                                    echo '<h4 class="media-heading text-right">'.$sv['ServName'].'</h4>';
                                }else{
                                    echo '<h4 class="media-heading text-right">'.$sv['arServName'].'</h4>
                                  <p class="text-right">'.$sv['arServDesc'].'</p><a class="btn btn-services" style="border-radius: 30px;font-weight: 900;border: 2px solid;float:right" href="https://api.whatsapp.com/send?phone=00970569660770">إحجز الآن <i class="fa fa-chevron-circle-right" style="font-size:15px"></i></a>';
                                }
                                
                                echo
                                '</div>
                                
                                
                            
                            
                      
                    </div><!--/.col-md-8--> ';
                  }
          
                    $i+=1;

        }

          ?>
          </div>
          
       
<style type="text/css">
      
      @media only screen and (max-width: 900px) {
        .main-info {
            margin-top: 20%!important;
            color: white!important;
            padding: 30px;
        }
       
      }
       @media only screen and (max-width: 994px) {
       
          .services-item {
            float:left!important;
        }
      }
    </style>

          
            
                 
               

        </div><!--/.container-->
    </section><!--/#portfolio-->


<?php include 'includes/footer.php'; ?>