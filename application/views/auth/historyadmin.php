<head>
    <style> .position{
     margin-top: 60px;
     max-width: 1000px;
     height: 100%;
     
     
    }
    .button{
        width: 150px;
        height: 20px;
    }
    </style></head>
<ul>
<?php foreach ($messages as $message): ?>
    <li><div class = "position"> 
        <button class = "button" onclick="toggleMessage('<?php echo $message['id']; ?>')"><?php echo $message['created_at']; ?>
        </button>
        <?php if ($message['expanded']): ?>
            <div>
                <?php echo $message['body_text']; ?>
                <br></br>
                id: <?php echo $message['user_id'];?>
            </div>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>

<script>
function toggleMessage(messageId) {
    window.location.href = '<?php echo base_url('historyadmin'); ?>?selected_message_id=' + messageId;
}
</script>
