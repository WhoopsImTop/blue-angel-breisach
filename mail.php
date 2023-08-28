<?php

//allow Cors
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


if (isset($_POST['image_form']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['subject'])) {
    //send a mail to info@blue-angle.de and englen@khri8.com with the submitted images and data

    //create the mail
    $to = "englen@khri8.com";
    $subject = "Bewerbung";
    $message = "Vorname: " . $_POST['firstname'] . "\nNachname: " . $_POST['lastname'] . "\nEmail: " . $_POST['email'] . "\nNachricht: " . $_POST['subject'];
    $headers = "From: info@blue-angel.de";

    //send the mail
    $ok = mail_att($to, $subject, $message, 'Bewerbungsformular Blue Angel', 'info@blue-angel.de', 'info@blue-angel.de', $_FILES['file']);
    //return json response
    if ($ok) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

if (isset($_POST['contact_form']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['subject'])) {
    //send a mail to info@blue-angle with the submitted data
    $to = "englen@khri8.com";
    $subject = "Kontakt";
    $message = "Vorname: " . $_POST['firstname'] . "\nNachname: " . $_POST['lastname'] . "\nEmail: " . $_POST['email'] . "\nNachricht: " . $_POST['subject'];
    $headers = "From: info@blue-angle.de";
    //send the mail
    $ok = mail($to, $subject, $message, $headers);
    if ($ok) {
        echo "success";
    } else {
        echo "error";
    }
}

function mail_att($to, $subject, $message, $sender, $sender_email, $reply_email, $dateien) {   
   if(!is_array($dateien)) {
      $dateien = array($dateien);
   }   
   
   $attachments = array();
   foreach($dateien AS $key => $val) {
      if(is_int($key)) {
        $datei = $val;
        $name = basename($datei);
     } else {
        $datei = $key;
        $name = basename($val);
     }
     
      $size = filesize($datei);
      $data = file_get_contents($datei);
      $type = mime_content_type($datei);
     
      $attachments[] = array("name"=>$name, "size"=>$size, "type"=>$type, "data"=>$data);
   }
 
   $mime_boundary = "-----=" . md5(uniqid(microtime(), true));
   $encoding = mb_detect_encoding($message, "utf-8, iso-8859-1, cp-1252");
 
   $header  = 'From: "'.addslashes($sender).'" <'.$sender_email.">\r\n";
   $header .= "Reply-To: ".$reply_email."\r\n";
 
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-Type: multipart/mixed; charset=\"$encoding\"\r\n";
   $header .= " boundary=\"".$mime_boundary."\"\r\n";
 
   
   $content  = "This is a multi-part message in MIME format.\r\n\r\n";
   $content .= "--".$mime_boundary."\r\n";
   $content .= "Content-Type: text/html; charset=\"$encoding\"\r\n";
   $content .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
   $content .= $message."\r\n";
 
   //$anhang ist ein Mehrdimensionals Array
   //$anhang enthält mehrere Dateien
   foreach($attachments AS $dat) {
         $data = chunk_split(base64_encode($dat['data']));
         $content.= "--".$mime_boundary."\r\n";
         $content.= "Content-Disposition: attachment;\r\n";
         $content.= "\tfilename=\"".$dat['name']."\";\r\n";
         $content.= "Content-Length: .".$dat['size'].";\r\n";
         $content.= "Content-Type: ".$dat['type']."; name=\"".$dat['name']."\"\r\n";
         $content.= "Content-Transfer-Encoding: base64\r\n\r\n";
         $content.= $data."\r\n";
   }
   $content .= "--".$mime_boundary."--"; 
   
   return mail($to, $subject, $content, $header);
}
 