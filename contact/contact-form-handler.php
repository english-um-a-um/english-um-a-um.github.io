<?php 
$errors = '';
$myemail = ‘nichrishayes2@yahoo.com’;//<——Put Your email address here.
if(empty($_POST[‘FirstName’])  ||
   empty($_POST[‘LastName’])  || 
   empty($_POST[‘Email’]) ||
   empty($_POST[‘Phone’]) || 
   empty($_POST[‘Gender’]) ||
   empty($_POST[‘Message’]))
{
    $errors .= "\n Error: all fields are required";
}

$firstname = $_POST[‘FirstName’]; 
$lastname = $_POST[‘LastName’];
$email_address = $_POST[‘Email’];
$phone = $_POST[‘Phone’];
$message = $_POST[‘Message’]; 


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $firstname $lastname”;
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $firstname $lastname \n Email: $email_address \n Phone: $phone \n Message: \n $Message”; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thankyou.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>