<?php
require_once('../includes/utils.php');

# Grab entered registration values and sanitize them accordingly
$username = sanitizeInput($_POST['username']);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

# Ensure password and confirm_password match (just in case someone case disable)
# javascript in the browser)
if ($password !== $confirm_password) {
    echo "<p style='color: red;'>❌ Passwords do not match. Please try again.</p>";
} else {
    require_once('../db/database.php');
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users
                (username, email, password_hash)
            VALUES
                (:username, :email, :password)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password_hash);

    try {
        $statement->execute();

        # header gives the browser a clear redirect
        # better to use than include. Also prevents form submission
        # on refresh
        header('Location: ../authPages/registrationComplete.php');
        exit;
    } catch (PDOException $e) {
        echo "<p style='color: red;'>⚠️ Error: " . $e->getMessage() . "</p>";
    }
    
}



?>