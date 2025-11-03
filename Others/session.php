<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Example</title>
</head>
<body>      
    <h1>Session Example</h1>
    <?php
    // Check if the session variable 'visits' is set
    if (isset($_SESSION['visits'])) {
        // Increment the visit count
        $_SESSION['visits'] += 1;
    } else {
        // Initialize the visit count
        $_SESSION['visits'] = 1;
    }

    // Display the number of visits
    echo "<p>You have visited this page " . $_SESSION['visits'] . " time(s) in this session.</p>";
    ?>
</body>
</html> 