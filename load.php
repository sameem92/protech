<?php  
$output = '';  
$video_id = '';  

sleep(1);  

include "config.php";
include 'admin/connect.php';
$cat=$_POST['cat'];
if($_POST['cat']=='all'){
  $query="SELECT  * FROM  items  WHERE Item_ID > ".$_POST['last_video_id']." LIMIT 4";
}else{
  $query="SELECT  * FROM  items  WHERE  Cat_ID=$cat   LIMIT 4";
}
$items = $con->prepare($query); 
      // Execute The Statement
      $items->execute();
      // Assign To Variable 
      $itm = $items->fetchAll();
      $itemscount= $items->rowCount();
$output='';

if($itemscount > 0)  
{  
       foreach($itm as $it) {
   
                   
                    if($it['Type']=='video'){
                        $output .= '<div class="portfolio-item cat'.$it['Cat_ID'].' col-md-4 col-sm-6" >
                    <div class="portfolio-item-inner"><div class="video">
                          <iframe class="" src="admin/data/uploads/'.$it['Image'].'"></iframe>
                        </div>';
                    }
                    elseif($it['Type']=='image'){
                        $output .= '<div class="portfolio-item cat'.$it['Cat_ID'].' col-md-4 col-sm-6">
                    <div class="portfolio-item-inner"><img class="" src="admin/data/uploads/'.$it['Image'].'" alt="">';
                    }
                        
                        
                   $output .= '</div>
                </div><!--/.portfolio-item-->';
                 $last = $it["Item_ID"];
            }
            $button='<span  class="col-sm-12 portfolio-item"  id="remove_row"><button type="button" name="btn_more" style="width: 100px;!important" data-vid="'.$last.'" id="btn_more" class="text-center btn btn-primary form-control">'.$lang["more"].'</button></span> ';
     
     
}else{
  $button='<span  class="col-sm-12 portfolio-item"  id="remove_row"><button type="button" name="btn_more" style="width: 100px;!important" data-vid="'.$_POST['last_video_id'].'" id="btn_more" class="text-center btn btn-primary form-control">'.$lang["no_more"].'</button></span> ';
}  
$arr= array();
     $arr[]=$output;
     $arr[]=$button;
       echo json_encode($arr);
?>
