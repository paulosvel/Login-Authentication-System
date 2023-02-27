<!DOCTYPE html>
<html>
<head>
<style>.form{
        margin-top: 75px;
    } </style></head>
  <body>

  <form class="form"action="<?php echo base_url('create'); ?>" method="post">
  <h3></h3>
  <p>Message:</p>
  <textarea rows="4" cols="50" name="body_text"></textarea>
  <input type="submit" value="Send" name="create">
  <?= ($this->session->flashdata('status')); ?>
</div>
  </body>
</html>


