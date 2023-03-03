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
<?php foreach ($messages as $message): ?>
    <li>
        <div class="position">
            <button class="button" onclick="toggleMessage('<?php echo $message['id']; ?>')">
                <div class="position2">
                    <div class="position3">
                        <label>Customer&nbsp;</label>
                        <?php echo $message['first_name']; ?>
                    </div>
                    <label> Last Interactive:&nbsp;</label>
                    <?php echo $message['created_at']; ?>
                </div>
            </button>
            <?php if ($message['expanded']): ?>
                <div>
                    <form method="post" action="<?php echo base_url('customers/delete_user'); ?>">
                        <input type="hidden" name="user_id" value="<?php echo $message['user_id']; ?>">
                        <button type="submit">Delete User</button>
                    </form>
                    <button type="button" onclick="location.href='<?php echo base_url('customers/edit_user/'.$message['id']); ?>'">Edit User</button>
                    <button type="button">Show User's Messages</button>
                    <label>Name:&nbsp;</label><?php echo $message['first_name']; ?>
                    <label>Last Name:&nbsp;</label><?php echo $message['last_name']; ?>
                    <label>Email:&nbsp;</label><?php echo $message['email']; ?>
                </div>
            <?php endif; ?>
        </div>
    </li>
<?php endforeach; ?>
</ul>

<script>
    function toggleMessage(messageId) {
        window.location.href = '<?php echo base_url('customers'); ?>?selected_message_id=' + messageId;
    }
</script>