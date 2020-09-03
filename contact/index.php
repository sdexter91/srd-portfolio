<!doctype html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/dh_bahkns/PHPMailer/src/Exception.php';
require '/home/dh_bahkns/PHPMailer/src/PHPMailer.php';
require '/home/dh_bahkns/PHPMailer/src/SMTP.php';

function sendMail() {
  $mail = new PHPMailer(true);

  try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sam@samrdexter.com';             // SMTP username
    $mail->Password = file_get_contents('../secret.json');                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sam@samrdexter.com', $_POST['email']);          //This is the email your form sends From
    $mail->addAddress('sam@samrdexter.com', 'Samantha Dexter'); // Add a recipient address
    //$mail->addAddress('contact@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New contact form submission from: ' . $_POST['name'];
    $mail->Body    = 'NAME: ' . $_POST['name'] . ' EMAIL: ' . $_POST['email'] . ' MESSAGE: ' . $_POST['message'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    return $mail->send();
  } catch (Exception $e) {
      // $mail->ErrorInfo;
    return false;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $emailSent = sendMail();
}

?>

<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;600;700&family=Josefin+Slab:wght@300;600;700&display=swap" rel="stylesheet">
  <title>Contact - Sam R. Dexter</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header>
    <div class="content-wrapper">
      <div class="nav-area">
        <figure>
          <a href="../">
            <img src="../img/samrdexter-logo.png" alt="srd logo">
          </a>
        </figure>
        <nav>
          <ul>
            <li><a href="../about/">about</a></li>
            <li><a href="../portfolio/">portfolio</a></li>
            <li><a href="../contact/">contact</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <section class="contact-hero-area">
      <div class="content-wrapper">
        <h1>Contact</h1>
      </div>
    </section>

  </header>

 <!-- <div style="height: 200px; background-color: red;">
    <?php
      // echo print_r($_POST);
    ?>
  </div> -->

  <main class="contact-area">
    <div class="content-wrapper">
      <h4>
        Have a question? Want to talk development? Feel free to leave a message and I’ll reply as soon as possible!  
      </h4>
      

      <form action="" method="POST">
        <div class="name-container">
          <label for="name">Name:</label><br>
          <input type="text" id="name" name="name" value="Your name" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"><br><br>
        </div>
        <div class="email-container">
          <label for="email">Email:</label><br>
          <input type="text" id="email" name="email" value="Your email" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"><br><br>
        </div>
        <div class="message-container">
          <label for="message">Your Message:</label><br>
          <input type="text" id="message" name="message" value="What can I help you with?" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"><br><br><br><br>
        </div>
        <div class="submit-button-container">
          <input class="submit-button" type="submit" value="send &#8594">
        </div>
      </form>

    </div>
  </main>

  <footer>
    <div class="content-wrapper">
        <address class="contact">
          <h4>Contact:</h4>
          <p>sam@samrdexter.com</p>
        </address>
        <figure>
          <a href="#">
            <img src="../img/samrdexter-logo.png" alt="srd logo">
          </a>
        </figure>
        <div class="social-icons">
          <a href="https://www.instagram.com/samrdexter/">
            <img src="../img/instagram.png" alt="instagram icon">
          </a>
          <a href="mailto:sam@samrdexter.com">
            <img src="../img/mail.png" alt="email icon">
          </a>
          <a href="https://www.linkedin.com/in/samanthardexter/">
            <img src="../img/linkedin.png" alt="linkedin icon">
          </a>
        </div>
    </div>
  </footer>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($emailSent)) {
      if ($emailSent) {
        echo "<script>alert('Email sent successfully!')</script>";
      } else {
        echo "<script>alert('Server error. Your email couldn't be sent.)</script>";
      }
    }
  ?>
</body>

</html>
