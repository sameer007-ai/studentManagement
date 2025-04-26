<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'studentManagement');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Student Marks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Enter Marks for Students</h2>
    <form action="student_marks.php" method="POST">
        <div class="form-group">
            <label for="student">Select Student:</label>
            <select name="student_id" id="student" class="form-control" required>
                <option value="">-- Select Student --</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="marks">Enter Marks:</label>
            <input type="number" name="marks" id="marks" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Marks</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
