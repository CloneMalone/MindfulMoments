<?php
require_once('../includes/session.php');
require_once('../includes/utils.php');
requireLogin();

include('../includes/header.php');
include('../includes/nav.php');
?>

<form class="auth-form" id="add-entry-form" action="../pagesLogic/submitEntry.php" method="post">
    <h2>🌿Add a Moment</h2>
    <div class="form-label-and-input-container">
        <label>Mood:</label>
        <select name="mood" id="mood" required>
            <option value="Sad">Sad</option>
            <option value="Angry">Angry</option>
            <option value="Neutral">Neutral</option>
            <option value="Happy">Happy</option>
        </select>
    </div>
    <div class="form-label-and-input-container">
        <label>Note:</label>
        <textarea required name="note" id="note" rows="5"></textarea>
    </div>
    <input class="green-auth-button" type="submit" value="Add Entry">
</form>



<?php include('../includes/footer.php'); ?>