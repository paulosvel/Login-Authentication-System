<!DOCTYPE html>
<html>
<head>
<style>.form{
        margin-top: 75px;
    } </style></head>
  <body>

    <div class = "form" id="Form" class="tabcontent">
  <h3></h3>
  <form method="post" action="<?= site_url('form/create') ?>">
  <p>Message:</p>
  <textarea rows="4" cols="50"></textarea>
  <input type="submit" value="Send" name="create">
  <?= ($this->session->flashdata('status')); ?>
</div>
  </body>
</html>