<?php
require_once('../includes/session.php');
require_once('../includes/utils.php');
requireLogin();
require_once('../db/database.php');

// Retrieve variables
$mood = $_POST['mood'];
$note = $_POST['note'];
$entryId = intval($_POST['id']);
$userId = $_SESSION['user_id'];

// Edit entry logic
if (isset($_POST['edit_entry'])) {
    $updateQuery = 'UPDATE entries 
                    SET mood = :mood, 
                    note = :note 
                    WHERE id = :id 
                    AND
                    user_id = :user_id';
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindValue(':mood', $mood, PDO::PARAM_STR);
    $updateStmt->bindValue(':note', $note, PDO::PARAM_STR);
    $updateStmt->bindValue(':id', $entryId, PDO::PARAM_INT);
    $updateStmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $updateStmt->execute();

    header('Location: ../pages/dashboard.php?msg=Entry+updated');
    exit;
} else if (isset($_POST['delete_entry'])) {
    $deleteQuery = 'DELETE FROM entries
                    WHERE id = :id 
                    AND user_id = :user_id';
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->bindValue(':id', $entryId, PDO::PARAM_INT);
    $deleteStmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $deleteStmt->execute();

    header('Location: ../pages/dashboard.php?msg=Entry+deleted');
    exit;
} else {
    die('❌ Invalid request.');
}

?>