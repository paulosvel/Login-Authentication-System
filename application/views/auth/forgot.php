<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
</head>
<body>
<main>
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo base_url('forgot/send_email');?>" method="POST">
        <h1>Enter your email and we will send you a link to generate your password again</h1>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <small><?php echo form_error('email'); ?></small>
        </div>

        <div class="login">
            <button type="ok">Remind me ?</button>
        </div>
    </form>
</main>
</body>
</html>
