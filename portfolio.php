<?php
$nonav="";
include 'admin/connect.php';
include 'admin/includes/functions/functions.php';
$page = '';

$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
$check = checkItem("ID", "categories", $catid);
        if ($check == 1) {
            if(Size_Cat($catid)=='col-md-6 col-lg-6 col-sm-12 col-xs-12'){
               $record_per_page = 6;
               if(isset($_GET["page"]))
                {
                 $page = $_GET["page"];
                }
                else
                {
                 $page = 1;
                }

                $start_from = ($page-1)*$record_per_page;
                $items = $con->prepare("SELECT  * FROM  items  WHERE Cat_ID=$catid ORDER BY Item_ID DESC LIMIT $start_from, $record_per_page ");
               
            }else{
              $record_per_page = 12;
               if(isset($_GET["page"]))
                {
                 $page = $_GET["page"];
                }
                else
                {
                 $page = 1;
                }

                $start_from = ($page-1)*$record_per_page;
                $items = $con->prepare("SELECT  * FROM  items  WHERE Cat_ID=$catid  ORDER BY Item_ID DESC LIMIT $start_from, $record_per_page  ");
              
            }
          
      // Execute The Statement
      $items->execute();
      // Assign To Variable 
      $itm = $items->fetchAll();
        } else {
          $record_per_page = 12;
               if(isset($_GET["page"]))
                {
                 $page = $_GET["page"];
                }
                else
                {
                 $page = 1;
                }

                $start_from = ($page-1)*$record_per_page;
          $items = $con->prepare("SELECT  * FROM  items  WHERE Approve=1 ORDER BY Item_ID DESC LIMIT 12");
      // Execute The Statement
      $items->execute();
      // Assign To Variable 
      $itm = $items->fetchAll();
        }
        $itemst = $con->prepare("SELECT  * FROM  items  ");
      // Execute The Statement
      $itemst->execute();
      $itemscount= $itemst->rowCount();

$about = $con->prepare("SELECT  * FROM  about");
      // Execute The Statement
      $about->execute();
      // Assign To Variable 
      $abot = $about->fetchAll();

$categories = $con->prepare("SELECT  * FROM  categories");
      // Execute The Statement
      $categories->execute();
      // Assign To Variable 
      $cat = $categories->fetchAll();


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
                        <li class="scroll active"><a href="portfolio.php" data="#portfolio"><?php echo $lang['prtf'];?></a></li>
                        <li class=""><a href="offer.php" data="#pricing"><?php echo $lang['ofr'];?></a></li>
                      
                        <li class=""><a href="index.php#clients" data="#clients">عملاؤنا</a></li>
                        <li class=""><a href="index.php#blog" data="#blog"> <?php echo $lang['blg'];?></a></li>
                        <li class=""><a href="news.php" data="#news"> المدونة</a></li>
                        <li class="scroll"><a href="index.php#testimonial" data="#testimonial"> <?php echo $lang['testi-title'];?></a></li>
                        <li class="scroll"><a href="#get-in-touch" data="#get-in-touch" ><?php echo $lang['cntct'];?></a></li>
                          
                          
                       <?php } ?>                         
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
<section id="main-slider" class="row" style="height: 100vh">
      <div class="col-md-4 col-sm-0 " ></div>
      <div class="col-md-8 col-sm-12 main-info" >
        <h1 class="text-center " style="color:white"> شركة  <span class="pro-tech" style="font-size: 50px">برو تك    </span>للتصميم والبرمجيات </h1>
       
        <p class="text-center">شركة  <span class="pro-tech" style="">برو تك    </span>  نقدم لكم من خلال رؤية أعمالنا يمكن لعملائنا الكرام تقييم مدى
 جودة المشاريع المنفذة وزيادة الثقة بفريق العمل لدينا   </p>
      
        
      </div>

    </section><!--/#main-slider-->
<section id="portfolio" class="block">
       
           <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $lang['prft-title'];?> <img src="images/point.png" width="100"></h2>
            </div>

             <div class="text-center">
              
                <ul class="portfolio-filter text-center  row ">
                    <li class="col-lg-3 col-md-3 col-sm-4 col-xs-12" <?php if($_SESSION['lang']=='ar'){ echo' style="float:right"';}?>><a class="<?php if($catid==0){ echo'active';}?>" data-id="0"  data-filter=".cat0" id="allcat"><?php echo $lang['All'];?></a></li>
                    <?php foreach($cat as $ct) {
                        if($_SESSION['lang']=='en'){
                                    echo '<li class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><a href="#" class="cat-filter  " data-id="'.$ct['ID'].'" data-filter=".cat'.$ct['ID'].'">'.$ct['Name'].'</a></li>';
                                }else{
                                    echo '<li style="float:right" class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><a  data-id="'.$ct['ID'].'" class="cat-filter ';if($catid==$ct['ID']){ echo' active ';}echo'" data-filter=".cat'.$ct['ID'].'">'.$ct['Description'].'</a></li>';
                                
                                }
   
                   
            }?>
                    
                    
                </ul><!--/#portfolio-filter-->
            </div>
         <div class="container">
            <input type="hidden" id="cathidden" value="all">
            <div id="prtf-itm" class="portfolio-items row" >
                <?php foreach($itm as $it) {
   
                   
                    if($it['Type']=='video'){
                        echo '<div class="portfolio-item pt-item-video cat'.$it['Cat_ID'].' '.Size_Cat($catid);if($catid==0){ echo' col-md-4';} echo'"  >
                    <div class="portfolio-item-inner">';
                        echo '<div class="video">
                        
                        <video  controls muted autoplay="off" >
                              <source src="admin/data/uploads/'.$it['Image'].'" autoplay="off" >
                              
                              Your browser does not support the video tag.
                            </video>
                          
                        </div>';
                    }
                    elseif($it['Type']=='image'){
                        echo '<div class="portfolio-item pt-item-image cat'.$it['Cat_ID'].' '.Size_Cat($catid);if($catid==0){ echo' col-md-4';} echo'" >
                    <div class="portfolio-item-inner">';
                        echo'<img class="" src="admin/data/uploads/'.$it['Image'].'" alt=""><div class="portfolio-info">
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
           

             
                 
               

        </div><!--/.container-->
  <div></div>
  <nav aria-label="Page navigation" id="p-nav" style="display: flex;justify-content: center;">
  <ul class="pagination" >
        <?php 
     $items = $con->prepare("SELECT  * FROM  items  ");
      // Execute The Statement
      $items->execute();
      // Assign To Variable 
      $total_records = $items->rowCount();
    
    $total_pages = ceil($itemscount/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference >= 1)
    {
     $start_loop = $total_pages - 1;
    }
    $end_loop = $start_loop + 1;
    if($page > 1)
          {
           
           $pagination.= "<li><a class='btn pagination_link' catid='".$catid."'  data-page='".($page - 1)."' ><< السابق</a></li>";
          }
          
          if($page < $total_pages)
          {
           $pagination.= "<li><a class='btn pagination_link' catid='".$catid."'  data-page='".($page + 1)."' >التالي >></a></li>";
          }
     ?>
     
    

   
  </ul>
</nav>
    </section><!--/#portfolio-->
    <style type="text/css">
      @media only screen and (max-width: 900px) {
        .main-info {
            margin-top: 20%!important;
            color: white!important;
            padding: 30px;
        }
      }
    </style>

<?php include 'includes/footer.php'; ?>