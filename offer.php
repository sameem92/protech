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
$offers = $con->prepare("SELECT  * FROM  offers ");
      // Execute The Statement
      $offers->execute();
      // Assign To Variable 
      $offer = $offers->fetchAll();
      $offerCount= $offers->rowCount();
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
                        <li class="scroll active"><a href="offer.php" data="#pricing"><?php echo $lang['ofr'];?></a></li>
                      
                        <li class=""><a href="index.php#clients" data="#clients">عملاؤنا</a></li>
                        <li class=""><a href="blog.php" data="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class=""><a href="news.php" data="#news"> المدونة</a></li>
                        <li class="scroll"><a href="#testimonial" data="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
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
                  echo ' <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown" style="font-size: 40px">عروضنا <img src="images/point.png" width="100"></h2>
            </div>';
                  foreach ($offer as $ofr) {
      # code...
     ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pod" url="#" number="2" style="float:right">
      <div class="hover-offer ehover1"><img class="img-responsive" src="admin/data/uploads/<?php echo $ofr['Image'] ?>" alt="París" />
        <div class="offer-content">
          <div class="ribbon orange">الأكثر مبيعا</div>
          <figcaption> 
            <h4 class="text-right">نظام العقارات</h4>
            <p class="detail text-right">لإدارة مختلف العقارات</p>
            <p class="price-offer text-right"><span>انطلاقا من</span> $300 </p>
            <div style="position:absolute;left:10px;bottom:10px">
                <a class="btn btn-services" style="border-radius: 30px;font-weight: 900;border: 2px solid;float:right" href="https://api.whatsapp.com/send?phone=00970569660770">إحجز الآن <i class="fa fa-chevron-circle-right" style="font-size:15px"></i></a>
                <a class="btn btn-services" style="border-radius: 30px;font-weight: 900;border: 2px solid;float:right;margin-right:15px;" href="offer.php?do=Single&offer=<?php echo $ofr['offerID'] ?>"> تفاصيل <i class="fa fa-plus" style="font-size:15px"></i></a>
            </div>
            
          </figcaption>
        </div>
      </div>
    </div>
    <?php } ?>


  </div>
</section>
<style type="text/css">
  


/*✂------------ OFFERS-NEW PODS ¸.·´¯`·.´¯`·.¸¸.·´¯`·.¸><(((º>*/


.hover-offer, .hover-offer h2 {
  text-align: left;
}
.hover-offer, .hover-offer .overlay {
  width: 95%;
  max-width: 450px;
  height: auto;
  overflow: hidden
}
.hover-offer button.info, .hover-offer h2 {
  text-transform: uppercase;
  color: #fff
}
.hover-offer {
cursor: pointer;
  margin-bottom: 20px;
  border-radius: 2px;
  width: 100%;
      min-width: 267px;
  max-height: 350px;
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
}
.hover-offer .overlay {
  position: absolute;
  top: 0;
  left: 0
}
.hover-offer img {
  display: block;
  position: relative;
}
.offer-content {
position: absolute;
    z-index: 10;
    /* height: 100%; */
       width: 94%;
    /* max-height: 239px; */
    bottom: 0;
    padding: 5% 4% 14% 7%;
    color: #FFF;
   background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.8) 30%, rgba(0, 0, 0, 0.42) 80%);
    background-image: -moz-linear-gradient(45deg, rgba(0, 0, 0, 0.8) 30%, rgba(0, 0, 0, 0.42) 80%);
    background-image:-webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.8) 30%, rgba(0, 0, 0, 0.42) 80%);
    /* background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 60%); */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr= '#000', endColorstr='transparent', GradientType=1 );
    /* -webkit-transition: all .3s ease-out 0s; */
    -moz-transition: all .3s ease-out 0s;
    -o-transition: all .3s ease-out 0s;
    -ms-transition: all .3s ease-out 0s;
    transition: all .3s ease-out 0s;
    margin-bottom: 20px;
    margin-top: 1px;
    top: 0;
}
.offer-content h4 {
  font-size: 170% !important;
  margin-top: 10px;
  margin-bottom: 16px;
  font-weight: 700;
  margin-top: 20px;
}
.offer-content .price {
  font-size: 20px;
  color: #fff;
  text-align: left;
  padding-top: 2%;
}
.ehover1 img {
  -webkit-transition: all .4s linear;
  transition: all .4s linear
}
.ehover1 .overlay {
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out
}
.ehover1:hover img {
  -ms-transform: scale(1.2);
  -webkit-transform: scale(1.2);
  transform: scale(1.2)
}
.ehover1:hover .overlay {
  opacity: 1
}
.offer-content .price-offer {
  font-size: 32px;
  color: #fff;
  margin-top: 10px;
}
.flights-icon {
  border: 1px solid #ffffff;
  border-radius: 100%;
  display: block;
  font-family: "theme-icons";
  font-size: 20px !important;
  height: 38px;
  line-height: 38px !important;
  text-align: center;
  width: 38px;
}
p.detail {
  font-size: 118%;
  line-height: 38px;
}
p.price-offer {
  font-size: 16px;
  color: #fff;
  font-weight: 500;
  line-height: 23px;
}
p.price-offer span {
  font-size: 16px;
}
/* RIBBON */


.ribbon {
  position: absolute;
  z-index: 10;
  padding: 0px 7px;
  /* margin-left: 62.5%; */
    /* margin-right: 12.0%; */
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
  font-size: 15px;
  line-height: 32px;
  font-weight: bold;
  text-align: center;
  color: #fff;
  text-shadow: 0 1px 1px rgba(0,0,0,0.2);
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.2);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.2);
  box-shadow: 0 1px 1px rgba(0,0,0,0.2);
  zoom: 1;
   top: 10px; 



 left: -10px; 
  min-width: 40%;
  max-width: 50%;
  height: 32px;

}
.orange {
  background: #308ab4;
}
.blue {
  background: #3398d9
}
.green {
  background: #66b94d;
}
.ribbon:after {
  content: "";
  position: absolute;
  z-index: -20;
  top: 100%;
  left: auto;
  border-style: solid;
  border-width: 0 10px 10px 0;
  left: 0;
}
.orange:after {
  border-color: transparent #2a4458;
}
.blue:after {
  border-color: transparent #1e5b82;
}
.green:after {
  border-color: transparent #3e7030;
}
.no-ribbon {
  height: 41px;
  position: absolute;
  z-index: 2000;
}
/*END OF RIBBON */


@media (min-width: 992px) {
.container {
  width: 980px;
}

}

@media (max-width: 768px) {
.offer-content h4 {
  font-size: 150% !important;
}
p.detail {
  font-size: 140%;
  text-shadow: 1px 1px 9px rgba(0, 0, 0, 1);
    line-height: 18px;
}
.offer-content {
position: absolute;
 z-index: 10;
 min-width:279px;
max-width: 400px;
width: 89%;
bottom: 0;
 color: #FFF;
     padding: 5% 7% 14% 7%;
}
.hover-offer {
  width:95%;
    min-width: 280px;
 min-height: auto;
 max-height: 550px;
 /*max-width: 640px;*/
  /* margin-left: auto; */
  margin-right: auto;
  /* height: 100%; */

/* width: auto; */
}
.col-xs-offset-1 {
  margin-left: 0;
}
.ribbon {
  width: 60%;
  left: -10px;
}
}

@media (max-width: 545px) {
.button2 {
 width: 80%;
 padding: 23px;
 font-size: 23px;
 margin-right: 2%;
       bottom: 2%;
}
.ribbon {
  width: 49.9%;
 left: -10px%;
}
}

.hover-offer {
  position: initial
}
.col-lg-3, .col-md-4, .col-sm-6, .col-xs-12 {
  padding: 0 10px
}

@media (min-width: 1024px) {
.offer-content:hover {
  box-shadow: none
}
.offer-content:hover figcaption {
  background-image: none
}
}
/*------------ END OF OFFERS ✂----------------------✂*/
</style> <?php  
            } elseif($do='Single'){
              $offerID = isset($_GET['offer']) && is_numeric($_GET['offer']) ? intval($_GET['offer']) : 0;

                // Select All Data Depend On This ID

                $stmt = $con->prepare("SELECT * FROM offers WHERE offerID = ?");

                // Execute Query

                $stmt->execute(array($offerID));

                // Fetch The Data

                $ofr = $stmt->fetch();

                $count = $stmt->rowCount();

                    // If There's Such ID Show The Form

                    if ($count > 0) {
                      ?>
                      <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12" style="background: rgba(255,255,255,0.8);box-shadow: 0px 0px 10px 4px #e0e0e0;padding: 20px;margin-top:15px">
                          <div>
                            <img src="admin/data/uploads/<?php echo $ofr['Image'] ?>" alt="" class="blogimg" width="100%"/>
                            <h1 class="text-right"><?php echo $ofr["arofferName"]; ?></h1>
                            <p class="text-right"><?php echo $ofr["arofferDesc"]; ?></p>
                            <a class="btn btn-services" style="border-radius: 30px;font-weight: 900;border: 2px solid;float:right" href="https://api.whatsapp.com/send?phone=00970569660770">إحجز الآن <i class="fa fa-chevron-circle-right" style="font-size:15px"></i></a>
                          </div>
                          
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12 side-serv" style="background: rgba(255, 255, 255, 0.8);box-shadow: 0px 0px 10px 4px #e0e0e0;padding: 30px;float: right;margin-top:15px ">
                          
                          <?php 

                            foreach($serv as $sv) {
                                
                                  echo'
                                          <div class=" wow fadeInUp text-center row item" data-wow-duration="300ms" data-wow-delay="0ms"  >
                                                
                                                 
                                                  <div >
                                                      ';if($_SESSION['lang']=='en'){
                                                          echo '<h4 class="media-heading text-right">'.$sv['ServName'].'</h4>';
                                                      }else{
                                                          echo '<img src="admin/data/uploads/'.$sv['Image'].'" alt="img"  width="100" >
                                                          <h4 class="media-heading text-center" >'.$sv['arServName'].'</h4>
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