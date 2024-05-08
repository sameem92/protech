<?php 

include 'admin/connect.php';

 if(isset($_POST["name"]))  
 {  
      $name = $_POST["name"];  
      $message = $_POST["message"];
      $subject = $_POST["subject"];   
      $email = $_POST["email"];
      $phone = $_POST["phone"];

      $stmt = $con->prepare("INSERT INTO 

            message (name,email,phone,subject,message)

            VALUES(:zname,:zemail,:zphone,:zsubject,:zmessage)");

          $stmt->execute(array(

            'zname'   => $name,
            'zemail'  => $email,
            'zphone'  => $phone,
            'zsubject'=> $subject,
            'zmessage'=> $message

          ));
          $count=$stmt->rowCount();
      if($count>0)  
      {  
           echo "Message Saved";  
      }  
 }  
 

    ?>