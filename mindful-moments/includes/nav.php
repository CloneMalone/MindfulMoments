<?php require_once('../includes/utils.php'); ?>

<nav>
    <a href="#"><h2>🌿 Mindful Moments</h2></a>
    <div class="nav-link-container">
        <?php if (isUserLoggedIn()): ?>
            <a href="../pages/dashboard.php">Dashboard</a>
            <a href="../pages/newEntry.php">Add Entry</a>
            <a href="../authLogic/logout.php">Logout</a>
        <?php else: ?>
            <a href="../authPages/login.php">Login</a>
            <a href="../authPages/register.php">Register</a>
        <?php endif; ?>
    </div>
</nav>
