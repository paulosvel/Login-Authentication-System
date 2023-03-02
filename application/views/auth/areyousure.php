<!DOCTYPE html>
<html>
  <body>
    <p>Are you sure you want to proceed?</p>
    <form class="areyousure" action="<?php echo base_url('areyousure/yes'); ?>" method="post">
    <input type="hidden" name="user_id" value="<?php echo $selected_user_id; ?>">
    <button>Yes</button>
    <button onclick="location.href='customers'">No</button>
</form>
  </body>
</html>
