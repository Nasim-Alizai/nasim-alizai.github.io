<?php

/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
// $receiving_email_address = 'sayedhakimi449@gmail.com';

// if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
//   include( $php_email_form );
// } else {
//   die( 'Unable to load the "PHP Email Form" Library!');
// }

// $contact = new PHP_Email_Form;
// $contact->ajax = true;

// $contact->to = $receiving_email_address;
// $contact->from_name = $_POST['name'];
// $contact->from_email = $_POST['email'];
// $contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

// $contact->add_message( $_POST['name'], 'From');
// $contact->add_message( $_POST['email'], 'Email');
// $contact->add_message( $_POST['message'], 'Message', 10);

// echo $contact->send();



$to = 'sayedhakimi449@gmail.com';
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
  $headers = [
    'From' => ($name ? "<$name> " : '') . $from,
    'X-Mailer' => 'PHP/' . phpversion()
  ];

  mail($to, $subject, $message . "\r\n\r\nfrom: " . $_SERVER['REMOTE_ADDR'], $headers);
  die('OK');
} else {
  die('Invalid address');
}