<?php
//mail variable setup
$to = 'glenn451@gmail.com';
$subject = 'test mail';

//message content
$message = 'this is a test';

// word wrap after 70 chars
$message = wordwrap($message, 70);

//header field
$headers = 'From: info@mygifter.com' . "\r\n" .
    'Reply-To: alouie987@yahoo.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

//the actual mail command
mail($to, $subject, $message, $headers);
?>
