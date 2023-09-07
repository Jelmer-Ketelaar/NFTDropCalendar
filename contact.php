<!DOCTYPE html>
<html lang="en">
<head>
  <link href="./icons/favicon.ico" rel="icon" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="css/contact.css">
</head>
<body>
  <?php $paginanaam = 'Contact';
        include "include/header.php";
  ?>
  <div class="cont">
    <h2>Write Us</h2>
    <form method="POST" action="contactMail.php">
      <input type="email" name="email" id="email" placeholder="Enter your email"> <br>
      <input type="text" name="name" id="name" placeholder="Enter your name"><br>
      <input type="subject" name="subject" id="subject" placeholder="Subject"><br>
      <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message here"></textarea><br>
      <button type="submit" value="Send" class="btn btn-primary w-75">Send</button>
    </form>
  </div>
  <div class="section-padding"></div>
  <?php include "include/footer.php" ?>
</body>
</html>