<!DOCTYPE html>
<html lang="en">
<head>
    <style> .forgot{
     display: flex;
     justify-content: flex-end;
     width:100%;
     
    }
        .login{
     display: flex;
    }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <?php if($this->session->flashdata('status')): ?>
        <div class="alert alert-success">
        <?= ($this->session->flashdata('status')); ?>
        </div>
        <?php endif;?>
    <title>Login</title>

</head>
<body>
<main>
    <form action="<?php echo base_url('login')?>" method="POST">
        <h1>Sign In</h1>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <small><?php echo form_error('email'); ?></small>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <small><?php echo form_error('password'); ?></small>
        </div>
        <div class = "login">
        <button type="ok">Login</button>
    <div class="forgot"><a href="<?php echo base_url('forgot'); ?>">Forgot Password</a></div>
</div>
    </div>
    </form>
</main>
</body>
</html>