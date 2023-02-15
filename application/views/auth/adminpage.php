<!DOCTYPE html>
<html>
  <head>
    <style>
      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
      }

      .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
      }

      .tab button:hover {
        background-color: #ddd;
      }

      .tab button.active {
        background-color: #ccc;
      }
      .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
      }
    </style>
  </head>
  <body>
    <div class="tab">
      <button class="tablinks" onclick="openTab(event, 'profile')">My Profile</button>
      <button class="tablinks" onclick="openTab(event, 'Form')">Customers</button>
      <button class="tablinks" onclick="openTab(event, 'History')">Message History</button>
    </div>

    <form action="<?php echo site_url('profile'); ?>" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>">
    <?php echo form_error('first_name'); ?>
    <br><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>">
    <?php echo form_error('last_name'); ?>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email'); ?>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <?php echo form_error('password'); ?>
    <br><br>
    <input type="submit" value="Update">
</form>







