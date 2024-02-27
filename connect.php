<?php

// Update these variables with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zform1";

// Create connection
$conn = new mysqli("localhost", "root", "", "zform1");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$board = $_POST['board'];
$mark = $_POST['mark'];
$stream = $_POST['stream'];
$reason = $_POST['reason'];
$extra = $_POST['extra'];
$date = $_POST['date'];

// SQL query to insert data into the table (update table and column names as needed)
$sql = "INSERT INTO form_1 (fullname, gender, board, mark, stream, reason, extra, date)
        VALUES ('$fullname', '$gender', '$board', '$mark', '$stream', '$reason', '$extra', '$date')";

// Check if the query was successful
if ($conn->query($sql) === TRUE) {
    // Close the connection
    $conn->close();

    // Add a JavaScript alert for successful form submission
    echo '<script type="text/javascript">alert("Form submitted successfully!");</script>';

    // Redirect to a different HTML file based on the selected stream
    $redirectFile = strtolower($stream) . '.html';
    echo "<script>window.location.replace('stream/$redirectFile');</script>";
    exit();
} else {
    echo "Error: ". $sql. "<br>" . $conn->error;

    // Add a JavaScript alert for form submission failure
    echo '<script type="text/javascript">alert("Form submission failed. Please try again.");</script>';
}

?>
