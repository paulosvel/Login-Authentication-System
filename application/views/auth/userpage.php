<!DOCTYPE html>
<html>
  <head>
    <style>.profile{
        margin-top: 80px;
    }
    .label{
        min-width: 80px;
    }
    .flex{
        display: flex;
        flex-direction: row;
    }
    
    </style>
  </head>
  <body>
  <?php if(!$this->session->has_userdata('logged_in')){}?>


  <form class="profile"action="<?php echo base_url('update'); ?>" method="post">
    <div class="flex">
    <div class="label">
    <label for="first_name">First Name:</label>
</div>
    <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>">
    </div>
    <?php echo form_error('first_name'); ?>
    <br><br>
    <div class="flex">
    <div class="label">
    <label for="last_name">Last Name:</label>
    </div>
    <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>">
    </div>
    <?php echo form_error('last_name'); ?>
    <br><br>
    <div class="flex">
    <div class="label">
    <label for="email">Email:</label>
    </div>
    <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>">
    </div>
    <?php echo form_error('email'); ?>
    <br><br>
    <div class="flex">
    <div class="label">
    <label for="password">Password:</label>
    </div>
    <input type="password" id="password" name="password">
    </div>
    <?php echo form_error('password'); ?>
    <br><br>
    <input type="submit" value="Update" name = "update">
    <div class="alert alert-success">
        <?= ($this->session->flashdata('status')); ?>
        </div>
</form>


  </body>
</html>


