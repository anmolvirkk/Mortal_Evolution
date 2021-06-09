<?php
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$headers = 'From: ' . $email;

mail('theanmolvirk@gmail.com', $subject, $message, $headers);
?>
