<?php
require_once('../includes/utils.php');
require_once('../includes/session.php');
# Ensure user is logged in
requireLogin();

# Retrieve mood and note
$mood = trim($_POST['mood']);
$note = trim($_POST['note']);

# Add to database
try {
    require_once('../db/database.php');

    $query = 'INSERT INTO entries
                  (user_id, mood, note)
              VALUES
                  (:user_id, :mood, :note)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':mood', $mood);
    $statement->bindValue(':note', $note);
    $statement->execute();

    # Redirect after adding entry to database
    header('Location: ../pages/dashboard.php?success=1');
    exit;
    
} catch (PDOException $e) {
    echo '<p style="color: red;">❌ Error saving entry: ' . $e->getMessage() . '</p>';
}




?>