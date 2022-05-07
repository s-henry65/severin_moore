<?php include('form_process.php'); ?>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="main_container">
  <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>Contact</h3>
    <fieldset>
      <input placeholder="Your name *" type="text" name="name" value="<?= $name ?>" tabindex="1" required autofocus>
      <span class="error"><?= $name_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address *" type="text" name="email" value="<?= $email ?>" tabindex="2" required autofocus>
      <span class="error"><?= $email_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="text" name="phone" value="<?= $phone ?>" tabindex="3">
      <span class="error"><?= $phone_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site starts with http://" type="text" name="url" value="<?= $url ?>" tabindex="4" autofocus>
      <span class="error"><?= $url_error ?></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Your comment or question" value="<?= $message ?>" name="message" tabindex="5" required autofocus>
      </textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <div class="success"><?= $success ?></div>
    <div class="success"><a href="index.html">Return</a></div>
  </form>
</div>
