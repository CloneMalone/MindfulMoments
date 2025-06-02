<?php

# Destroy session upon Logout
function logoutUser() {
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
}

# Check if user is logged in (i.e a session has started)
function isUserLoggedIn(): bool {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return isset($_SESSION['user_id']);
    }

    return false;
}

# If user is not logged in, redirect to login page
function requireLogin() {
        if (!isUserLoggedIn()) {
        header('Location: ../authPages/login.php');
        exit;
    }
}

# Function for sanitizing input to avoid security
# vulnerabilities/clear up whitespace
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

# Reuseable query preparing code
function prepareQueryAndBindValues($sqlStatement) {
    $query = 'INSERT INTO entries
                  (user_id, mood, note)
              VALUES
                  (:user_id, :mood, :note)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':mood', $mood);
    $statement->bindValue(':note', $note);
    $statement->execute();
}


?>