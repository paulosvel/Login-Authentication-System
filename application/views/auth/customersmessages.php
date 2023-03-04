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
        .message-details {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<ul>
    <?php foreach ($messages as $message): ?>
        <li>
            <div class="position">
                <button class="button" onclick="toggleMessage('<?php echo $message['id']; ?>')">
                    <div class="position2">
                        <div class="position3"> <label>Customer&nbsp;</label>
                            <?php echo $message['first_name']; ?>
                        </div>
                        <label> Last Interactive:&nbsp;</label>
                        <?php echo $message['created_at']; ?>
                    </div>
                </button>
                <div class="message-details" id="message-details-<?php echo $message['id']; ?>">
                    <label>Message:&nbsp;</label><div class="usermsg"><?php echo $message['body_text'];?>
                    <br></br>
                    <label>Name:&nbsp;</label><?php echo $message['first_name'];?>
                    <br></br>
                    <label>Last Name:&nbsp;</label><?php echo $message['last_name']; ?>
                    <br></br>
                    <label>Email:&nbsp;</label><?php echo $message['email']; ?>
                    <br></br>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<script>
    function toggleMessage(messageId) {
        const messageDetails = document.getElementById("message-details-" + messageId);
        if (messageDetails.style.display === "none" || !messageDetails.style.display) {
            messageDetails.style.display = "block";
        } else {
            messageDetails.style.display = "none";
        }
    }
</script>
