<?php
require_once('../db/database.php');
require_once('../includes/utils.php');

# Grab entered login values and sanitize
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

try {
    # Prepare query, fetch user
    $query = 'SELECT * FROM users
            WHERE email = :email';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();

    # Verify password and complete log in
    if ($user && password_verify($password, $user['password_hash'])) {
        require_once('../includes/session.php');
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        # Go to dashboard page upon successful login
        header('Location: ../pages/dashboard.php');
        exit;
    } else {
        echo "<p style='color: red;'>❌ Invalid login. Try again.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>⚠️ Error: " . $e->getMessage() . "</p>";
}



?>