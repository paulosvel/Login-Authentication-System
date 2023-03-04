<head>
    <style>
        .position {
            margin-top: 60px;
            max-width: 1000px;
            height: 100%;
        }

        .button {
            width: 500px;
            height: 30px;
        }

        .position2 {
            display: flex;
            justify-content: flex-start;
            text-align: flex-start;
        }

        .position3 {
            display: flex;
            flex-grow: 1;
        }

        .edit-form {
            margin-top: 10px;
        }
    </style>
</head>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <div class="position">
                <button class="button" onclick="toggleuser('<?php echo $user['id']; ?>')">
                    <div class="position2">
                        <div class="position3">
                            <label>Customer&nbsp;</label>
                            <?php echo $user['first_name']; ?>
                        </div>
                    </div>
                </button>
                <?php if (isset($_GET['selected_user_id']) && $_GET['selected_user_id'] == $user['id']): ?>
                    <div>
                        <form method="post" action="<?php echo base_url('customers/delete_user'); ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit">Delete User</button>
                        </form>
                        <button onclick="toggleEditForm('<?php echo $user['id'];?>')">Edit User</button>
                        <button type="button" onclick="location.href='<?php echo base_url('customers/messages/'.$user['id']); ?>'">Show User's Messages</button>
                        <label>Name:&nbsp;</label><?php echo $user['first_name']; ?>
                        <label>Last Name:&nbsp;</label><?php echo $user['last_name']; ?>
                        <label>Email:&nbsp;</label><?php echo $user['email']; ?>
                        <div class="edit-form" id="edit-form-<?php echo $user['id'];?>"
                             style="display: none;">
                            <form method="post" action="<?php echo base_url('customers/edit_user/'.$user['id']); ?>">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>">
                                <br>
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>">
                                <br>
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="<?php echo $user['email']; ?>">
                                <br>
                                <label for="password">Password:</label>
                                <input type="password" name="password" value="<?php echo $user['password']; ?>">
                                <br>
                                <button type="submit">Save Changes</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<script>
    function toggleuser(userId) {
        window.location.href = '<?php echo base_url('customers'); ?>?selected_user_id=' + userId;
    }
</script>

<script>    
    function toggleEditForm(userId) {
        const form = document.getElementById('edit-form-' + userId);
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>
