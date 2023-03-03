<!DOCTYPE html>
<html>
  <body>
    <p>Are you sure you want to proceed?</p>
    <form class="areyousure" action="<?php echo base_url('customers/delete_user'); ?>" method="post">
    <input type="hidden" name="user_id" value='<?php echo $user['id']; ?>'>

    <button>Yes</button>
    <button onclick="location.href='customers'">No</button>
</form>
  </body>
</html>
