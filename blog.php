<?php
$nonav="";
include 'admin/connect.php';
include 'admin/includes/functions/functions.php';




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
$blogs = $con->prepare("SELECT  * FROM  blogs");
      // Execute The Statement
      $blogs->execute();
      // Assign To Variable 
      $blog = $blogs->fetchAll();
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
                        <li class=" "><a href="index.php#home"><?php echo $lang['home'];?> </a></li>
                        <li class=""><a href="#about"><?php echo $lang['about'];?> </a></li>
                        <li class=""><a href="#services"><?php echo $lang['serv'];?> </a></li>
                        <li class="scroll active"><a href="#portfolio"><?php echo $lang['prtf'];?></a></li>
                        <li class=""><a href="#pricing"><?php echo $lang['ofr'];?></a></li>
                        <li class=""><a href="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class="scroll"><a href="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
                        <li class="scroll"><a href="#get-in-touch"><?php echo $lang['cntct'];?></a></li>
                        <li ><ul class="list-inline"><li><a href="?lang=ar" >عربي</a></li></ul></li> <?php  } if($_SESSION['lang']=='ar'){?>
                       
                        <ul class="nav navbar-nav arnav" style="">
                          
                          <li class=" "><a href="index.php" data="#home"><?php echo $lang['home'];?> </a></li>
                        <li class=""><a href="index.php#about" data="#about"><?php echo $lang['about'];?> </a></li>
                     
                        <li class=""><a href="services.php" data="#services"><?php echo $lang['serv'];?></a> </li>
                        <li class=""><a href="portfolio.php" data="#portfolio"><?php echo $lang['prtf'];?></a></li>
                        <li class=""><a href="offer.php" data="#pricing"><?php echo $lang['ofr'];?></a></li>
                      
                        <li class=""><a href="index.php#clients" data="#clients">عملاؤنا</a></li>
                        <li class="scroll active"><a href="blog.php" data="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class=""><a href="news.php" data="#news"> المدونة</a></li>
                        <li class="scroll"><a href="index.php#testimonial" data="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
                        <li class="scroll"><a href="#get-in-touch" data="#get-in-touch" ><?php echo $lang['cntct'];?></a></li>
                          
                          
                       <?php } ?>                         
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="blog" class="block">

        <div class="container">
            
       
             <div class="row">
              <?php $do = isset($_GET['do']) ? $_GET['do'] : 'List'; 
              if($do=='List'){
                  echo '<div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" style="font-size: 40px">'. $lang['blg-title'].' <img src="images/point.png" width="100"></h2>
            </div>';
                foreach($blog as $blg) {
                echo '<div class="text-center col-sm-12" >
                    <div class="blog-post blog-large wow fadeInLeft row" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article class="row">
                            <header class="entry-header col-sm-4" style="float:right">
                                <div class="entry-thumbnail">
                                    <img src="admin/data/uploads/'.$blg["Image"].'" alt="" class="blogimg" />
                                   
                                </div>
                                
                            </header>

                            <div class="entry-content media-body col-sm-8">
                                ';
                   echo' <div class="entry-date"></div>
                                <h2 class="entry-title text-right"><a href="#">';
                if($_SESSION['lang']=='en'){
                                    echo $blg['blogName'];
                                }else{
                                    echo $blg['arblogName'];
                                
                                }
                echo'</a></h2> <p class="text-right">'.substr($blg['arblogDesc'],0, 250).'</p>
                          
                                
                            </div>

                            <a class="btn btn-primary btn-blog services-btn-dtl  btn-sm " href="blog.php?do=Single&blogID='.$blg['blogID'].'"  >'.$lang['show'].'</a> 
                        </article>
                    </div>
                </div>
                    ';
            }
            } elseif($do='Single'){
              $blogID = isset($_GET['blogID']) && is_numeric($_GET['blogID']) ? intval($_GET['blogID']) : 0;

                // Select All Data Depend On This ID

                $stmt = $con->prepare("SELECT * FROM blogs WHERE blogID = ?");

                // Execute Query

                $stmt->execute(array($blogID));

                // Fetch The Data

                $blg = $stmt->fetch();

                $count = $stmt->rowCount();

                    // If There's Such ID Show The Form

                    if ($count > 0) {
                      ?>
                      <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12" style="background: rgba(255,255,255,0.8);box-shadow: 0px 0px 10px 4px #e0e0e0;padding: 20px;margin-top:15px">
                          <div>
                            <img src="admin/data/uploads/<?php echo $blg["Image"]; ?>" alt="" class="blogimg" width="100%"/>
                            <h1 class="text-right"><?php echo $blg["arblogName"]; ?></h1>
                            <p class="text-right"><?php echo $blg["arblogDesc"]; ?></p>
                          </div>
                          
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 side-serv" style="background: rgba(177, 177, 177, 0.6);box-shadow: 0px 0px 10px 4px #e0e0e0;padding: 30px;float: right;margin-top:15px ">
                          
                          <?php 

                            foreach($serv as $sv) {
                                
                                  echo'
                                          <div class=" wow fadeInUp text-center row item" data-wow-duration="300ms" data-wow-delay="0ms"  >
                                                
                                                 
                                                  <div >
                                                      ';if($_SESSION['lang']=='en'){
                                                          echo '<h4 class="media-heading text-right">'.$sv['ServName'].'</h4>';
                                                      }else{
                                                          echo '<img src="admin/data/uploads/'.$sv['Image'].'" alt="img"  width="100" >
                                                          <h4 class="media-heading text-center" style="margin-top:27px;">'.$sv['arServName'].'</h4>
                                                          <a class="btn btn-services" style="border-radius: 30px;font-weight: 900;border: 2px solid;" href="https://api.whatsapp.com/send?phone=00970569660770">إحجز الآن <i class="fa fa-chevron-circle-right" style="font-size:15px"></i></a>'
                                                          ;
                                                      }
                                                      
                                                      echo
                                                      '</div>
                                                      
                                                      
                                                  
                                                  
                                            
                                          </div><!--/.col-md-8--> ';
                                     

                              }


                           ?>

                        </div>
                      </div>
                      <?php
                    }
          }//SIngle
               ?>

                

                
                
                

        


            </div>
          </div>   
    </section> 
<style type="text/css">
      @media only screen and (max-width: 900px) {
        .main-info {
            margin-top: 150px!important;
            color: white!important;
            padding: 30px;
        }
      }
    </style>

<?php include 'includes/footer.php'; ?>