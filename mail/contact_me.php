<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['language']) 		||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$language = $_POST['language'];
$friend_name = $_POST['friend_name'];
$friend_email_address = filter_var($_POST['friend_email'], FILTER_VALIDATE_EMAIL);
if ($friend_email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$friend_language = $_POST['friend_language'];


// Create the email and send the message
$to = 'katrina@engelsted.co'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@techiewomen.org\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
