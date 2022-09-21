<!DOCTYPE html>
<html lang="en">
<link href="./icons/favicon.ico" rel="icon" sizes="16x16" type="image/png">

<body>
<?php  include "include/header.php"?>
<!--<br>-->
<div class="cont">
    <br>
    <br>
    <h2>Write Us</h2>
    <form method="POST" action="contactMail.php">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="text" name="name" id="name" placeholder=" Enter your name">
        <input type="subject" name="subject" id="subject" placeholder=" Subject">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message here"></textarea>
        <button type="submit" value="Send" class="btn btn-primary w-75">Send</button>
    </form>
</div>

<div class="section-padding"></div>
<?php  include "include/footer.php"?>

<link rel="stylesheet" href="css/contact.css">
</body>

</html>