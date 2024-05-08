<?php 
$nonav="";
include 'admin/connect.php';
include 'admin/includes/functions/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name   = $_POST['name'];
        $email     = $_POST['email'];
        $phone    = $_POST['phone'];
        $subject  = $_POST['subject'];
        $message   = $_POST['message'];
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
          header("Location:index.php");
      }?>
