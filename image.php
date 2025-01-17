<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form action=" " method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "images";

// Create connection
$connection = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $file = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $folder = 'images/'; // Ensure this directory exists and is writable

    // Create the folder if it doesn't exist
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $target_file = $folder . basename($file);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($tempname, $target_file)) {
        // Prepare an SQL statement to insert the image file name into the database
        $query = "INSERT INTO image (file) VALUES ('$file')";
        $stmt = mysqli_prepare($connection, $query);

        if ($stmt) {
            // Bind the file name parameter to the SQL query
            mysqli_stmt_bind_param($stmt, "s", $file);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo 'File uploaded and database entry created successfully.';
            } else {
                echo 'Database entry failed: ' . mysqli_stmt_error($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo 'Failed to prepare SQL statement: ' . mysqli_error($connection);
        }
    } else {
        echo 'File upload failed.';
    }
}

// Close the database connection
mysqli_close($connection);
?>
