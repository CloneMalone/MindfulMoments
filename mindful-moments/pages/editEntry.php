<?php
require_once('../includes/session.php');
require_once('../includes/utils.php');
requireLogin();
require_once('../db/database.php');

$entryId = 0;
$entry = '';

if (isset($_GET['id'])) {
    $entryId = intval($_GET['id']);
} 

$userId = $_SESSION['user_id'];

if ($entryId > 0) {
    $query = 'SELECT * FROM entries WHERE id = :id AND user_id = :user_id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $entryId, PDO::PARAM_INT);
    $statement->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
    $entry = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$entry) {
        die('Entry not found or access denied');
    }
} else {
    die('Invalid entry ID.');
}


?>

<?php include('../includes/header.php') ?>
<?php include('../includes/nav.php') ?>

<form class="auth-form" id="edit-entry-form" action="../pagesLogic/updateEntry.php" method="post">
    <h2>📝Edit Entry</h2>
    <input type="hidden" name="id" value="<?php echo $entry['id']; ?>">
    <div class="form-label-and-input-container">
        <label>Mood:</label>
        <select name="mood" id="mood" required>
            <option value="Sad" <?php if ($entry['mood'] == 'Sad') echo 'selected'; ?>>Sad</option>
            <option value="Angry" <?php if ($entry['mood'] == 'Angry') echo 'selected'; ?>>Angry</option>
            <option value="Neutral" <?php if ($entry['mood'] == "Neutral") echo 'selected'; ?>>Neutral</option>
            <option value="Happy" <?php if ($entry['mood'] == "Happy") echo 'selected'; ?>>Happy</option>
        </select>
    </div>
    <div class="form-label-and-input-container">
        <label>Note:</label>
        <textarea required name="note" id="note" rows="5"><?php echo sanitizeInput($entry['note']); ?></textarea>
    </div>
    <input class="green-auth-button" name="edit_entry" type="submit" value="Edit Entry">
    <input class="red-auth-button" name="delete_entry" type="submit" value="Delete Entry">
</form>


<?php include('../includes/footer.php') ?>