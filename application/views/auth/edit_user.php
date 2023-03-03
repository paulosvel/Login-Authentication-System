<form method="post" action="<?php echo base_url('customers/edit_user'.$user['id']); ?>">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>">
    <br>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>">
    <br>
    <button type="submit">Save Changes</button>
</form>
