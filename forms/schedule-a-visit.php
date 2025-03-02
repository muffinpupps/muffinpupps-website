<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $schedule_a_visit = new PHP_Email_Form;
  $schedule_a_visit->ajax = true;
  
  $schedule_a_visit->to = $receiving_email_address;
  $schedule_a_visit->from_name = $_POST['name'];
  $schedule_a_visit->from_email = $_POST['email'];
  $schedule_a_visit->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $schedule_a_visit->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $schedule_a_visit->add_message( $_POST['name'], 'Name');
  $schedule_a_visit->add_message( $_POST['email'], 'Email');
  $schedule_a_visit->add_message( $_POST['phone'], 'Phone', 4);
  $schedule_a_visit->add_message( $_POST['date'], 'Date', 4);
  $schedule_a_visit->add_message( $_POST['time'], 'Time', 4);
  $schedule_a_visit->add_message( $_POST['people'], '# of people', 1);
  $schedule_a_visit->add_message( $_POST['message'], 'Message');

  echo $schedule_a_visit->send();
?>
