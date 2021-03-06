<?php

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'akirakim.soriano@gmail.com';
$email_subject = "The Washing Well™ Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n".
"Here are the details:\n\n Name : " $name "\n\nEmail: " $email_address "\n\nPhone: " $phone "\n\nMessage:\n" $message;
$headers = "From: noreply@thewashingwell.com\n";
$headers .= "Reply-To: "$email_address;	
$mail = mail($to,$email_subject,$email_body,$headers);

if($mail){
   return true;   
  echo "Thank you for using our mail form";
}else{
  echo "Mail sending failed."; 
}		
?>
