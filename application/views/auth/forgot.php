<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <?php if($this->session->flashdata('status')): ?>
        <div class="alert alert-success">
        <?= ($this->session->flashdata('status')); ?>
        </div>
        <?php endif;?>

</head>
<body>
<main>
    <form action="<?php echo base_url('forgot')?>" method="POST">
        <h1>Enter your email and we will send you a link to generate your password again</h1>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <small><?php echo form_error('email'); ?></small>
        </div>

        <div class = "login">
        <button type="ok">Remind me </button>
    </div>
    </form>
</main>
</body>
</html>