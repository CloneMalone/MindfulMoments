<?php
include('../includes/header.php');
include('../includes/nav.php');


?>
    <form class="auth-form" id="register-form" action="../authLogic/registerSubmit.php" method="post">
        <h2>🌿Create Your Account</h2>
        <div class="form-label-and-input-container">
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-label-and-input-container">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-label-and-input-container">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-label-and-input-container">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" required>
        </div>
        <input class="auth-button" type="submit" value="Register">
    </form>
    
<?php include('../includes/registerFooter.php') ?>