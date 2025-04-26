<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'studentManagement');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form se data lena
$student_id = $_POST['student_id'];
$marks_obtained = $_POST['marks'];

// Data insert karna
$sql = "INSERT INTO marks (student_id, marks_obtained) VALUES ('$student_id', '$marks_obtained')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Marks submitted successfully!</h2>";
    echo "<a href='index.php'>Enter More Marks</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
