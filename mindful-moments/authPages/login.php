<?php
include('../includes/header.php');
include('../includes/nav.php');


?>
    <form class="auth-form" id="login-form" action="../authLogic/loginSubmit.php" method="post">
        <h2>🌿Welcome Back</h2>
        <div class="form-label-and-input-container">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-label-and-input-container">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <input class="auth-button" type="submit" value="Log In">
    </form>
    
    
<?php include('../includes/footer.php') ?>