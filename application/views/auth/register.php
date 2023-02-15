<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
<main>
    <form action="<?php echo base_url('register')?>" method="POST">
        <h1>Sign Up</h1>
        <div>
            <?php
            if($this->session->flashdata('message')){
                echo'
                <div class="alert alert-success">
                '.$this->session->flashdata("message").'
                </div>
                ';
            }   
            ?>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name">
            <small><?php echo form_error('first_name');?></small>
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name">
            <small><?php echo form_error('last_name');?></small>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <small><?php echo form_error('email');?></small>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <small><?php echo form_error('password');?></small>
        </div>
        <div>
            <label for="password2">Retype Password:</label>
            <input type="password" name="password2" id="password2">
            <small><?php echo form_error('password2');?></small>
        </div>
        <!-- <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">Terms of services</a>
            </label>
        </div> -->
        <button type="submit">Register</button>
        <footer>Already a member? <a href="login">Login here</a></footer>
    </form>
</main>
</body>
</html>