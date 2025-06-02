<?php
# Assign database values to variable 
$dsn = 'mysql:hose=localhost;dbname=mindful_moments';
$adminUsername = 'mindful_moments_admin';
$adminPassword = 'pickl3dp!zz@';

# Connect to the database
try {
    $pdo = new PDO($dsn, $adminUsername, $adminPassword);

    # Set the error mode attribute to exception
    # so database does not fail silently. PDO does not
    # throw exceptions by default
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    # "die" immediately stops the database connection and displays
    # a user friendly error
    die("Database connection failed: " . $e->getMessage());
}

?>
