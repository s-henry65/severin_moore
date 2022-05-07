<?php

// define variables and set to empty values
$name_error = $email_error = $phone_error = "";
$name = $email = $phone = $message = $success = "";

// Function definition
function alert_message($message) {
      
  // Display the alert box 
  echo "<script>alert('$message');</script>";
}

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    alert_message("Name is required");
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      alert_message("Only letters and white space allowed");
    }
  }

  if (empty($_POST["email"])) {
    alert_message("Email is required");
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      alert_message("Invalid email format");
    }
  }

  if (empty($_POST["phone"])) {
    $phone_error = "";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      alert_message("Invalid phone number");
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }

      $to = 'scott.henry.moore@gmail.com';
      $subject = 'Contact Form Submit';
      if (mail($to, $subject, $message_body)){
        alert_message("$name, thank you for contacting me! Please hit back (arrow) to return.");
        
    }
}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
