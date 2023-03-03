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
                    <!-- <label> Last Interactive:&nbsp;</label>
                    <?php echo $user['created_at']; ?> -->
                </div>
            </button>
            <?php if (isset($_GET['selected_user_id']) && $_GET['selected_user_id'] == $user['id']): ?>
                <div>
                    <form method="post" action="<?php echo base_url('customers/delete_user'); ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                        <button type="submit">Delete User</button>
                    </form>
                    <button type="button" onclick="location.href='<?php echo base_url('customers/edit_user/'.$user['id']); ?>'">Edit User</button>
                    <button type="button">Show User's users</button>
                    <label>Name:&nbsp;</label><?php echo $user['first_name']; ?>
                    <label>Last Name:&nbsp;</label><?php echo $user['last_name']; ?>
                    <label>Email:&nbsp;</label><?php echo $user['email']; ?>
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
