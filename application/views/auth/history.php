<head>
    <style> .position{
     margin-top: 60px;
     
    }
    </style></head>
<ul>
<?php foreach ($messages as $message): ?>
    <li><div class = "position"> 
        <button onclick="toggleMessage('<?php echo $message['id']; ?>')">
        </button>
        <?php if ($message['expanded']): ?>
            <div>
                <?php echo $message['body_text']; ?>
                <div class="timestamp">
                    <?php echo $message['created_at']; ?>
                </div>
            </div>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>

<script>
function toggleMessage(messageId) {
    window.location.href = '<?php echo base_url('history'); ?>?selected_message_id=' + messageId;
}
</script>
