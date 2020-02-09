<?php
if(isset($_POST['email1'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "rkdecorators2010@gmail.com";
     
    $email_subject = "website html form submissions";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name1']) ||
        !isset($_POST['email1'])){
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name1 = $_POST['name1']; // required
    $email_from1 = $_POST['email1']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from1)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name1)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  // if(strlen($message) < 2) {
    // $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  // }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($first_name1)."\n";
    $email_message .= "Email: ".clean_string($email_from1)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from1."\r\n".
'Reply-To: '.$email_from1."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 

?>
 
<!-- place your own success html below -->
 
 Thank you for contacting us. We will be in touch with you very soon

 
<?php
}
die();
?>