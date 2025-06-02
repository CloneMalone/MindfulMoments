<?php
require_once('../includes/session.php');
require_once('../includes/utils.php');
# If a user is not logged in, redirect to the login page
requireLogin();

require_once('../db/database.php');

# Prepare user info
$username = $_SESSION['username'];
$userId = $_SESSION['user_id'];

try {
    $query = 'SELECT * FROM entries
              WHERE user_id = :user_id
              ORDER BY created_at DESC';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
    $entries = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p style="color: red;">❌ Error fetching entries: ' . $e->getMessage() . '</p>';
}
?>

<?php
include('../includes/header.php');
include('../includes/nav.php');
?>

<main class="dashboard-main">
    <div class="greeting-container">
        <h1>👋🏼 Hello <?php echo sanitizeInput($username); ?></h1>
        <h2>Welcome to your Dashboard!</h2>
    </div>

    <!-- Check for URL Parameters (Entry added, Entry edited, etc.) -->
    <?php if (isset($_GET['success'])): ?>
        <h2 class="entry-saved-success-text">🌱 Entry saved successfully!</h2>
    <?php endif; ?>

    <?php if (isset($_GET['msg'])): ?>
        <h2 class="entry-saved-success-text">🌱 <?php echo sanitizeInput($_GET['msg']); ?></h2>
    <?php endif; ?>

    <?php if (!empty($entries)): ?>
        <div class="entries-container">
            <h2>Mood Entries</h2>
                <div class="entry-card-scrollable-container">
                    <?php foreach ($entries as $entry): ?>
                        <a href="editEntry.php?id=<?php echo sanitizeInput($entry['id']); ?>" class="entry-link">
                            <div class="entry-container">
                                    <div class="entry-card-mood-note-container">
                                        <h3><?php echo sanitizeInput($entry['mood']); ?></h3>
                                        <p><?php echo sanitizeInput($entry['note']); ?></p>
                                    </div>
                                <p><?php echo date("F j, Y, g:i a", strtotime($entry['created_at'])) ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
        </div>
    <?php else: ?>
        <h2 class="no-entries-text">You haven’t added any entries yet. 🌱</h2>
    <?php endif; ?>
</main>

<?php include('../includes/footer.php') ?>