<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= base_url('forgot/update_password') ?>">
    <input type="hidden" name="token" value="<?= $token ?>">
    <label for="password">New Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="password2">Confirm Password:</label>
    <input type="password" id="password2" name="password2" required>
    <button type="submit">Reset Password</button>
</form>
