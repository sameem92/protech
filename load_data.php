<?php  
$output = '';  
$video_id = '';  

sleep(1);  

include "config.php";
include 'admin/connect.php';
include 'admin/includes/functions/functions.php';


if ($_POST['action']=='cats'){
  $cat=$_POST['cat'];
  $catid = isset($_POST['cat']) && is_numeric($_POST['cat']) ? intval($_POST['cat']) : 0;
  $check = checkItem("ID", "categories", $catid);
        if ($check == 1) {
            if(Size_Cat($catid)=='col-md-6 col-lg-6 col-sm-12 col-xs-12'){
               $record_per_page = 6;
               if(isset($_POST["page"]))
                {
                 $page = $_POST["page"];
                }
                else
                {
                 $page = 1;
                }

                $start_from = ($page-1)*$record_per_page;
                $items = $con->prepare("SELECT  * FROM  items  WHERE Cat_ID=$catid ORDER BY Item_ID DESC LIMIT $start_from, $record_per_page ");
                $itemst = $con->prepare("SELECT  * FROM  items  WHERE Cat_ID=$catid  ");
               
            }else{
              $record_per_page = 12;
               if(isset($_POST["page"]))
                {
                 $page = $_POST["page"];
                }
                else
                {
                 $page = 1;
                }

                $start_from = ($page-1)*$record_per_page;
                $items = $con->prepare("SELECT  * FROM  items  WHERE Cat_ID=$catid  ORDER BY Item_ID DESC LIMIT $start_from, $record_per_page  ");
                $itemst = $con->prepare("SELECT  * FROM  items  WHERE Cat_ID=$catid  ");
              
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
          $items = $con->prepare("SELECT  * FROM  items  WHERE Approve=1 ORDER BY Item_ID DESC LIMIT  $start_from, $record_per_page");
          $itemst = $con->prepare("SELECT  * FROM  items  WHERE Approve=1");
      // Execute The Statement
      $items->execute();
      // Assign To Variable 
      $itm = $items->fetchAll();
        }



    
      // Execute The Statement
      $itemst->execute();
      $itemscount= $itemst->rowCount();
      $output='';

if($itemscount > 0)  
{  
       foreach($itm as $it) {
   
                   
                    if($it['Type']=='video'){
                        $output.= '<div class="portfolio-item cat'.$it['Cat_ID'].' '.Size_Cat($cat).' "  >
                    <div class="portfolio-item-inner">';
                        $output.= '<div class="video">
                        
                        <video  controls muted autoplay="off" >
                              <source src="admin/data/uploads/'.$it['Image'].'" >
                              
                              Your browser does not support the video tag.
                            </video>
                          
                        </div>
                        </div>
                        </div>';
                    }
                    elseif($it['Type']=='image'){
                        $output.= '<div class="portfolio-item cat'.$it['Cat_ID'].' '.Size_Cat($catid).' pt-item-image" >
                    <div class="portfolio-item-inner">';
                        $output.='<img class="" src="admin/data/uploads/'.$it['Image'].'" alt=""><div class="portfolio-info">
                            <div class="p-info">
                            <h3 class="text-center">'.$it['Name'].'</h3>
                            <p class="text-center">
                            '.$it['Description'].'
                            </p>
                            </div>
                        </div>
                        </div>
                        </div>';
                    }
                        
                        
                    $output.=  '
                    
                <!--/.portfolio-item-->';
                 $last = $it["Item_ID"];
            }
            $button='<span  class="col-sm-12 portfolio-item"  id="remove_row"><button type="button" name="btn_more" style="width: 100px;!important" data-vid="'.$last.'" id="btn_more" class="text-center btn btn-primary form-control">'.$lang["more"].'</button></span> ';
     
     
}else{
  $output='<img src="images/emty.png" style="width:40%;margin-left:30%">';
} 
$pagination='<ul class="pagination" >';

    
    $total_pages = ceil($itemscount/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference <= 1)
    {
     $start_loop = $total_pages - 1;
    }
    $end_loop = $start_loop + 1;
    if($page > 1 )
          {
           
           $pagination.= "<li><a class='btn pagination_link' catid='".$catid."'  data-page='".($page - 1)."' ><< السابق</a></li>";
          }
          
          if($page < $total_pages)
          {
           $pagination.= "<li><a class='btn pagination_link' catid='".$catid."'  data-page='".($page + 1)."' >التالي >></a></li>";
          }
$pagination.='</ul>';

$arr= array();
     $arr[]=$output;
     $arr[]=$pagination;
    
       echo json_encode($arr);
}
if ($_POST['action']=='testi'){
  
              $record_per_page = 10;
               if(isset($_POST["page"]))
                {
                 $page = $_POST["page"];
                }
                else
                {
                 $page = 1;
                }

                $start_from = ($page-1)*$record_per_page;
                $items = $con->prepare("SELECT  * FROM  testi ORDER BY testiID DESC LIMIT $start_from, $record_per_page  ");
              
            
          
          // Execute The Statement
          $items->execute();
          // Assign To Variable 
          $itm = $items->fetchAll();
     



   
      $itemscount= $items->rowCount();
      $output='';

if($itemscount > 0)  
{  
       foreach($itm as $tst) {
   
                   
                   
                   
                        $output.= '<div class="col-sm-6">
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
            
     
     
}else{
  $output='<img src="images/emty.png" style="width:40%;margin-left:30%">';
} 
$pagination='<ul class="pagination" >';

    
    $total_pages = ceil($itemscount/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference <= 1)
    {
     $start_loop = $total_pages - 1;
    }
    $end_loop = $start_loop + 1;
     if($page > 1)
          {
           
           $pagination.= "<li><a class='btn pagination_link_testi' data-page='".($page - 1)."' ><< السابق</a></li>";
          }
          
          if($page < $total_pages)
          {
           $pagination.= "<li><a class='btn pagination_link_testi' data-page='".($page + 1)."' >التالي >></a></li>";
          }
$pagination.='</ul>';

$arr= array();
     $arr[]=$output;
     $arr[]=$pagination;
    
       echo json_encode($arr);
}
?>
