<?php
include_once("./config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project F4 DB Connection</title>
</head>
<body style="text-align: center; font-family: Arial, sans-serif; margin-top: 50px;">
    <h1>Database Connection Test</h1>
    <div>
        <?php 
            echo $conn->connect_error 
                ? "<strong style='color: red;'>❌ Connection failed:</strong> " . $conn->connect_error 
                : "<strong style='color: green;'>✅ Connection Successful</strong>"; 
        ?>
    </div>
    <div style="margin-top: 20px;">
        <a href="./../php/" style="text-decoration: none; color: blue;">Go back to Home</a>
    </div>
</body>
</html>
