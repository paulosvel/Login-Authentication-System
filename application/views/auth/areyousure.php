<!DOCTYPE html>
<html>
  <body>
    <p>Are you sure you want to proceed?</p>
    <div>
    <form action="<?php echo base_url('areyousure/yes'); ?>" method="post">
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
      <button type="submit">Yes</button>
    </form>

    <button onclick="location.href='customers'">No</button>
    </div>
  </body>
</html>
