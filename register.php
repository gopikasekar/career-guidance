<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the 'email' column exists in the 'users' table
    $check_column_query = "SHOW COLUMNS FROM users LIKE 'email'";
    $result = mysqli_query($conn, $check_column_query);

    if (!$result || mysqli_num_rows($result) == 0) {
        // The 'email' column does not exist, you may want to alter the table structure
        echo "Error: The 'email' column does not exist in the 'users' table.";
        exit();
    }

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page or home page
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
