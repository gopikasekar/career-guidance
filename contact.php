<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zcontact";

// Create connection
$conn = new mysqli("localhost", "root", "", "zcontact");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
    $emailsubject = mysqli_real_escape_string($conn, $_POST['emailsubject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_form (fullname, email, mobilenumber, emailsubject, message)
            VALUES ('$fullname', '$email', '$mobilenumber', '$emailsubject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page after successful submission
        header("Location: contact_success.php");
        exit();
    } else {
        // Handle errors if submission fails
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>





